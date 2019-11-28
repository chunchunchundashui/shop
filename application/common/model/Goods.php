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
    protected static function init()
    {
        Goods::beforeInsert(function ($goods) {
            $ogThumb = $goods->upload('og_thumb');
            dump($ogThumb);die;
        });
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