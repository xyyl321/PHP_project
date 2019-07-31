<?php
   include "../../config/db.php";
   $sqlAbout="select * from about";
   $dataAbout=$mysql->query($sqlAbout)->fetch_assoc();
//   var_dump($dataAbout);
?>

<?php
include "../common.php";
?>
<style>
    .layui-form{
        width:80%;
        margin-left:100px;
        margin-top:20px;
    }
    #content{
        height:200px;
    }
    .layui-upload-list{
        height:150px;
    }
    #demo1{
        height:150px;
    }
</style>

<div class="layui-body">
    <div style="padding: 15px;">

        <form class="layui-form" action="">
            <input type="hidden" name="id" value="<?php echo  $dataAbout['id']; ?>">
            <div class="layui-form-item layui-form-text">
                <label class="layui-form-label" for="content">内容</label>
                <div class="layui-input-block">
                    <textarea name="content" id="content" placeholder="请输入详细内容" class="layui-textarea">
                        <?php echo $dataAbout['content']; ?>
                    </textarea>
                </div>
            </div>
            <input type="hidden" name="imgurl" id="imgurl" value="<?php echo $dataAbout['imgurl']; ?>">
            <div class="layui-form-item layui-form-text">
                <label class="layui-form-label" for="content">图片</label>
                <div class="layui-input-inline">
                    <button type="button" class="layui-btn" id="test1">
                        <i class="layui-icon">&#xe67c;</i>上传图片
                    </button>
                </div>
                <div class="layui-form-mid layui-word-aux">图片最佳尺寸：600*400&nbsp;&nbsp;&nbsp;图片大小限制：500KB</div>
            </div>
            <div class="layui-form-item">
                <div class="layui-input-block">
                    <div class="layui-upload-list">
                        <img class="layui-upload-img" id="demo1" src="<?php echo $dataAbout['imgurl']; ?>">
                    </div>
                </div>
            </div>
            <div class="layui-form-item">
                <div class="layui-input-block">
                    <button class="layui-btn" lay-submit lay-filter="formDemo">立即提交</button>
                </div>
            </div>
        </form>

    </div>
</div>

<?php
include "../footer.php";
?>
<script>

    layui.use(['element','upload','form','jquery','layer'],function(){
        var {element,upload,form,$,layer}=layui;

        $(".about").parent().addClass("layui-this");
        $(".about").parents("li").addClass("layui-nav-itemed");

        upload.render({
            elem:'#test1',
            accept:'images',
            acceptMime:'image/*',
            size:500,
            url:'../upload/index.php',
            done:function(res){
                // console.log(res);
                if(res.code===200){
                    layer.msg(res.msg,{icon:6});
                    $("#demo1").attr("src",res.src);
                    $("#imgurl").val(res.src);
                }else{
                    layer.msg(res.msg,{icon:0});
                }
            }
        });

        form.on('submit(formDemo)',function(data){
            //jquery
            // $.post("action.php",data.field,function(res){
            //     let datas=JSON.parse(res);
            //     if(datas.code===200){
            //         layer.msg(datas.msg,{icon:6});
            //     }else{
            //         layer.msg(datas.msg,{icon:5});
            //     }
            // });

            //js原生
            let {id,content,imgurl}=data.field;
            let xml = new XMLHttpRequest();
            xml.open('POST','/admin/about/action.php',true);
            xml.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
            xml.responseType='json';
            xml.send(`id=${id}&content=${content}&imgurl=${imgurl}`);
            xml.onreadystatechange=function(){
                if(xml.readyState==4){
                    if(xml.status==200){
                        let datas=xml.response;
                        if(datas.code==200){
                            layer.msg(datas.msg,{icon:6})
                        }else{
                            layer.msg(datas.msg,{icon:6})
                        }
                    }
                }
            };
            return false;
        })
    })

</script>


