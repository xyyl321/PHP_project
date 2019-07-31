<?php

    $sqlNews="select * from news order by id limit 0,6";
    $dataNews=$mysql->query($sqlNews)->fetch_all(MYSQLI_ASSOC);
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
                <p class="title">养护知识</p>
                <p class="eng">Knowledgement</p>
            </div>
            <span class="sp"></span>
        </div>
    </div>
    <div class="knows">
        <ul class="rows">
            <?php foreach ($dataNews as $v){ ?>
                <li>
                    <a href="javascript:;" class="con"><?php echo $v['title']; ?></a>
                    <a href="javascript:;" class="con conr"><?php echo $v['date']; ?></a>
                </li>
            <?php } ?>
        </ul>
    </div>
    <img src="/asset/home/img/aboutimg41.jpg" alt="" class="imgs imgsdi">
</section>

<?php
include "../footer.php"
?>

<script src="/asset/home/js/public.js"></script>
