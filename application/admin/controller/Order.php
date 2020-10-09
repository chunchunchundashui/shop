<?php
namespace app\admin\controller;

use Boris\DumpInspector;
use think\Controller;
use think\Request;

class Order extends Controller
{

//商品列表
    public function lst()
    {
        $status = 'all';  //  导出订单默认值
        //            订单查询
        if (request()->isPost()){
            $data = input('post.');
//            订单查询
            $where = array();
            $selectValue = trim($data['select_value']);
            if ($data['select_base'] == 'order_trade_no'){
                $where['out_trade_no'] = ['=', $selectValue];
            }else{
                $userId = db('user')->where('username',$selectValue)->value('id');
                $where['user_id'] = ['=', $userId];
            }
        }
        //            订单查询结束

//        这是在订单列表中查询开始
//      no_pay      未支付
//      pay         已支付
//      no_post     未发货
//      posted      已发货
//      got_goods   已收货
        $dataGet = input('get.');
        if (isset($dataGet['status'])){
            $status = $dataGet['status'];  //  拿到需要导出的指定数据
            $where = array();
            if ($dataGet['status'] == 'no_pay'){       //      no_pay      未支付
                $where['pay_status'] = ['=', 0];
            }else if ($dataGet['status'] == 'pay'){    //      pay         已支付
                $where['pay_status'] = ['=', 1];
            }else if ($dataGet['status'] == 'no_post'){    //      pay         未发货
                $where['post_status'] = ['=', 0];
            }else if ($dataGet['status'] == 'posted'){    //      pay         已发货
                $where['post_status'] = ['=', 1];
            }else if ($dataGet['status'] == 'got_goods'){    //      pay         已收货
                $where['post_status'] = ['=', 2];
            }
        }
        //        这是在订单列表中查询结束
        if (!isset($where)){$where = 1;}
        $lst = model('order')->order('id desc')->where($where)->where('status',1)->paginate(6,false,['query'=>Request::instance()->param()]);
        $viewData = [
            'lst' => $lst,
            'orderStatus' => $status,
        ];
        $this->assign($viewData);
        return view();
    }

//    订单查询操作
    public function orderSelect()
    {
        return view();
    }
    
//    导出订单
    public function exportOrders()
    {
        $phpexcelSrc = APP_PATH.'../plus/PHPexcel/PHPexcel.php';
        include($phpexcelSrc);
        $phpexcel = new \PHPExcel();
        $phpexcel->setActiveSheetIndex(0);
        $sheet = $phpexcel->getActiveSheet();
        $dataGet = input('get.');
        if (isset($dataGet['status'])){
            $status = $dataGet['status'];  //  拿到需要导出的指定数据
            $where = array();
            if ($dataGet['status'] == 'no_pay'){       //      no_pay      未支付
                $where['o.pay_status'] = ['=', 0];
            }else if ($dataGet['status'] == 'pay'){    //      pay         已支付
                $where['o.pay_status'] = ['=', 1];
            }else if ($dataGet['status'] == 'no_post'){    //      pay         未发货
                $where['o.post_status'] = ['=', 0];
            }else if ($dataGet['status'] == 'posted'){    //      pay         已发货
                $where['o.post_status'] = ['=', 1];
            }else if ($dataGet['status'] == 'got_goods'){    //      pay         已收货
                $where['o.post_status'] = ['=', 2];
            }else{
                $where['o.post_status'] = ['>', -1];
            }
        }
        //        这是在订单列表中查询结束
        if (!isset($where)){$where = 1;}
        $lst = model('order')->alias('o')->field('o.*,u.username')->join('user u',"o.user_id=u.id")->order('id desc')->where($where)->where('status',1)->select();
        $arr = [
            'id' => '订单id',
            'out_trade_no' => '订单编号',
            'goods_total_price' => '商品总额',
            'pay_status' => '支付状态',
            'order_status' => '订单状态',
            'post_status' => '配送状态',
            'distribution' => '配送方',
            'payment' => '支付方式',
            'name' => '收货人',
            'phone' => '手机号',
            'username' => '用户名',
            'create_time' => '下单时间',
        ];
        array_unshift($lst,$arr);
        $row = 0;  //   刚开始是从第一行开始的,逐渐增加
        foreach($lst as $k => $v){
            if ($v['pay_status'] == 0){$v['pay_status'] = "未支付";}else{$v['pay_status'] = "已支付";}
            if ($v['order_status'] == 0){$v['order_status'] = "未确认";}else if ($v['order_status'] == 1){$v['order_status'] = "已确认";}else if ($v['order_status'] == 2){$v['order_status'] = "申请退款";}else{$v['order_status'] = "退款成功";}
            if ($v['post_status'] == 0){$v['post_status'] = "未发货";}elseif ($v['post_status'] == 1){$v['post_status'] = "已发货";}
            if ($v['payment'] == 1){$v['payment'] = "支付宝";}elseif($v['payment'] == 2){$v['payment'] = "微信";}else{$v['payment'] = "余额";}
            $row += 1;
            $sheet->setCellValue('A'.$row,$v['id'])
                  ->setCellValue('B'.$row,$v['out_trade_no'])
                  ->setCellValue('C'.$row,$v['goods_total_price'])
                  ->setCellValue('D'.$row,$v['pay_status'])
                  ->setCellValue('E'.$row,$v['order_status'])
                  ->setCellValue('F'.$row,$v['post_status'])
                  ->setCellValue('G'.$row,$v['distribution'])
                  ->setCellValue('H'.$row,$v['payment'])
                  ->setCellValue('I'.$row,$v['name'])
                  ->setCellValue('J'.$row,$v['phone'])
                  ->setCellValue('K'.$row,$v['username'])
                  ->setCellValue('L'.$row,$v['create_time']);
        }
        header('Content-Type: application/vnd.ms-excel');  //  设置下载前的头信息
        header('Content-Disposition: attachment;filename="dingdan.xlsx"');
        header('Cache-Control: max-age=0');
        $phpwrite = new \PHPExcel_Writer_Excel2007($phpexcel);
        $phpwrite->save('php://output');
    }

//    商品详细
    public function detail($id)
    {
        $orderInfo = db('order')->alias('o')->join('user u',"o.user_id=u.id")->field('o.*,u.username')->where('o.id',$id)->find();
        $this->assign('orderInfo',$orderInfo);
        return view('detail');
    }


//商品修改
    public function edit()
    {
        if (request()->isPost()) {
            $data = input('post.');
            $userId = db('user')->where(array('username'=>$data['username']))->value('id');
            if ($userId){$data['user_id']=$userId;}else{$this->error('该用户不存在');}
//            将时间转换为时间戳
            $data['create_time'] = strtotime($data['create_time']);
//            dump($data);die;
            //            验证器
//            $validate = validate('order');
//            if (!$validate->check($data)) {
//                $this->error($validate->getError());
//            }
//            过滤表中不存在的字段 strict(false)
            $save = db('order')->where(array('id' => input('post.id')))->strict(false)->update($data);
            if ($save !== false) {
                $this->success('修改订单成功!', 'admin/order/lst');
            }else {
                $this->error("修改订单失败!");
            }
        }
        $id = input('id');
        $orderInfo = db('order')->alias('o')->join('user u',"o.user_id=u.id")->field('o.*,u.username')->where('o.id',$id)->find();
        $viewData = [
            'orderInfo' => $orderInfo
        ];
        $this->assign($viewData);
        return view();

    }

//    订单商品详情
    public function orderGoods($id)
    {
        $orderGoods = db('order_goods')->where(array('order_id'=>$id))->paginate(20);
        $this->assign([
            'orderGoods' => $orderGoods,
        ]);
        return view();
    }

//    订单商品的修改
    public function orderGoodsEdit()
    {
        if (request()->isPost()) {
            $data = input('post.');
            $save = db('orderGoods')->update($data);
            if ($save !== false){$this->success('修改订单商品成功');}
            else{$this->error('修改订单商品失败');}
        }
        $orderGoodsId = input('post.id');
        $orderGoodsInfo = db('orderGoods')->find($orderGoodsId);
        $this->assign([
            'orderGoodsInfo' => $orderGoodsInfo,
        ]);
        return view();
    }
    
//    商品详情删除
    public function orderGoodsDel()
    {
        $res = db('orderGoods')->delete(input('post.id'));
        $this->success('删除商品成功!');
    }

//    商品删除
    public function del()
    {
        $id = input('post.id');
        db('order_goods')->where(array('order_id'=>$id))->update(array('status'=>0));
        $order =  db('order')->where(array('id'=>$id))->update(array('status'=>0));
        if ($order == 1 ) {
            $this->success('商品删除成功!', 'admin/order/lst');
        }else {
            $this->error('商品删除失败!');
        }
    }
}
