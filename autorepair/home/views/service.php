<?php

    $sqlSer="select * from service order by ssort limit 0,4";
    $dataSer=$mysql->query($sqlSer)->fetch_all(MYSQLI_ASSOC);

?>

<?php
include "../header.php"
?>

<section>
    <img src="<?php echo $img1;?>" alt="" class="imgs">
    <div class="aboutUs">
        <div class="aboutBox">
            <span class="sp"></span>
            <div class="con">
                <p class="title">服务项目</p>
                <p class="eng">Services</p>
            </div>
            <span class="sp"></span>
        </div>
    </div>
    <div class="sifen">
        <?php foreach ($dataSer as $s){ ?>
            <div class="fen">
                <div class="imgBorder">
                    <img src="<?php echo $s['simg']; ?>" alt="">
                </div>
                <a href="/home/nav/index.php?nid=6" class="title"><?php echo $s['sname']; ?></a>
                <div class="rail">
                    <img src="/asset/home/img/rail.png" alt="">
                </div>
                <p class="con">
                    <?php echo $s['scon']; ?>
                </p>
            </div>
        <?php } ?>

    </div>
</section>

<?php
include "../footer.php"
?>

<script src="/asset/home/js/public.js"></script>
