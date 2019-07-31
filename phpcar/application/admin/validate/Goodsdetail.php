<?php
/**
 * Created by PhpStorm.
 * User: Yuanyuan Xu
 * Date: 2019/7/31
 * Time: 11:59
 */

namespace app\admin\validate;


use think\Validate;

class Goodsdetail extends Validate
{
    protected $rule = [
        'id' => 'require|number',
        'typeid'=>'number',
        'name' => 'require',
        'shelf'=>'number',
        'market_price'=>'require|number',
        'price'=>'require|number',
        'stock'=>'require|number',
//        'content' => 'require',
        'img1'=>'require',
        'img2'=>'require'
    ];
    protected $message = [
        'id.require'=>'id必填',
        'id.number'=>'id为数字',
        'typeid'=>'产品分类的值为数值',
        'name' => '请输入产品名称',
        'shelf'=>'上下架的值为0或1的数字',
        'market_price.require'=>'市场价格必填',
        'market_price.number'=>'市场价格为数字',
        'price.require'=>'零售价格必填',
        'price.number'=>'零售价格为数字',
        'stock.require'=>'库存必填',
        'stock.number'=>'库存为数字',
//        'content' => '请输入产品内容',
        'img1' => '请上传缩略图',
        'img2'=>'请上传轮播图'
    ];
    protected $scene = [
        'add' => ['typeid', 'name', 'shelf','market_price','price','stock','content','img1','img2'],
    ];
}