<?php
namespace app\admin\controller;

use Boris\DumpInspector;
use think\Controller;

class CategoryWords extends Controller
{

//推荐词列表
    public function lst()
    {
        $lst = model('categoryWords')->field('cw.*,c.cate_name')->alias('cw')->join('category c', 'cw.category_id = c.id')->order('cw.id desc')->paginate(10);
        $viewData = [
            'lst' => $lst
        ];
        $this->assign($viewData);
        return view();
    }

//推荐词添加
    public function add()
    {
        if (request()->isPost()) {
            $data = input('post.');
//            $data['categoryWords_url'];     http://
            if ($data['link_url'] && stripos($data['link_url'], 'http://') === false) {         /*stripos() 查找字符串首次出现的位置（不区分大小写）*/
                $data['link_url'] = 'http://'. $data['link_url'];
            }
//            验证器
            $validate = validate('CategoryWords');
            if (!$validate->check($data)) {
                $this->error($validate->getError());
            }
            $add = db('categoryWords')->insert($data);
            if ($add) {
                $this->success('推荐词添加成功!', 'admin/categoryWords/lst', '', 1);
            }else {
                $this->error("推荐词添加失败!");
            }
        }
        $cataRes = model('Category')->where(array('pid' => 0))->select();
        $this->assign([
            'cateRes' => $cataRes,
        ]);
        return view();
    }

//推荐词修改
    public function edit()
    {
        if (request()->isPost()) {

            $data = input('post.');
//            $data['categoryWords_url'];     http://
            if ($data['link_url'] && stripos($data['link_url'], 'http://') === false) {         /*stripos() 查找字符串首次出现的位置（不区分大小写）*/
                $data['link_url'] = 'http://'. $data['link_url'];
            }
            //            验证器
            $validate = validate('categoryWords');
            if (!$validate->check($data)) {
                $this->error($validate->getError());
            }
            $save = db('categoryWords')->update($data);
            if ($save !== false) {
                $this->success('修改推荐词成功!', 'admin/categoryWords/lst', '', 1);
            }else {
                $this->error("修改推荐词失败!");
            }
        }
        $id = input('id');
        $categoryWordsInfo = model('categoryWords')->find($id);
        $cataRes = model('Category')->where(array('pid' => 0))->select();
        $viewData = [
            'categoryWordsInfo' => $categoryWordsInfo,
            'cateRes' => $cataRes
        ];
        $this->assign($viewData);
        return view();

    }

//    推荐词删除
    public function del()
    {
        $categoryWordsObj = db('categoryWords');
        $result = $categoryWordsObj->delete(input('post.id'));
        if ($result == 1 ) {
            $this->success('推荐词删除成功!', 'admin/categoryWords/lst');
        }else {
            $this->error('推荐词删除失败!');
        }
    }
}
