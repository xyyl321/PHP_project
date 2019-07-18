
<?php
    include "../common.php"
?>
<style>
    #addAdmin{
        display:none;
        padding-top:30px;
    }
    #editAdmin{
        display:none;
        padding-top:30px;
    }
    .inputs{
        width:62%;
    }
</style>

<div class="layui-body">
    <!-- 内容主体区域 -->
    <div style="padding: 15px;">
        <button type="button" class="layui-btn add">添加管理员</button>
        <table id="tableAdmin" lay-filter="test"></table>

        <script id="sta" type="text/html">
            {{#  if(d.status==1){ }}
                <button type="button" class="layui-btn layui-btn-sm layui-btn-normal" onclick="status({{d.id}},this,0)">白名单</button>
            {{#  } else { }}
                <button type="button" class="layui-btn layui-btn-sm layui-btn-warm" onclick="status({{d.id}},this,1)">黑名单</button>
            {{#  } }}
        </script>
        <script id="caozuo" type="text/html">
            <button type="button" class="layui-btn layui-btn-sm" onclick="edits({{d.id}})">编辑</button>
            <button type="button" class="layui-btn layui-btn-sm layui-btn-danger" onclick="dele({{d.id}},this)">删除</button>
        </script>

    </div>
</div>


<form action="" class="layui-form" id="addAdmin">
    <div class="layui-form-item">
        <label class="layui-form-label">姓名</label>
        <div class="layui-input-block inputs">
            <input type="text" name="username" required  lay-verify="required" placeholder="请输入姓名" autocomplete="off" class="layui-input">
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">密码</label>
        <div class="layui-input-block inputs">
            <input type="password" name="password" required lay-verify="required" placeholder="请输入密码" autocomplete="off" class="layui-input">
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">确认密码</label>
        <div class="layui-input-block inputs">
            <input type="password" name="repassword" required lay-verify="required" placeholder="请再次输入密码" autocomplete="off" class="layui-input">
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">状态</label>
        <div class="layui-input-block">
            <input type="radio" name="status" value="0" title="黑名单">
            <input type="radio" name="status" value="1" title="白名单" checked>
        </div>
    </div>
    <div class="layui-form-item">
        <div class="layui-input-block">
            <button class="layui-btn" lay-submit lay-filter="formDemo">立即提交</button>
            <button type="reset" class="layui-btn layui-btn-primary">重置</button>
        </div>
    </div>

</form>

<form action="" class="layui-form" id="editAdmin">
    <div class="layui-form-item">
        <label class="layui-form-label">姓名</label>
        <div class="layui-input-block inputs">
            <input type="text" name="username" required  lay-verify="required" placeholder="请输入姓名" autocomplete="off" class="layui-input username">
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">状态</label>
        <div class="layui-input-block">
            <input  class="blacks" type="radio" name="status" value="0" title="黑名单">
            <input class="writes" type="radio" name="status" value="1" title="白名单">
        </div>
    </div>
    <div class="layui-form-item">
        <div class="layui-input-block">
            <button class="layui-btn" lay-submit lay-filter="">修改</button>
        </div>
    </div>

</form>

<?php
    include "../footer.php"
?>
<script>
    //JavaScript代码区域
    let $, layer;
    layui.use(['element','layer','jquery','form','table'], function(){
        var element = layui.element;
        layer = layui.layer;
        $ =layui.jquery;
        var form = layui.form;
        var table = layui.table;

        // 添加管理员
        var index;
        $(".add").click(function(){
            index = layer.open({
                type: 1,
                title: '添加管理员',
                skin: 'layui-layer-molv',
                area:['500px','350px'],
                content: $("#addAdmin") //这里content是一个普通的String
            });
        });

        // 提交表单
        form.on('submit(formDemo)', function(data){
            // console.log(data.field); //当前容器的全部表单字段，名值对形式：{name: value}
            $.post("add.php",data.field,function(res){
                // console.log(res);
                let result = JSON.parse(res);
                // console.log(result);
                if(result.code=='200'){
                    layer.close(index);
                    layer.msg(result.msg,{icon:1,time:1500});
                }else if(result.code=='400'){
                    layer.msg(result.msg,{icon:0,time:1500});
                }
            });
            return false;
        });

        // 数据渲染
        table.render({
            elem: '#tableAdmin',
            url: 'find.php',
            // toolbar: true,
            page: true,
            limit:5,
            limits:[5,10,15,20],
            cols:[[
                {field:'id',title:'ID',sort:true},
                {field:'username',title:'用户名'},
                {field:'time',title:'注册时间'},
                {field:'status',title:'状态',templet:'#sta'},
                {title:'操作',templet:'#caozuo'}
            ]]
        });
    });

    //黑白名单的修改
    function status(id,obj,state){
        $.get("status.php",{id:id,state:state},function(res){
            let stas=JSON.parse(res);
            if(state==1){
                if(stas.code==200){
                    $(obj).parent().html(`<button type="button" class="layui-btn layui-btn-sm layui-btn-normal" onclick="status(${id},this,0)">白名单</button>`);
                    layer.msg(stas.msg,{icon:1,time:500})
                }else{
                    layer.msg(stas.msg,{icon:2,time:500})
                }
            }else{
                if(stas.code==200){
                    $(obj).parent().html(`<button type="button" class="layui-btn layui-btn-sm layui-btn-warm" onclick="status(${id},this,1)">黑名单</button>`);
                    layer.msg(stas.msg,{icon:1,time:500})
                }else{
                    layer.msg(stas.msg,{icon:2,time:500})
                }
            }
        })
    };

    // 删除操作
    let indexDel;
    function dele(id,obj){
        indexDel=layer.confirm('您确定要删除吗？', {
            btn: ['确定','取消']
        }, function(){
            $.get("delete.php",{id:id},function(res){
                let del=JSON.parse(res);
                if(del.code==200){
                    layer.close(indexDel);
                    layer.msg(del.msg,{icon:1});
                    $(obj).parents("tr").remove();
                }else{
                    layer.msg(del.msg,{icon:2});
                }
            });
        }, function(){
            layer.close(indexDel);
        });
    }

    // 编辑数据
    function edits(id){
        console.log(id);
        $.get('select.php',{id:id},function(res){
            let editData=JSON.parse(res);
            // console.log(editData);
            let con=$("#editAdmin");
            layer.open({
                type: 1,
                title: '修改管理员',
                skin: 'layui-layer-molv',
                area:['500px','250px'],
                content: $("#editAdmin"),
                success:function(){
                    $("#editAdmin .username").val(editData.username);
                    if(editData.status==1){
                        $("#editAdmin .writes").attr({ checked: "checked"});
                    }else{
                        $("#editAdmin .blacks").attr({ checked: "checked"});
                    }

                }
            })
        })
    }

</script>