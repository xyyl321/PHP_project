$(function(){
    $(".chaBox").hover(
        function(){
            $(".chaBox .gang1").css({
                top:'25px',
                transform:'rotate(-45deg)',
            }).animate({
                transform:'rotate(-45deg)',
            },2000);
            $(".chaBox .gang2").css({
                top:'25px',
                transform:'rotate(45deg)',
            }).animate({
                transform:'rotate(45deg)',
            },2000)
        },
        function(){
            $(".chaBox .gang1").css({
                top:'18px',
                transform:'rotate(0deg)',
            }).animate({
                transform:'rotate(0deg)',
            },2000);
            $(".chaBox .gang2").css({
                top:'28px',
                transform:'rotate(0deg)',
            }).animate({
                transform:'rotate(0deg)',
            },2000)
        }
    );

    $(".zuoBox").css({right:"-460px"});

    $(".chaBox").click(function(){
        $(".zuoBox").animate({
            right:"0"
        },500)
    })
    $(".chaBox1").click(function(){
        $(".zuoBox").animate({
            right:"-460px"
        },500)
    })
});