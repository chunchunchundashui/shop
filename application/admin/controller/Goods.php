<?php
namespace app\admin\controller;

use Boris\DumpInspector;
use Symfony\Component\Routing\Tests\Matcher\DumpedUrlMatcherTest;
use think\Controller;
use Catetree\Catetree;

class Goods extends Controller
{

//商品类型列表
    public function lst()
    {
        // tp5的多表查询这是一种方法,很简单的,
        $join = [
    ['category c','g.category_id=c.id'],
    ['brand b','g.brand_id=b.id', 'LEFT'],          // 'LEFT'使用左表查询的
    ['type t','g.type_id=t.id', 'LEFT'],
    ['product p', 'g.id = p.goods_id', 'LEFT']
        ];
        // 分布给前台数据商品
        $lst = model('goods')->alias('g')->field('g.*, c.cate_name, b.brand_name, t.type_name, SUM(p.goods_number) gn')->join($join)->group('g.id')->order('g.id desc')->paginate(10);
        $viewData = [
            'lst' => $lst
        ];
        $this->assign($viewData);
        return view();
    }

//商品类型添加
    public function add()
    {
        if (request()->isPost()) {
            $data = input('post.');
//            dump($data);die;
//            验证器
            $validate = validate('goods');
            if (!$validate->check($data)) {
                $this->error($validate->getError());
            }
            $add = model('goods')->save($data);
            if ($add) {
                $this->success('商品添加成功!', 'admin/goods/lst');
            }else {
                $this->error("商品添加失败!");
            }
        }
        //会员级别数据
        $mlRes = db('memberLevel')->field('id,level_name')->select();
        //获取商品类型
        $typeView = db('type')->select();
        //品牌分类
        $brandRes = db('brand')->field('id,brand_name')->select();
        //商品分类
        $Category = new Catetree();
        $CategoryObj = model('Category');
        $CategoryRes = $CategoryObj->order('sort DESC')->select();
        $CategoryRes = $Category->Catetree($CategoryRes);
        $this->assign([
            'mlRes' => $mlRes,
            'typeView' => $typeView,
            'brandRes' => $brandRes,
            'Category' => $CategoryRes,
        ]);
        return view();
    }

//商品类型修改
    public function edit()
    {
        if (request()->isPost()) {
            $data = input('post.');
//            dump($data);die;
//            验证器
//            $validate = validate('goods');
//            if (!$validate->check($data)) {
//                $this->error($validate->getError());
//            }
            $update = model('goods')->update($data);
            if ($update) {
                $this->success('商品修改成功!', 'admin/goods/lst');
            }else {
                $this->error("商品修改失败!");
            }
        }
//        商品id
        $goodsId = input('id');
        //会员级别数据
        $mlRes = db('memberLevel')->field('id,level_name')->select();
        //获取商品类型
        $typeView = db('type')->select();
//        会员价格
        $_mpRes = db('memberPrice')->where('goods_id',$goodsId)->select();
//        数组重组,将mlevel_id作为id来查询出价格
        $mpRes = array();
        foreach ($_mpRes as $k => $v) {
            $mpRes[$v['mlevel_id']] = $v;
        }
       // dump($mpRes);die;
//        商品相册
        $gphotoRes = db('goods_photo')->where('goods_id',$goodsId)->select();

        //品牌分类
        $brandRes = db('brand')->field('id,brand_name')->select();
        //商品分类
        $Category = new Catetree();
//        查询当前商品基本信息
        $goods = db('goods')->find($goodsId);
        // 查询当前商品属性信息
        $attrRes = db('attr')->where('type_id',$goods['type_id'])->select();
//        查询当前商品拥有的商品属性goods_attr
        $_gattrRes = db('goods_attr')->where('goods_id',$goodsId)->select();
//        更改二维数组结构为三维数组
        $gattrRes = array();
        foreach ($_gattrRes as $k => $v) {
            $gattrRes[$v['attr_id']][] = $v;
        }
//         dump($gattrRes);die;
        // 获取无限极分类信息
        $CategoryObj = model('Category');
        $CategoryRes = $CategoryObj->order('sort DESC')->select();
        $CategoryRes = $Category->Catetree($CategoryRes);
        $this->assign([
            'mlRes' => $mlRes,
            'typeView' => $typeView,
            'brandRes' => $brandRes,
            'Category' => $CategoryRes,
            'goods' => $goods,
            'mpRes' => $mpRes,
            'gphotoRes' => $gphotoRes,
            'attrRes' => $attrRes,
            'gattrRes' => $gattrRes,
        ]);
        return view();
    }

//    商品类型删除
    public function del()
    {
      $id = input('id');
//      使用数组进行条件删除(以后建议使用这种方法)
      $del = model('goods')->destroy($id);
        if ($del) {
          $this->success('商品删除成功', 'lst');
        }else {
          $this->error('商品删除失败');
        }

    }

    //上传图片
    public function upload(){
        // 获取表单上传文件 例如上传了001.jpg
        $file = request()->file('goods_img');
        // 移动到框架应用根目录/public/uploads/ 目录下
        if($file){
            $info = $file->move(ROOT_PATH . 'public' . DS . 'static' . DS  . 'uploads');
            if($info){
                return $info->getSaveName();
            }else{
                // 上传失败获取错误信息
                echo $file->getError();
                die;
            }
        }
    }
    
    
//    商品的库存展示
  public function product($id)
    {
        if (request()->isPost()) {
            db('product')->where('goods_id',$id)->delete();
            $data = input('post.');
//            拿到两个数组分出来进行循环插入
            $goodsAttr = $data['goods_attr'];
            $goodsNum = $data['goods_num'];
//            声明一个插入到product表中
            $product = db('product');
            foreach ($goodsNum as $k => $v) {
//              定义一个空数组接收参数
              $strArr = array();
//              循环为一维数组
              foreach ($goodsAttr as $k1 => $v1) {
//                  判断单选值为空就不能添加
//                  intval转换为数值行
                  if (intval($v1[$k]) <= 0){
//                      可以指定跳出几层循环
                      continue 2;
                  }
//                  给数组赋值根据$k进行赋值
                  $strArr[] = $v1[$k];
              }
//              排序从小到大
                sort($strArr);
//              数组转为字符串
              $strArr = implode(',', $strArr);
              $product->insert([
                'goods_id' => $id,
                'goods_number' => $v,
                'goods_attr' => $strArr,
              ]);
            }
            $this->success('库存添加成功!');
            return;
        }

  //    查找当前id的值
      $_radioAttrRes = db('goods_attr')
        ->alias('g')
        ->field('g.id,g.attr_id,g.attr_value,a.attr_name')
        ->join('attr a', 'g.attr_id = a.id')
        ->where(array('g.goods_id'=>$id,'a.attr_type'=>1))->select();
      $radioAttrRes = array();
      //   数组格式重组 循环以attr_name分组出来
      foreach ($_radioAttrRes as $k => $v) {
        $radioAttrRes[$v['attr_name']][] = $v;
      }

//    获取商品库存信息
      $goodsProRes = db('product')->where('goods_id',$id)->select();
//      dump($goodsProRes);die;
      $this->assign([
        'radioAttrRes' => $radioAttrRes,
          'goodsProRes' => $goodsProRes,
      ]);
      return view();
  }

// 使用ajax异步删除商品相册图片
  public function ajaxdelpic() {
    $id = input('id');
    $gphoto = db('goods_photo');
    $gphotos = $gphoto->find($id);
    $ogPhoto = IMG_UPLOADS.$gphotos['og_photo'];
    $bigPhoto = IMG_UPLOADS.$gphotos['big_photo'];
    $midPhoto = IMG_UPLOADS.$gphotos['mid_photo'];
    $smPhoto = IMG_UPLOADS.$gphotos['sm_photo'];
    @unlink($ogPhoto);
    @unlink($bigPhoto);
    @unlink($midPhoto);
    @unlink($smPhoto);
    $del = $gphoto->delete($id);
    if ($del) {
        $this->success('删除成功');
    }else {
        $this->error('删除失败');
    }
  }
}
