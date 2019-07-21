<?php
include "../common.php";
?>

<div class="layui-body">
    <div style="padding: 15px;">
        <table id="tableOrder"></table>
        <script type="text/html" id="sexs">
            {{#  if(d.sex == 0){ }}
                男
            {{#  } else { }}
                女
            {{#  } }}
        </script>
    </div>
</div>

<?php
include "../footer.php";
?>

<script>

    layui.use(['element','jquery','table'],function() {
        var element = layui.element;
        var $ = layui.jquery;
        var table = layui.table;

        $(".order").parent().addClass("layui-this");
        $(".order").parents("li").addClass("layui-nav-itemed");

        // 数据渲染
        table.render({
            elem: "#tableOrder",
            url: 'action.php?type=find',
            page: true,
            limit: 5,
            limits: [5, 10, 15, 20],
            cols: [[
                {field: 'id', title: 'ID'},
                {field: 'service', title: '预约服务'},
                {field: 'time', title: '预约日期'},
                {field: 'name', title: '姓名'},
                {field: 'sex', title: '性别',templet:'#sexs'},
                {field: 'phone', title: '联系电话'},
                {field: 'explain', title: '补充说明'},
            ]]
        });
    })

</script>
