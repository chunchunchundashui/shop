<?php
/**
 * Created by PhpStorm.
 * User: 春春春
 * Date: 2019/10/31
 * Time: 10:45
 */
namespace app\common\model;

use think\Model;

class Goods extends Model
{
    protected $field = true;    //忽略goods表字段
    protected static function init()
    {
//        前置钩子
        Goods::beforeInsert(function ($goods) {
//            获取缩略图的路径,将他们分为大,中,小,图片进行保存到数据库
            if ($_FILES['og_thumb']['tmp_name']) {
                $thumbName = $goods->upload('og_thumb');
                $ogThumb = date("Ymd"). DS . $thumbName;
                $bigThumb = date("Ymd"). DS . 'big_' . $thumbName;
                $midThumb = date("Ymd"). DS . 'mid_' . $thumbName;
                $smhumb = date("Ymd"). DS . 'sm_' . $thumbName;

                $image = \think\Image::open(IMG_UPLOADS.$ogThumb);
                // 按照原图的比例生成一个最大为150*150的缩略图并保存为thumb.png
                $image->thumb(500, 500)->save(IMG_UPLOADS.$bigThumb);
                $image->thumb(240, 240)->save(IMG_UPLOADS.$midThumb);
                $image->thumb(58, 58)->save(IMG_UPLOADS.$smhumb);
                $goods->og_thumb = $ogThumb;
                $goods->big_thumb = $bigThumb;
                $goods->mid_thumb = $midThumb;
                $goods->sm_thumb = $smhumb;
            }
            $goods->goods_code = time().rand(111111, 999999);   //商品编号
//            dump($ogThumb);die;
        });

//        修改商品之前
        Goods::beforeUpdate(function ($goods) {
            // 商品的id
            $goodsId = $goods->id;
            //          新增商品属性
//            只添加新加的数据,跟前台js做上配合
            $goodsData = input('post.');
            db('rec_item')->where(array('value_type' => 1, 'value_id' => $goodsId))->delete();
//           处理商品推荐位
            if (isset($goodsData['recpos'])) {
                foreach ($goodsData['recpos'] as $k => $v) {
                    db('rec_item')->insert(['recpos_id' => $v, 'value_id' => $goodsId, 'value_type' => 1]);
                }
            }
            if (isset($goodsData['goods_attr'])) {
                $i = 0;
                foreach ($goodsData['goods_attr'] as $k => $v) {
                    if(is_array($v)) {
                        if (!empty($v)) {
                            foreach ($v as $k1 => $v1) {
                                if (!$v1) {
                                    $i++;
                                    continue;       // 如果为空继续,执行,为空的数据不加入到数据库
                                }
                                db('goods_attr')->insert(['attr_id' => $k, 'attr_value' => $v1, 'attr_price'=>$goodsData['attr_price'][$i], 'goods_id' => $goodsId]);
                                $i++;
                            }
                        }
                    }else {
//                   处理唯一属性类型
                        db('goods_attr')->insert(['attr_id' => $k, 'attr_value' => $v, 'goods_id' => $goodsId]);
                    }
                }
            }

//            修改商品属性
            if (isset($goodsData['old_goods_attr'])) {
                $attrPrice = $goodsData['old_attr_price'];
//                取数组下面的键
                $idArr = array_keys($attrPrice);
//                取数组下面的值
                $idValue = array_values($attrPrice);
//                dump($idArr);
//                dump($idValue);die;
                $i = 0;
                foreach ($goodsData['old_goods_attr'] as $k => $v) {
                    if(is_array($v)) {
                        if (!empty($v)) {
                            foreach ($v as $k1 => $v1) {
                                if (!$v1) {
                                    $i++;
                                    continue;       // 如果为空继续,执行,为空的数据不加入到数据库
                                }
                                db('goods_attr')->where('id',$idArr[$i])->update(['attr_value' => $v1, 'attr_price'=>$idValue[$i]]);
                                $i++;
                            }
                        }
                    }else {
//                   处理唯一属性类型
                        db('goods_attr')->where('id',$idArr[$i])->update(['attr_value' => $v, 'attr_price'=>$idValue[$i]]);
                        $i++;
                    }
                }
            }
            //商品相册处理
            if ($goods->_hasImgs($_FILES['goods_photo']['tmp_name'])) {
                // 获取表单上传文件
                $files = request()->file('goods_photo');
                foreach($files as $file){
                    // 移动到框架应用根目录/public/uploads/ 目录下
                    $info = $file->move(ROOT_PATH . 'public' . DS . 'static' . DS . 'uploads');
                    if($info){
                        // 成功上传后 获取上传信息
                        $photoName = $info->getFilename();
                        $ogphoto = date("Ymd"). DS . $photoName;
                        $bigphoto = date("Ymd"). DS . 'big_' . $photoName;
                        $midphoto = date("Ymd"). DS . 'mid_' . $photoName;
                        $smphoto = date("Ymd"). DS . 'sm_' . $photoName;

                        $image = \think\Image::open(IMG_UPLOADS.$ogphoto);
                        // 按照原图的比例生成一个最大为150*150的缩略图并保存为thumb.png
                        $image->thumb(800, 800)->save(IMG_UPLOADS.$bigphoto);
                        $image->thumb(400, 400)->save(IMG_UPLOADS.$midphoto);
                        $image->thumb(200, 200)->save(IMG_UPLOADS.$smphoto);
                        db('goods_photo')->insert(['goods_id' => $goodsId, 'og_photo' => $ogphoto, 'big_photo' => $bigphoto, 'mid_photo' => $midphoto, 'sm_photo' => $smphoto]);
                    }else{
                        // 上传失败获取错误信息
                        echo $file->getError();
                    }
                }
            }
//            批量修改会员价格
            $mpriceArr = $goods->mp;
//            删除原有的会员价格
            $mp = db('member_price');
            $mp->where('goods_id',$goodsId)->delete();
            if ($mpriceArr) {
                foreach ($mpriceArr as $k => $v) {
                    if (trim($v) == '') {
                        continue;
                    }else {
                        $mp->insert(['mlevel_id' => $k, 'mprice' => $v, 'goods_id' => $goodsId]);
                    }
                }
            }
//            修改商品之前,如果有上传新的缩略图,先处理图片
            if ($_FILES['og_thumb']['tmp_name']) {
//                如果存在就删除旧的缩略图,先处理图片
                @unlink(IMG_UPLOADS.$goods->og_thumb);
                @unlink(IMG_UPLOADS.$goods->big_thumb);
                @unlink(IMG_UPLOADS.$goods->mid_thumb);
                @unlink(IMG_UPLOADS.$goods->sm_thumb);
                $thumbName = $goods->upload('og_thumb');
                $ogThumb = date("Ymd"). DS . $thumbName;
                $bigThumb = date("Ymd"). DS . 'big_' . $thumbName;
                $midThumb = date("Ymd"). DS . 'mid_' . $thumbName;
                $smhumb = date("Ymd"). DS . 'sm_' . $thumbName;

                $image = \think\Image::open(IMG_UPLOADS.$ogThumb);
                // 按照原图的比例生成一个最大为150*150的缩略图并保存为thumb.png
                $image->thumb(800, 800)->save(IMG_UPLOADS.$bigThumb);
                $image->thumb(400, 400)->save(IMG_UPLOADS.$midThumb);
                $image->thumb(200, 200)->save(IMG_UPLOADS.$smhumb);
                $goods->og_thumb = $ogThumb;
                $goods->big_thumb = $bigThumb;
                $goods->mid_thumb = $midThumb;
                $goods->sm_thumb = $smhumb;
            }
        });

        //后置钩子
        Goods::afterInsert(function ($goods) {
//            接受表单信息
            $goodsData = input('post.');
            //写入会员价格
            $mpriceArr = $goods->mp;
            $goodsId = $goods->id;
            if ($mpriceArr) {
                foreach ($mpriceArr as $k => $v) {
                    if (trim($v) == '') {
                        continue;
                    }else {
                        db('member_price')->insert(['mlevel_id' => $k, 'mprice' => $v, 'goods_id' => $goodsId]);
                    }
                }
            }
            //           处理商品推荐位
            if (isset($goodsData['recpos'])) {
                foreach ($goodsData['recpos'] as $k => $v) {
                    db('rec_item')->insert(['recpos_id' => $v, 'value_id' => $goodsId, 'value_type' => 1]);
                }
            }
//          处理商品属性
            $i = 0;
            if (isset($goodsData['goods_attr'])) {
               foreach ($goodsData['goods_attr'] as $k => $v) {
                 if(is_array($v)) {
                   if (!empty($v)) {
                      foreach ($v as $k1 => $v1) {
                        if (!$v1) {
                            $i++;
                            continue;       // 如果为空继续,执行,为空的数据不加入到数据库
                        }
                        db('goods_attr')->insert(['attr_id' => $k, 'attr_value' => $v1, 'attr_price'=>$goodsData['attr_price'][$i], 'goods_id' => $goodsId]);
                        $i++;
                      }
                    }
                 }else {
//                   处理唯一属性类型
                   db('goods_attr')->insert(['attr_id' => $k, 'attr_value' => $v, 'goods_id' => $goodsId]);
                 }
               }
            }

            //商品相册处理
            if ($goods->_hasImgs($_FILES['goods_photo']['tmp_name'])) {
                // 获取表单上传文件
                $files = request()->file('goods_photo');
                foreach($files as $file){
                    // 移动到框架应用根目录/public/uploads/ 目录下
                    $info = $file->move(ROOT_PATH . 'public' . DS . 'static' . DS . 'uploads');
                    if($info){
                        // 成功上传后 获取上传信息
                        $photoName = $info->getFilename();
                        $ogphoto = date("Ymd"). DS . $photoName;
                        $bigphoto = date("Ymd"). DS . 'big_' . $photoName;
                        $midphoto = date("Ymd"). DS . 'mid_' . $photoName;
                        $smphoto = date("Ymd"). DS . 'sm_' . $photoName;

                        $image = \think\Image::open(IMG_UPLOADS.$ogphoto);
                        // 按照原图的比例生成一个最大为150*150的缩略图并保存为thumb.png
                        $image->thumb(800, 800)->save(IMG_UPLOADS.$bigphoto);
                        $image->thumb(400, 400)->save(IMG_UPLOADS.$midphoto);
                        $image->thumb(200, 200)->save(IMG_UPLOADS.$smphoto);
                        db('goods_photo')->insert(['goods_id' => $goodsId, 'og_photo' => $ogphoto, 'big_photo' => $bigphoto, 'mid_photo' => $midphoto, 'sm_photo' => $smphoto]);
                    }else{
                        // 上传失败获取错误信息
                        echo $file->getError();
                    }
                }
            }
        });

//        前置钩子删除商品方法
      Goods::beforeDelete(function ($goods) {
        $goodsId = $goods->id;
//        判断是否存在原图,在执行以下语句
        if ($goods->og_thumb) {
          //        删除主图及其缩略图
          $thumb = [];
//          原图
          $thumb[] = IMG_UPLOADS.$goods->og_thumb;
//          小图
          $thumb[] = IMG_UPLOADS.$goods->sm_thumb;
//          中图
          $thumb[] = IMG_UPLOADS.$goods->mid_thumb;
//          大图
          $thumb[] = IMG_UPLOADS.$goods->big_thumb;
          foreach ($thumb as $k => $v) {
//            判断是否存在值
            if (file_exists($v)) {
              @unlink($v);
            }
          }
        }

//        删除关联的会员价格
        db('member_price')->where('goods_id',$goodsId)->delete();
//        删除关联的商品属性
        db('goods_attr')->where('goods_id',$goodsId)->delete();
//        删除关联的商品相册
        $goodsPhotoRes = model('GoodsPhoto')->where('goods_id',$goodsId)->select();
//        不为空才能执行删除,(因为我们添加可以为空所以这儿使用!empty不能为空)
        if (!empty($goodsPhotoRes)) {
            foreach ($goodsPhotoRes as $k => $v) {
              if ($v->og_photo) {
                //        删除主图及其缩略图
                $photo = [];
//          原图
                $photo[] = IMG_UPLOADS.$v->og_photo;
//          小图
                $photo[] = IMG_UPLOADS.$v->sm_photo;
//          中图
                $photo[] = IMG_UPLOADS.$v->mid_photo;
//          大图
                $photo[] = IMG_UPLOADS.$v->big_photo;
                foreach ($photo as $k1 => $v1) {
//            判断是否存在值
                  if (file_exists($v1)) {
                    @unlink($v1);
                  }
                }
              }
            }
        }
        model('GoodsPhoto')->where('goods_id', $goodsId)->delete();
      });
    }

    //商品相册是否有图片上传判断
    private function _hasImgs($tmpArr)
    {
        foreach ($tmpArr as $k => $v) {
            if ($v) {
                return true;
            }
        }
        return false;
    }

    public function upload($ogThumb){
        // 获取表单上传文件 例如上传了001.jpg
        $file = request()->file($ogThumb);

        // 移动到框架应用根目录/public/uploads/ 目录下
        if($file){
            $info = $file->move(ROOT_PATH . 'public' . DS . 'static'. DS . 'uploads');
            if($info){
                // 成功上传后 获取上传信息
                // 输出 42a79759f284b767dfcb2a0197904287.jpg
                return $info->getFilename();
            }else{
                // 上传失败获取错误信息
                echo $file->getError();
            }
        }
    }
}