<?php
    include "../common.php";
?>

<style>
    #addNav{
        padding-top:30px;
        display:none;
    }
    #editNav{
        padding-top:30px;
        display:none;
    }
    .layui-input{
        width:80%;
    }
</style>

<div class="layui-body">
    <div style="padding: 15px;">

        <button type="button" class="layui-btn add">添加导航</button>
        <table id="tableNav"></table>
        <script id="caozuo" type="text/html">
            <button type="button" class="layui-btn layui-btn-sm" onclick="edits({{d.id}})">编辑</button>
            <button type="button" class="layui-btn layui-btn-sm layui-btn-danger" onclick="dels({{d.id}})">删除</button>
        </script>

    </div>
</div>

<!--添加-->
<form action="" class="layui-form" id="addNav">
    <div class="layui-form-item">
        <label class="layui-form-label" for="username">名称</label>
        <div class="layui-input-block inputs">
            <input type="text" name="username" required  lay-verify="required" placeholder="请输入名称" autocomplete="off" class="layui-input">
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label" for="site">地址</label>
        <div class="layui-input-block inputs">
            <input type="text" name="site" required  lay-verify="required" placeholder="请输入地址" autocomplete="off" class="layui-input">
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label" for="sorting">排序</label>
        <div class="layui-input-block inputs">
            <input type="text" name="sorting" required  lay-verify="required" placeholder="请输入排序" autocomplete="off" class="layui-input">
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
<form action="" class="layui-form" id="editNav">
    <input type="hidden" name="id" id="sortId">
    <div class="layui-form-item">
        <label class="layui-form-label" for="username">名称</label>
        <div class="layui-input-block inputs">
            <input type="text" name="username" id="username" required  lay-verify="required" placeholder="请输入名称" autocomplete="off" class="layui-input">
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label" for="site">地址</label>
        <div class="layui-input-block inputs">
            <input type="text" name="site" id="site" required  lay-verify="required" placeholder="请输入地址" autocomplete="off" class="layui-input">
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label" for="sorting">排序</label>
        <div class="layui-input-block inputs">
            <input type="text" name="sorting" id="sorting" required  lay-verify="required" placeholder="请输入排序" autocomplete="off" class="layui-input">
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


        $(".nav").parent().addClass("layui-this");
        $(".nav").parents("li").addClass("layui-nav-itemed");

        // 数据渲染
        table.render({
            elem: "#tableNav",
            url: 'action.php?type=find',
            page:true,
            limit:5,
            limits:[5,10,15,20],
            cols: [[
                {field:'id',title:'ID',width:100},
                {field:'name',title:'导航名称',width:150},
                {field:'url',title:'跳转地址',width:500},
                {field:'sort',title:'排序',width:100,sort:true,templet:function(d){
                        return `<input type="text" name="sorts" value="${d.sort}"onchange="sorting(${d.id},this)" style="width:50px"/>`
                    }},
                {title:'操作',templet:'#caozuo'}
            ]]
        });

        // 添加
        let index;
        $(".add").click(function(){
            index=layer.open({
                type:1,
                title:'添加导航',
                skin:'layui-layer-molv',
                area:['500px','350px'],
                content:$('#addNav')
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
                    table.reload('tableNav',{
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
                    table.reload('tableNav',{
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
            title:'修改导航',
            skin:'layui-layer-molv',
            area:['500px','350px'],
            content:$('#editNav')
        });
        $.get("action.php?type=select",{id:id},function(res){
            let data=JSON.parse(res);
            // console.log(data);
            $("#sortId").val(data.id);
            $("#username").val(data.name);
            $("#site").val(data.url);
            $("#sorting").val(data.sort);
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
                    table.reload('tableNav',{
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

    // 排序
    function sorting(id,obj){
        let val=$(obj).val();
        $.get("action.php?type=sort",{id:id, val:val},function(res){
            let datas=JSON.parse(res);
            // console.log(res);
            if(datas.code===200){
                layer.msg(datas.msg,{icon:1,time:800});
                table.reload('tableNav',{
                    url:'action.php?type=find',
                    page: {
                    curr: 1 //重新从第 1 页开始
                }
                });
            }else{
                layer.msg(datas.msg,{icon:2,time:1000});
            }
        })
    }

</script>
