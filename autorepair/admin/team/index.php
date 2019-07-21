<?php
include "../common.php";
?>

<style>
    #addTeam{
        padding-top:30px;
        display:none;
    }
    #editTeam{
        padding-top:30px;
        display:none;
    }
    .layui-input{
        width:80%;
    }
</style>

<div class="layui-body">
    <div style="padding: 15px;">

        <button type="button" class="layui-btn add">添加人员</button>
        <table id="tableTeam"></table>

        <script id="caozuo" type="text/html">
            <button type="button" class="layui-btn layui-btn-sm" onclick="edits({{d.id}})">编辑</button>
            <button type="button" class="layui-btn layui-btn-sm layui-btn-danger" onclick="dels({{d.id}})">删除</button>
        </script>

    </div>
</div>

<!--添加-->
<form action="" class="layui-form" id="addTeam">
    <div class="layui-form-item">
        <label class="layui-form-label" for="head_img">头像</label>
        <div class="layui-input-block inputs">
            <input type="text" name="head_img" required  lay-verify="required" placeholder="请输入头像地址" autocomplete="off" class="layui-input">
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label" for="name">姓名</label>
        <div class="layui-input-block inputs">
            <input type="text" name="name" required  lay-verify="required" placeholder="请输入姓名" autocomplete="off" class="layui-input">
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label" for="position">职位</label>
        <div class="layui-input-block inputs">
            <input type="text" name="position" required  lay-verify="required" placeholder="请输入职位" autocomplete="off" class="layui-input">
        </div>
    </div>
    <div class="layui-form-item">
        <div class="layui-input-block">
            <button type="submit" class="layui-btn" lay-submit lay-filter="addDemo" id="tijiao">立即提交</button>
            <button type="reset" class="layui-btn layui-btn-primary">重置</button>
        </div>
    </div>
</form>

<!--编辑-->
<form action="" class="layui-form" id="editTeam">
    <input type="hidden" name="id" id="teamId">
    <div class="layui-form-item">
        <label class="layui-form-label" for="head_img">头像</label>
        <div class="layui-input-block inputs">
            <input type="text" name="head_img" id="head_img" required  lay-verify="required" placeholder="请输入头像地址" autocomplete="off" class="layui-input">
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label" for="name">姓名</label>
        <div class="layui-input-block inputs">
            <input type="text" name="name" id="name" required  lay-verify="required" placeholder="请输入姓名" autocomplete="off" class="layui-input">
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label" for="position">职位</label>
        <div class="layui-input-block inputs">
            <input type="text" name="position" id="position" required  lay-verify="required" placeholder="请输入职位" autocomplete="off" class="layui-input">
        </div>
    </div>
    <div class="layui-form-item">
        <div class="layui-input-block">
            <button type="submit" class="layui-btn" lay-submit lay-filter="editDemo">立即修改</button>
            <button type="button" class="layui-btn layui-btn-primary cancle">取消</button>
        </div>
    </div>
</form>

<?php
include "../footer.php";
?>

<script>

    var layer,table,form;
    layui.use(['element','jquery','table','form'],function(){
        var element = layui.element;
        var $ = layui.jquery;
        table = layui.table;
        layer = layui.layer;
        form =layui.form;


        $(".team").parent().addClass("layui-this");
        $(".team").parents("li").addClass("layui-nav-itemed");

        // 数据渲染
        table.render({
            elem: "#tableTeam",
            url: 'action.php?type=find',
            page:true,
            limit:5,
            limits:[5,10,15,20],
            cols: [[
                {field:'id',title:'ID'},
                {field:'head_img',title:'头像'},
                {field:'name',title:'姓名'},
                {field:'position',title:'职位'},
                {title:'操作',templet:'#caozuo'}
            ]]
        });

        // 添加
        let index;
        $(".add").click(function(){
            index=layer.open({
                type:1,
                title:'添加人员',
                skin:'layui-layer-molv',
                area:['500px','350px'],
                content:$('#addTeam')
            })
        });
        form.on('submit(addDemo)',function(data){
            // console.log(data.field);
            $.post("action.php?type=add",data.field,function(res){
                // console.log(res);
                let data=JSON.parse(res);
                if(data.code===200){
                    layer.msg(data.msg,{icon:6});
                    layer.close(index);
                    table.reload('tableTeam',{
                        url:'action.php?type=find'
                    })
                }else{
                    layer.msg(data.msg,{icon:5})
                }
            });
            return false;
        });
        form.on('submit(editDemo)',function(data){
            // console.log(data.field);
            $.post("action.php?type=edit",data.field,function(res){
                // console.log(res);
                let data=JSON.parse(res);
                if(data.code===200){
                    layer.msg(data.msg,{icon:6});
                    layer.close(editIndex);
                    table.reload('tableTeam',{
                        url:'action.php?type=find'
                    })
                }else{
                    layer.msg(data.msg,{icon:5})
                }
            });
            return false;
        });
    });

    // 编辑
    let editIndex;
    function edits(id){
        editIndex=layer.open({
            type:1,
            title:'修改人员信息',
            skin:'layui-layer-molv',
            area:['500px','350px'],
            content:$('#editTeam')
        });
        $.get("action.php?type=select",{id:id},function(res){
            let data=JSON.parse(res);
            // console.log(data);
            $("#teamId").val(data.id);
            $("#head_img").val(data.head_img);
            $("#name").val(data.name);
            $("#position").val(data.position);
        })
    }

    // 取消按钮
    $(".cancle").click(function(){
        layer.close(editIndex);
    })

    // 删除
    function dels(id){
        layer.confirm('您确定要删除吗？', {
            title:'删除',
            skin:'layui-layer-molv',
            btn: ['确定','取消'] //按钮
        }, function(){
            $.get('action.php?type=delete',{id:id},function(res){
                let data=JSON.parse(res);
                // console.log(data.code);
                if(data.code===200){
                    layer.close();
                    layer.msg(data.msg,{icon:1,time:800});
                    table.reload('tableTeam',{
                        url:'action.php?type=find'
                    });
                }else{
                    layer.msg(data.msg,{icon:2,time:1000});
                }
            })
        }, function(){
            layer.close();
        });
    }

</script>
