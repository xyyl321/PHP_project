<?php
    include "../../config/db.php";
//    导航栏
    $sqlNav="select * from nav order by sort desc";
    $dataNav=$mysql->query($sqlNav)->fetch_all(MYSQLI_ASSOC);
//    轮播图
    $sqlSlider="select * from slider order by sort desc limit 0,2";
    $dataSlider=$mysql->query($sqlSlider)->fetch_all(MYSQLI_ASSOC);
//    美容知识
    $sqlNews="select * from news order by id desc limit 0,5";
    $dataNews=$mysql->query($sqlNews)->fetch_all(MYSQLI_ASSOC);

    $sqlAddr="select * from address order by id asc limit 0,3";
    $dataAddr=$mysql->query($sqlAddr)->fetch_all(MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>汽车维修-首页</title>
    <link rel="shortcut icon" href="/asset/home/img/logo-title.ico">
    <link rel="stylesheet" href="/asset/home/css/index.css">
</head>

<body>
<header>
    <div class="headBox">
        <div class="headLeft">
            <a href="index.html">
                <img src="/asset/home/img/logo.png" alt="">
            </a>
        </div>
        <div class="headRight">
            <a href="/home/index/index.php" class="col">首页</a>
            <?php
            foreach ($dataNav as $k){
                ?>
                <a href="/home/nav/index.php?nid=<?php echo $k['id']; ?>"><?php echo $k['name'] ?></a>
            <?php } ?>
        </div>
    </div>
</header>
<div class="banner">
    <div class="bannerImg">
        <?php foreach ($dataSlider as $v){ ?>
            <img src="<?php echo $v['img']; ?>" alt="">
        <?php } ?>
    </div>
    <div class="bannerDot">
        <?php for($i=0;$i<count($dataSlider);$i++){ ?>
            <div class="dot"></div>
        <?php } ?>
    </div>
    <div class="arrow arrow1">
        <img src="/asset/home/img/bannerleft.png" alt="">
    </div>
    <div class="arrow arrow2">
        <img src="/asset/home/img/bannerright.png" alt="">
    </div>
</div>
<section>
    <div class="textBox">
        <p class="title">我们的努力，只是为了您的满意</p>
        <p class="detail">我们为您提供集汽车内外装饰、汽车影音改装、汽车精品销售、汽车美容养护于一体的大型“一站式汽车服务”</p>
    </div>
    <div class="sifen">
        <div class="fen">
            <img src="/asset/home/img/logo21.png" alt="">
            <p class="title col">汽车保养 专家系统</p>
            <div class="rail">
                <img src="/asset/home/img/rail.png" alt="">
            </div>
            <p class="con">応损捠捡换换，攴朰朲朳枛朸桸桹桺奿妀。夲夳夵壱売壳圢圤圥圦圧，圩圪囡団囤囥咍咎壱売壳圢圤圥圦応损捠捡换换。</p>
        </div>
        <div class="fen">
            <img src="/asset/home/img/logo22.png" alt="">
            <p class="title col">原厂品质 正品配件</p>
            <div class="rail">
                <img src="/asset/home/img/rail.png" alt="">
            </div>
            <p class="con">応损捠捡换换，攴朰朲朳枛朸桸桹桺奿妀。夲夳夵壱売壳圢圤圥圦圧，圩圪囡団囤囥咍咎壱売壳圢圤圥圦応损捠捡换换。</p>
        </div>
        <div class="fen">
            <img src="/asset/home/img/logo23.png" alt="">
            <p class="title col">全里程保养保障</p>
            <div class="rail">
                <img src="/asset/home/img/rail.png" alt="">
            </div>
            <p class="con">応损捠捡换换，攴朰朲朳枛朸桸桹桺奿妀。夲夳夵壱売壳圢圤圥圦圧，圩圪囡団囤囥咍咎壱売壳圢圤圥圦応损捠捡换换。</p>
        </div>
        <div class="fen">
            <img src="/asset/home/img/logo24.png" alt="">
            <p class="title col">4S店一半的价格</p>
            <div class="rail">
                <img src="/asset/home/img/rail.png" alt="">
            </div>
            <p class="con">応损捠捡换换，攴朰朲朳枛朸桸桹桺奿妀。夲夳夵壱売壳圢圤圥圦圧，圩圪囡団囤囥咍咎壱売壳圢圤圥圦応损捠捡换换。</p>
        </div>
    </div>
    <div class="textBox2">
        <p class="title">引领时代，驾驭未来</p>
        <img src="/asset/home/img/rail2.png" alt="">
    </div>
    <div class="account">
        <img src="/asset/home/img/account01.jpg" alt="">
        <div class="accleft">
            <div class="acctop">
                <a href="/home/nav/index.php?nid=2" class="company col">公司简介</a>
                <a href="/home/nav/index.php?nid=2" class="company company1 col">MORE +</a>
            </div>
            <p class="con">汽车有限公司成立于XXX年XX月XX日，是本地区唯一的授权销售服务中心和特约售后服务中心。主要从事多种品牌的整车销售、 售后服务、配件供应及信息反馈业务。</p>
            <p class="con con1">公司秉承 “尊荣无限
                至上体验”的服务理念，培养更主动贴心的服务意识,追求更周到便捷的服务水准，让每一位车主，都体验到管家般的细致专业，享受到待为贵宾般的尊崇体验公司秉承 “尊荣无限
                至上体验”的服务理念，培养更主动贴心的服务意识,追求更周到便捷的服务水准，让每一位车主，都体验到管家般的细致专业，享受到待为贵宾般的尊崇体验……</p>
        </div>
    </div>
    <div class="know">
        <div class="knows">
            <div class="knowtop">
                <a href="/home/nav/index.php?nid=5" class="knowtit col">美容知识</a>
                <a href="/home/nav/index.php?nid=5" class="knowtit knowtit1 col">MORE +</a>
            </div>
            <ul class="rows">
                <?php foreach ($dataNews as $val){ ?>
                    <li>
                        <a href="javascript:;" class="con"><?php echo $val['title'];?></a>
                        <a href="javascript:;" class="con conr"><?php echo $val['date'];?></a>
                    </li>
                <?php } ?>
<!--                <li>-->
<!--                    <a href="knowledge.html" class="con">修车五大禁忌忌开锅时贸然开引擎盖</a>-->
<!--                    <a href="knowledge.html" class="con conr">2015-01-20</a>-->
<!--                </li>-->
            </ul>
        </div>
        <img src="/asset/home/img/know.jpg" alt="">
    </div>
</section>

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
            <a href="/home/index/index.php" class="col">首页</a>
            <?php
            foreach ($dataNav as $k){
                ?>
                <a href="/home/nav/index.php?nid=<?php echo $k['id']; ?>"><?php echo $k['name'] ?></a>
            <?php } ?>
        </div>
    </div>
</div>

</body>
</html>

<script src="/asset/home/js/animate.js"></script>
<script src="/asset/home/js/index.js"></script>