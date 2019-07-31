<?php

$sqlAddr="select * from address order by id asc limit 0,3";
$dataAddr=$mysql->query($sqlAddr)->fetch_all(MYSQLI_ASSOC);

?>

<footer>
    <div class="storeBox">
        <?php foreach ($dataAddr as $ad){ ?>
            <div class="store">
                <p class="p1 col">
                    <?php echo $ad['addnum']; ?>
                </p>
                <p class="pnull"></p>
                <p class="p1 p2">门店地址：<?php echo $ad['addr']; ?></p>
                <p class="p1 p2">预约电话：
                    <strong class="col"><?php echo $ad['tel'] ?></strong>
                </p>
                <p class="pnull"></p>
                <p class="p11">营业时间：</p>
                <p class="p11 p12">周一 ~周五：<?php echo $ad['time1'] ?></p>
                <p class="p11 p12">周六、周日：<?php echo $ad['time2'] ?></p>
            </div>
        <?php } ?>
    </div>
    <div class="diBox">
        <div class="contact">
            <div class="img img1"></div>
            <div class="img img2"></div>
            <div class="img img3"></div>
            <div class="img img4"></div>
            <div class="img img5"></div>
        </div>
        <p class="copyright">版权所有 2019-2020 汽车美容工作室 技术支持：起飞页</p>
    </div>
</footer>

<div class="fix">
    <div class="fixedBox">
        <div class="fixedLeft">
            <a href="index.html">
                <img src="/asset/home/img/logo.png" alt="">
            </a>
        </div>
        <div class="fixedRight">
            <a href="/home/index/index.php">首页</a>
            <?php
                foreach ($dataNav as $k){
             ?>
                <a class="<?php echo $nid==$k['id']?'col':''; ?>"  href="/home/nav/index.php?nid=<?php echo $k['id']; ?>"><?php echo $k['name'] ?></a>
            <?php } ?>
        </div>
    </div>
</div>

</body>
</html>

<script src="/asset/home/js/animate.js"></script>
<!--<script src="/asset/home/js/public.js"></script>-->