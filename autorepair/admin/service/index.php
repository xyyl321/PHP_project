<?php
include "../common.php";
?>

<style>
    #addSer{
        padding-top:30px;
        display:none;
    }
    #editSer{
        padding-top:30px;
        display:none;
    }
    .layui-input{
        width:80%;
    }
    .layui-textarea{
        width:80%;
    }
</style>

<div class="layui-body">
    <div style="padding: 15px;">

        <button type="button" class="layui-btn add">添加服务项目</button>
        <table id="tableSer"></table>
        <script id="caozuo" type="text/html">
            <button type="button" class="layui-btn layui-btn-sm" onclick="edits({{d.sid}})">编辑</button>
            <button type="button" class="layui-btn layui-btn-sm layui-btn-danger" onclick="dels({{d.sid}})">删除</button>
        </script>

    </div>
</div>

<!--添加-->
<form action="" class="layui-form" id="addSer">
    <div class="layui-form-item">
        <label class="layui-form-label" for="sname">服务项目</label>
        <div class="layui-input-block inputs">
            <input type="text" name="sname" required  lay-verify="required" placeholder="请输入服务项目名称" autocomplete="off" class="layui-input">
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label" for="simg">图片地址</label>
        <div class="layui-input-block inputs">
            <input type="text" name="simg" required  lay-verify="required" placeholder="请输入图片地址" autocomplete="off" class="layui-input">
        </div>
    </div>
    <div class="layui-form-item layui-form-text">
        <label class="layui-form-label" for="scon">内容</label>
        <div class="layui-input-block">
            <textarea name="scon" placeholder="请输入详细内容" required class="layui-textarea"></textarea>
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label" for="ssort">排序</label>
        <div class="layui-input-block inputs">
            <input type="text" name="ssort" required  lay-verify="required" placeholder="请输入序号" autocomplete="off" class="layui-input">
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
<form action="" class="layui-form" id="editSer">
    <input type="hidden" name="sid" id="sid">
    <div class="layui-form-item">
        <label class="layui-form-label" for="ssname">服务项目</label>
        <div class="layui-input-block inputs">
            <input type="text" name="ssname" id="ssname" required  lay-verify="required" placeholder="请输入服务项目名称" autocomplete="off" class="layui-input">
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label" for="simg">图片地址</label>
        <div class="layui-input-block inputs">
            <input type="text" name="simg" id="simg" required  lay-verify="required" placeholder="请输入图片地址" autocomplete="off" class="layui-input">
        </div>
    </div>
    <div class="layui-form-item layui-form-text">
        <label class="layui-form-label" for="scon">内容</label>
        <div class="layui-input-block">
            <textarea name="scon" id="scon" placeholder="请输入详细内容" required class="layui-textarea"></textarea>
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label" for="ssort">排序</label>
        <div class="layui-input-block inputs">
            <input type="text" name="ssort" id="ssort" required  lay-verify="required" placeholder="请输入序号" autocomplete="off" class="layui-input">
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


        $(".service").parent().addClass("layui-this");
        $(".service").parents("li").addClass("layui-nav-itemed");

        // 数据渲染
        table.render({
            elem: "#tableSer",
            url: 'action.php?type=find',
            page:true,
            limit:10,
            limits:[10,20,30,40],
            cols: [[
                {field:'sid',title:'ID',width:50},
                {field:'sname',title:'服务项目',width:100},
                {field:'simg',title:'图片地址',width:230},
                {field:'scon',title:'详细内容'},
                {field:'ssort',title:'排序',width:100,sort:true,templet:function(d){
                        return `<input type="text" name="ssort" value="${d.ssort}"onchange="sorting(${d.sid},this)" style="width:50px"/>`
                    }},
                {title:'操作',templet:'#caozuo',width:150}
            ]]
        });

        // 添加
        let index;
        $(".add").click(function(){
            index=layer.open({
                type:1,
                title:'添加服务项目',
                skin:'layui-layer-molv',
                area:['600px','500px'],
                content:$('#addSer')
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
                    table.reload('tableSer',{
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
                    table.reload('tableSer',{
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
            title:'修改服务项目',
            skin:'layui-layer-molv',
            area:['500px','350px'],
            content:$('#editSer')
        });
        $.get("action.php?type=select",{sid:sid},function(res){
            let data=JSON.parse(res);
            // console.log(data);
            $("#sid").val(data.sid);
            $("#sname").val(data.sname);
            $("#simg").val(data.simg);
            $("#scon").val(data.scon);
            $("#ssort").val(data.ssort);
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
            $.get('action.php?type=delete',{sid:id},function(res){
                let data=JSON.parse(res);
                // console.log(data.code);
                if(data.code===200){
                    layer.close();
                    layer.msg(data.msg,{icon:1,time:800});
                    table.reload('tableSer',{
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
        $.get("action.php?type=sort",{sid:id, val:val},function(res){
            let datas=JSON.parse(res);
            // console.log(res);
            if(datas.code===200){
                layer.msg(datas.msg,{icon:1,time:800});
                table.reload('tableSer',{
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
