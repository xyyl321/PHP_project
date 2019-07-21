<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>汽车维修后台管理</title>
    <link rel="stylesheet" href="../../asset/admin/layui/css/layui.css">
</head>
<body class="layui-layout-body">
<div class="layui-layout layui-layout-admin">
    <div class="layui-header">
        <div class="layui-logo">汽车维修后台管理</div>
        <!-- 头部区域（可配合layui已有的水平导航） -->
        <ul class="layui-nav layui-layout-right">
            <li class="layui-nav-item">
                <a href="javascript:;">
                    <img src="http://t.cn/RCzsdCq" class="layui-nav-img">
                    管理员
                </a>
                <dl class="layui-nav-child">
                    <dd><a href="">基本资料</a></dd>
                    <dd><a href="">退出登录</a></dd>
                </dl>
            </li>
        </ul>
    </div>

    <div class="layui-side layui-bg-black">
        <div class="layui-side-scroll">
            <!-- 左侧导航区域（可配合layui已有的垂直导航） -->
            <ul class="layui-nav layui-nav-tree"  lay-filter="test">
                <li class="layui-nav-item">
                    <a class="" href="javascript:;">管理员管理</a>
                    <dl class="layui-nav-child">
                        <dd><a href="http://localhost/autorepair/admin/admin/index.php" class="admin">查看管理员</a></dd>
                    </dl>
                </li>
                <li class="layui-nav-item">
                    <a href="javascript:;">导航栏管理</a>
                    <dl class="layui-nav-child">
                        <dd><a href="http://localhost/autorepair/admin/nav/index.php" class="nav">查看导航栏</a></dd>
                    </dl>
                </li>
                <li class="layui-nav-item">
                    <a href="javascript:;">在线预约管理</a>
                    <dl class="layui-nav-child">
                        <dd><a href="http://localhost/autorepair/admin/order/index.php" class="order">查看预约信息</a></dd>
                    </dl>
                </li>
                <li class="layui-nav-item">
                    <a href="javascript:;">团队管理</a>
                    <dl class="layui-nav-child">
                        <dd><a href="http://localhost/autorepair/admin/team/index.php" class="team">查看团队</a></dd>
                    </dl>
                </li>
                <li class="layui-nav-item">
                    <a href="javascript:;">新闻资讯管理</a>
                    <dl class="layui-nav-child">
                        <dd><a href="http://localhost/autorepair/admin/news/index.php" class="news">查看新闻资讯</a></dd>
                    </dl>
                </li>
                <li class="layui-nav-item">
                    <a href="javascript:;">轮播图管理</a>
                    <dl class="layui-nav-child">
                        <dd><a href="http://localhost/autorepair/admin/slider/index.php" class="slider">查看轮播图信息</a></dd>
                    </dl>
                </li>
                <li class="layui-nav-item">
                    <a href="javascript:;">产品分类管理</a>
                    <dl class="layui-nav-child">
                        <dd><a href="http://localhost/autorepair/admin/types/index.php" class="types">查看产品分类</a></dd>
                    </dl>
                </li>
                <li class="layui-nav-item">
                    <a href="javascript:;">产品管理</a>
                    <dl class="layui-nav-child">
                        <dd><a href="http://localhost/autorepair/admin/goods/index.php" class="goodsSee">查看产品信息</a></dd>
                        <dd><a href="http://localhost/autorepair/admin/goods/add.php" class="goodsAdd">添加产品信息</a></dd>

                    </dl>
                </li>



            </ul>
        </div>
    </div>

