<?php
/**
 * Created by PhpStorm.
 * User: Yuanyuan Xu
 * Date: 2019/8/2
 * Time: 17:06
 */

namespace app\home\controller;


use think\Controller;
use think\Db;

class Index extends Base
{
    public function index(){
        $nid=$this->request->get('id');
        $this->assign('nid',$nid);
        switch($nid){
            // 关于我们
            case 1:
                //团队信息
                $team=Db::table('team')->order('id','asc')->select();
                $this->assign('team',$team);
                return $this->fetch('aboutUs');
                break;
            // 产品中心
            case 2:
                // 产品分类
                $classes=[['id'=>0,'type_name'=>'全部']];
                $datacla=Db::table('goodsclass')->order('id','asc')->select();
                $classes=array_merge($classes,$datacla);
                // 产品
                $detail=Db::table('goodsdetail')->field('gid,name,img1,typeid')->select();
                $goods=[];
                $goods[0]=$detail;
                for($i=1;$i<count($classes);$i++){
                    $arr=[];
                    for($j=0;$j<count($detail);$j++){
                        if($detail[$j]['typeid']==$classes[$i]['id']){
                            array_push($arr,$detail[$j]);
                        }
                    }
                    array_push($goods,$arr);
                }
                $this->assign('classes',$classes);
                $this->assign('goods',$goods);
                return $this->fetch('product');
                break;
            // 服务项目
            case 3:
                // 服务项目
                $service=Db::table('service')->order('ssort','desc')->select();
                $this->assign('service',$service);
                return $this->fetch('service');
                break;
            // 新闻资讯
            case 4:
                // 美容知识
                $news=Db::table('news')->order('id','desc')->limit(0,6)->field('id,title,date')->select();
                $this->assign('news',$news);
                return $this->fetch('news');
                break;
            // 在下预约
            case 5:
                return $this->fetch('online');
                break;
            default:
                // 轮播图
                $banner=Db::table('banner')->order('sort','desc')->select();
                $this->assign('banner',$banner);
                //四个模块
                $aspect=Db::table('aspect')->order('sort','desc')->select();
                $this->assign('aspect',$aspect);
                //美容知识
                $news=Db::table('news')->order('id','desc')->limit(0,5)->field('id,title,date')->select();
                $this->assign('news',$news);
                return $this->fetch('index');
                break;
        }
    }
    // 产品详情
    public function details(){
        $this->assign('nid',2);
        $gid=$this->request->get();
        $model=model('Goodsdetail');
        $data=$model->queryone($gid);
        $data['imgs']=explode(',',$data['img2']);
        $this->assign('details',$data);
        return $this->fetch('details');
    }
    // 美容知识
    public function knowledge(){
        $this->assign('nid',4);
        $id=$this->request->get('kid');
        $data=Db::table('news')->where('id',$id)->find();
        $this->assign('news',$data);
        return $this->fetch('knowledge');
    }
}