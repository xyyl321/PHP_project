<?php
    include "../common.php";
?>
<style>
    #addTypes{
        padding-top:30px;
        display:none;
    }
    #editTypes{
        padding-top:30px;
        display:none;
    }
    .layui-input{
        width:80%;
    }
</style>

<div class="layui-body">
    <div style="padding: 15px;">
        <button type="button" class="layui-btn add">添加产品分类</button>
        <table id="typesDemo" lay-filter="test"></table>
        <script type="text/html" id="caozuo">
            <button type="button" class="layui-btn layui-btn-sm" onclick="edits({{d.id}},'{{d.name}}')">编辑</button>
            <button type="button" class="layui-btn layui-btn-sm layui-btn-danger" onclick="dels({{d.id}})">删除</button>
        </script>

    </div>
</div>

<!--添加产品分类-->
<form action="" class="layui-form" id="addTypes" lay-filter="addtest1">
    <div class="layui-form-item">
        <label class="layui-form-label" for="username">产品分类</label>
        <div class="layui-input-block inputs">
            <input type="text" name="sortname" required  lay-verify="required" placeholder="请输入分类名称" autocomplete="off" class="layui-input">
        </div>
    </div>
    <div class="layui-form-item">
        <div class="layui-input-block">
            <button type="submit" class="layui-btn" lay-submit lay-filter="addDemo">立即提交</button>
            <button type="reset" class="layui-btn layui-btn-primary">重置</button>
        </div>
    </div>
</form>

<form action="" class="layui-form" id="editTypes" lay-filter="addtest1">
    <div class="layui-form-item">
        <label class="layui-form-label" for="username">产品分类</label>
        <div class="layui-input-block inputs">
            <input type="hidden" id="sortId" name="id">
            <input type="text" name="sortname" id="sorts" required  lay-verify="required" autocomplete="off" class="layui-input">
        </div>
    </div>
    <div class="layui-form-item">
        <div class="layui-input-block">
            <button type="submit" class="layui-btn" lay-submit lay-filter="editDemo">立即修改</button>
            <button type="button" class="layui-btn layui-btn-primary" id="cancel">取消</button>
        </div>
    </div>
</form>

<?php
    include "../footer.php";
?>

<script>

    var table,layer,form;
    layui.use(['element','jquery','table','form','layer'],function(){
        var element = layui.element;
        var $ =layui.jquery;
        layer = layui.layer;
        table = layui.table;
        form = layui.form;


        $(".types").parent().addClass("layui-this");
        $(".types").parents("li").addClass("layui-nav-itemed");

        // 表格数据渲染
        table.render({
            elem: '#typesDemo',
            url: 'action.php?type=find',
            page: true,
            limit: 4,
            limits:[4,8,12],
            cols: [[
                {field:'id',title:'ID'},
                {field:'name',title:'产品分类'},
                {title:'操作',templet:'#caozuo'}
            ]]
        });

        // 点击添加，添加产品分类
        let index;
        $(".add").click(function () {
            index=layer.open({
                type:1,
                title:'添加产品分类',
                skin:'layui-layer-molv',
                area:['450px','200px'],
                content:$('#addTypes')
            })
        });
        //添加 => 立即提交
        form.on('submit(addDemo)',function(data){
            // console.log(data.field);
            $.get("action.php?type=add",data.field,function(res){
                let datas=JSON.parse(res);
                if(datas.code===200){
                    layer.msg(datas.msg,{icon:1,time:500});
                    layer.close(index);
                    table.reload('typesDemo',{
                        url: 'action.php?type=find'
                    })
                }else{
                    layer.msg(datas.msg,{icon:2,time:1000});
                }
            });
            return false;
        });
        // 编辑 => 立即修改
        form.on('submit(editDemo)',function(data){
            console.log(data.field);
            $.get("action.php?type=update",data.field,function(res){
                let datas=JSON.parse(res);
                if(datas.code===200){
                    layer.msg(datas.msg,{icon:1,time:500});
                    layer.close(indexEdit);
                    table.reload('typesDemo',{
                        url: 'action.php?type=find'
                    })
                }else{
                    layer.msg(datas.msg,{icon:2,time:1000});
                }
            });
            return false;
        });
        // 编辑 => 取消
        $("#cancel").click(function(){
            layer.close(indexEdit);
        });
    });

    // 删除操作
    function dels(id){
        layer.confirm('您确定要删除该分类吗？', {
            title:'删除',
            skin:'layui-layer-molv',
            btn: ['确定','取消'] //按钮
        }, function(){
            $.get('action.php?type=delete',{id:id},function(res){
                let data=JSON.parse(res);
                if(data.code===200){
                    layer.close();
                    layer.msg(data.msg,{icon:6,time:800});
                    table.reload('typesDemo',{
                        url:'action.php?type=find'
                    })
                }else{
                    layer.msg(data.msg,{icon:5,time:1000})
                }
            });
        }, function(){
            layer.close();
        });
    }

    // 修改操作
    let indexEdit;
    function edits(id,name){
        indexEdit=layer.open({
            type:1,
            title:'修改产品分类',
            skin:'layui-layer-molv',
            area:['450px','200px'],
            content:$('#editTypes')
        });
        $("#sortId").val(id);
        $("#sorts").val(name);
    }

</script>