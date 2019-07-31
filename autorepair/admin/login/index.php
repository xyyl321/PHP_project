<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>后台登录</title>
    <link rel="stylesheet" href="../../asset/admin/layui/css/layui.css">
</head>
<style>
    .layui-form{
        width:400px;
        position:absolute;
        top:50%;
        left:50%;
        transform:translate(-50%,-50%);
    }
</style>
<body>
    <form class="layui-form" action="">
        <div class="layui-form-item">
            <label class="layui-form-label" for="username">用户名</label>
            <div class="layui-input-block">
                <input type="text" name="username" placeholder="请输入用户名" autocomplete="off" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label" for="password">密码</label>
            <div class="layui-input-block">
                <input type="password" name="password" placeholder="请输入密码" autocomplete="off" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <div class="layui-input-block">
                <button class="layui-btn" lay-submit lay-filter="formDemo">立即提交</button>
                <button type="reset" class="layui-btn layui-btn-primary">重置</button>
            </div>
        </div>
    </form>
</body>
</html>
<script src="../../asset/admin/layui/layui.js"></script>
<script>
    layui.use(['form','layer','jquery'],function(){
        var form=layui.form,
            layer=layui.layer;
            $=layui.jquery;

        form.on('submit(formDemo)',function(data){
            $.ajax({
                url:'action.php',
                type:'POST',
                data:data.field,
                dataType:'json',
                success:function(res){
                    // console.log(res);
                    if(res.code===200){
                        location.href="/admin/admin/index.php";
                    }else{
                        layer.msg(res.msg);
                    }
                },
            });
            return false;
        })
    })

</script>