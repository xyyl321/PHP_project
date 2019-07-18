<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">

</head>
<style>
    .container{
        margin-top:50px;
    }

</style>
<body>
    <div class="container">
        <form method="post" action="tijiao.php" class="form-horizontal" >
            <div class="form-group">
                <label for="inputName" class="col-sm-2 control-label">姓名</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputName" placeholder="请输入您的姓名" name="name">
                </div>
            </div>
            <div class="form-group">
                <label for="inputSex" class="col-sm-2 control-label">性别</label>
                <div class="col-sm-10">
                    <label class="radio-inline">
                        <input type="radio" name="sex" value="0" checked>男
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="sex" value="1">女
                    </label>
                </div>
            </div>
            <div class="form-group">
                <label for="inputAge" class="col-sm-2 control-label">年龄</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" id="inputAge" placeholder="请输入您的年龄" name="age">
                </div>
            </div>
            <div class="form-group">
                <label for="inputTel" class="col-sm-2 control-label">联系方式</label>
                <div class="col-sm-10">
                    <input type="tel" class="form-control" id="inputTel" placeholder="请输入您的联系方式" name="tel">
                </div>
            </div>
            <div class="form-group">
                <label for="inputTel" class="col-sm-2 control-label"></label>
                <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">提交</button>
                </div>
            </div>
        </form>
    </div>

</body>
</html>