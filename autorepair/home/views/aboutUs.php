<?php

    $sqlAbout="select * from about";
    $dataAbout=$mysql->query($sqlAbout)->fetch_assoc();

    $sqlTeam="select * from team order by id asc";
    $dataTeam=$mysql->query($sqlTeam)->fetch_all(MYSQLI_ASSOC);

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
                <p class="title">关于我们</p>
                <p class="eng">About Us</p>
            </div>
            <span class="sp"></span>
        </div>
    </div>
    <div class="detailBox">
        <div class="details">
                <?php echo $dataAbout['content'];?>
        </div>
        <img src="<?php echo $dataAbout['imgurl'] ?>" alt="">
    </div>
    <div class="aboutUs">
        <div class="aboutBox">
            <span class="sp"></span>
            <div class="con">
                <p class="title">维修师傅</p>
                <p class="eng">Master Team</p>
            </div>
            <span class="sp"></span>
        </div>
    </div>
    <div class="master">
        <?php foreach($dataTeam as $t){ ?>
            <div class="personOne">
                <img src="<?php echo $t['head_img']?>" alt="">
                <p class="name"><?php echo $t['name'];?></p>
                <p class="post"><?php echo $t['position'];?></p>
            </div>
        <?php } ?>
    </div>
</section>

<?php
    include "../footer.php"
?>

<script src="/asset/home/js/public.js"></script>
