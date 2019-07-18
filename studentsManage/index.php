<?php
//设置头信息
header('Content-type:text/html;charset=utf8');
//连接数据库
include 'db.php';

$sql="select * from students order by id desc ";
$result=$mysql->query($sql);
//难道数据库中的内容，通过数组的格式
$data=$result->fetch_all(MYSQLI_ASSOC);
//var_dump($data);
?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>学生管理系统</title>
    <link rel="stylesheet" href="css/layui.css" media="all">
</head>
<style>
    /*table{*/
    /*    text-align:center;*/
    /*}*/

</style>
<body class="layui-layout-body">
<div class="layui-layout layui-layout-admin">
    <div class="layui-header">
        <div class="layui-logo">学生后台管理</div>
        <!-- 头部区域（可配合layui已有的水平导航） -->
        <ul class="layui-nav layui-layout-left">
            <li class="layui-nav-item"><a href="">学生信息</a></li>
            <li class="layui-nav-item"><a href="">班级信息</a></li>
            <li class="layui-nav-item"><a href="">年级信息</a></li>
            <li class="layui-nav-item">
                <a href="javascript:;">其他信息</a>
                <dl class="layui-nav-child">
                    <dd><a href="">邮件管理</a></dd>
                    <dd><a href="">消息管理</a></dd>
                    <dd><a href="">授权管理</a></dd>
                </dl>
            </li>
        </ul>
        <ul class="layui-nav layui-layout-right">
            <li class="layui-nav-item">
                <a href="javascript:;">
                    <img src="http://t.cn/RCzsdCq" class="layui-nav-img">
                    Admin
                </a>
                <dl class="layui-nav-child">
                    <dd><a href="">基本资料</a></dd>
                    <dd><a href="">安全设置</a></dd>
                </dl>
            </li>
            <li class="layui-nav-item"><a href="">退出管理</a></li>
        </ul>
    </div>

    <div class="layui-side layui-bg-black">
        <div class="layui-side-scroll">
            <!-- 左侧导航区域（可配合layui已有的垂直导航） -->
            <ul class="layui-nav layui-nav-tree"  lay-filter="test">
                <li class="layui-nav-item layui-nav-itemed">
                    <a class="" href="javascript:;">学生基本信息</a>
                    <dl class="layui-nav-child">
                        <dd><a href="javascript:;">学生档案信息</a></dd>
                        <dd><a href="javascript:;">学生个人课表</a></dd>
                    </dl>
                </li>
                <li class="layui-nav-item">
                    <a href="javascript:;">学生课程管理</a>
                    <dl class="layui-nav-child">
                        <dd><a href="javascript:;">学生必修课程</a></dd>
                        <dd><a href="javascript:;">学生选修课程</a></dd>
<!--                        <dd><a href="">超链接</a></dd>-->
                    </dl>
                </li>
                <li class="layui-nav-item">
                    <a href="javascript:;">学生成绩查询</a>
                    <dl class="layui-nav-child">
                        <dd><a href="javascript:;">第一学期</a></dd>
                        <dd><a href="javascript:;">第二学期</a></dd>
                        <dd><a href="javascript:;">第三学期</a></dd>
                        <dd><a href="javascript:;">第四学期</a></dd>
                    </dl>
                </li>
                <li class="layui-nav-item"><a href="">权限管理</a></li>
            </ul>
        </div>
    </div>

    <div class="layui-body">
        <!-- 内容主体区域 -->
        <div style="padding: 15px;">
            <table  class="layui-table">
                <thead>
                    <tr class="">
<!--                        <th lay-data="{type:'checkbox'}"></th>-->
                        <th lay-data="{field:'username', width:80, sort: true}">姓名</th>
                        <th lay-data="{field:'sex', width:80}">性别</th>
                        <th lay-data="{field:'age', width:80, sort: true}">年龄</th>
                        <th lay-data="{field:'tel', width:160}">联系方式</th>
                        <th lay-data="{fixed: 'right', width:178, align:'center', toolbar: '#barDemo'}">操作</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data as $k=>$v){ ?>
                        <tr>
    <!--                        <td lay-data="{type:'checkbox'}"></td>-->
                            <td><?php echo $v['name']?></td>
                            <?php if ($v['sex']==0){
                                echo "<th>男</th>";
                            }else{
                                echo "<th>女</th>";
                            } ?>
                            <td><?php echo $v['age']?></td>
                            <td><?php echo $v['tel']?></td>
                            <td>
                                <?php echo " <a href=\"edit.php?id=$v[id]\"><button type=\"button\" class=\"layui-btn\"><i class=\"layui-icon layui-icon-edit\"></i></button></a>
                                        <a href=\"del.php?id=$v[id]\"><button type=\"button\" class=\"layui-btn layui-btn-danger\"><i class=\"layui-icon layui-icon-delete\"> </i></button></a>" ?>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            <a href="add.php" style="margin-left:300px;">
                <button type="button" class="layui-btn layui-btn-primary layui-btn-fluid" style="width:300px;"><i class="layui-icon layui-icon-add-1"></i></button>
            </a>
            <div id="pageDemo"></div>
<!--            <script type="text/html" id="barDemo">-->
<!--                <a class="layui-btn layui-btn-primary layui-btn-xs" lay-event="detail">查看</a>-->
<!--                <a class="layui-btn layui-btn-xs" lay-event="edit">编辑</a>-->
<!--                <a class="layui-btn layui-btn-danger layui-btn-xs" lay-event="del">删除</a>-->
<!--            </script>-->

        </div>
    </div>

    <div class="layui-footer">
        <!-- 底部固定区域 -->
        COPYRIGHT 2019 xxx大学后台管理
    </div>
</div>
<script src="js/layui.js"></script>
<script>
    //JavaScript代码区域
    layui.use(['laypage', 'layer', 'table', 'element'], function(){
        var laypage = layui.laypage //分页
            ,layer = layui.layer //弹层
            ,table = layui.table //表格
            ,element = layui.element //元素操作

        table.render({
            elem: '#demo'
            ,id: 'idTest'
            ,width: 400
            ,height: 420
            ,url: '/demo/table/user/' //数据接口
            ,title: '用户表'
            ,page: true //开启分页
            ,toolbar: 'default' //开启工具栏，此处显示默认图标，可以自定义模板，详见文档

        });

        // //分页
        laypage.render({
            elem: 'pageDemo' //分页容器的id
            ,count: 400 //总页数
            ,limit: 3
            ,skin: '#1E9FFF' //自定义选中色值
            ,skip: true //开启跳页
            ,jump: function(obj, first){
                if(!first){
                    layer.msg('第'+ obj.curr +'页', {offset: 'b'});
                }
            }
        });



    });

</script>
</body>
</html>