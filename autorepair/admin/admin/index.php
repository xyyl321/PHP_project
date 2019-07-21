<?php
    include "../common.php"
?>
<style>
    #addAdmin{
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
            <button type="button" class="layui-btn layui-btn-sm layui-btn-danger" onclick="dele({{d.id}},this)">删除</button>
        </script>
    </div>
</div>

<!--添加管理员表单-->
<form action="" class="layui-form" id="addAdmin" lay-filter="addtest1">
    <div class="layui-form-item">
        <label class="layui-form-label" for="username">姓名</label>
        <div class="layui-input-block inputs">
            <input type="text" name="username" id="username" required  lay-verify="required" placeholder="请输入姓名" autocomplete="off" class="layui-input">
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label" for="password">密码</label>
        <div class="layui-input-block inputs">
            <input type="password" id="password" name="password" required lay-verify="required" placeholder="请输入密码" autocomplete="off" class="layui-input">
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label" for="repassword">确认密码</label>
        <div class="layui-input-block inputs">
            <input type="password" id="repassword" name="repassword" required lay-verify="required" placeholder="请再次输入密码" autocomplete="off" class="layui-input">
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
            <button type="submit" class="layui-btn" lay-submit lay-filter="addDemo" id="tijiao">立即提交</button>
            <button type="reset" class="layui-btn layui-btn-primary">重置</button>
        </div>
    </div>
</form>

<?php
    include "../footer.php"
?>

<script>
    //JavaScript代码区域
    let $, layer,table,form;
    layui.use(['element','layer','jquery','form','table','laydate'], function(){
        var element = layui.element;
        var laydate = layui.laydate;
        layer = layui.layer;
        $ =layui.jquery;
        form = layui.form;
        table = layui.table;

        $(".admin").parent().addClass("layui-this");
        $(".admin").parents("li").addClass("layui-nav-itemed");

        // 添加管理员
        var index;
        $(".add").click(function(){
            index = layer.open({
                type: 1,
                title: '添加管理员',
                skin: 'layui-layer-molv',
                area:['500px','450px'],
                content: $("#addAdmin") //这里content是一个普通的String
            });
            $().ready(function() {
                // 在键盘按下并释放及提交后验证提交表单
                $("#addAdmin").validate({
                    rules: {
                        username: {
                            required: true,
                            rangelength:[6,12]
                        },
                        password: {
                            required: true,
                            rangelength:[6,12]
                        },
                        repassword: {
                            required: true,
                            rangelength:[6,12],
                            equalTo: "#password"
                        }
                    },
                    messages: {
                        username: {
                            required: "请输入用户名",
                            rangelength:"用户名必需由6-12字母或数字组成"
                        },
                        password: {
                            required: "请输入密码",
                            rangelength:"密码必需由6-12字母或数字组成"
                        },
                        repassword: {
                            required: "请输入密码",
                            rangelength:"密码必需由6-12字母或数字组成",
                            equalTo: "两次密码输入不一致"
                        }
                    }
                })
            });
        });

        // 提交表单
        form.on('submit(addDemo)', function(data){
            // console.log(data.field); //当前容器的全部表单字段，名值对形式：{name: value}
            $.post("action.php?type=add",data.field,function(res){
                // console.log(res);
                let result = JSON.parse(res);
                console.log(result);
                if(result.code===200){
                    layer.close(index);
                    layer.msg(result.msg,{icon:1,time:1500});
                    table.reload('tableAdmin',{
                        url: 'action.php?type=find'
                    });
                    form.render(null, 'addtest1');
                }else{
                    layer.msg(result.msg,{icon:0,time:1500});
                }
            });
            return false;

        });

        // 数据渲染
        table.render({
            elem: '#tableAdmin',
            url: 'action.php?type=find',
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

        //日期时间选择器
        laydate.render({
            elem: ''
            ,type: 'datetime'
        });
    });

    //黑白名单的修改
    function status(id,obj,state){
        $.get("action.php?type=status",{id:id,state:state},function(res){
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

    // 无刷新删除操作
    let indexDel;
    function dele(id,obj){
        // 询问层
        indexDel=layer.confirm(
            '您确定要删除吗？', {
            btn: ['确定','取消'],
            title:'删除管理员',
            skin: 'layui-layer-molv',
        }, function(){
                // 发送ajax请求
            $.get("action.php?type=delete",{id:id},function(res){
                let del=JSON.parse(res);
                if(del.code===200){
                    layer.close(indexDel);
                    layer.msg(del.msg,{icon:1});
                    $(obj).parents("tr").remove();
                    table.reload('tableAdmin',{
                        url: 'action.php?type=find',
                        page:{
                            curr: 1
                        }
                    });
                    form.render();
                }else{
                    layer.msg(del.msg,{icon:2});
                }
            });
        }, function(){
            layer.close(indexDel);
        });
    }

</script>