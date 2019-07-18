<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>学生管理系统</title>
    <link rel="stylesheet" href="css/layui.css" media="all">
</head>
<style>

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
            <form class="layui-form" action="insert.php" method="post">
                <div class="layui-form-item">
                    <label class="layui-form-label">姓名</label>
                    <div class="layui-input-block">
                        <input type="text" name="name" required  lay-verify="required" placeholder="请输入姓名" autocomplete="off" class="layui-input">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">性别</label>
                    <div class="layui-input-block">
                        <input type="radio" name="sex" value="0" title="男" checked>
                        <input type="radio" name="sex" value="1" title="女">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">年龄</label>
                    <div class="layui-input-block">
                        <input type="text" name="age" required  lay-verify="required" placeholder="请输入年龄" autocomplete="off" class="layui-input">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">联系方式</label>
                    <div class="layui-input-block">
                        <input type="tel" name="tel" required  lay-verify="required" placeholder="请输入联系方式" autocomplete="off" class="layui-input">
                    </div>
                </div>

                <div class="layui-form-item">
                    <div class="layui-input-block">
                        <button type="submit" class="layui-btn" lay-filter="formDemo">立即提交</button>
                        <button type="reset" class="layui-btn layui-btn-primary">重置</button>
                        <a href="index.php"><button type="button" class="layui-btn layui-btn-primary">返回</button></a>
                    </div>
                </div>
            </form>

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
    layui.use('form', function(){
        var form = layui.form;

        //监听提交
        // form.on('submit(formDemo)', function(data){
        //     layer.msg(JSON.stringify(data.field));
        //     return false;
        // });
    });

</script>
</body>
</html>