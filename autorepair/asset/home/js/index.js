window.onload=()=>{

    let fix=document.querySelector(".fix");
    window.onscroll=()=>{
        if(scrollY>=90){
            animate(fix,{top:0})
        }
        else{
            animate(fix,{top:-58},0)
        }
    }

    //轮播图
    let banner=document.querySelector(".banner");  //获取轮播图的大框
    let bannerImg=document.querySelectorAll(".banner .bannerImg img"); //获取轮播图
    let bannerDot=document.querySelectorAll(".banner .bannerDot .dot"); //获取轮播点
    let bannerArrow=document.querySelectorAll(".banner .arrow img");
    let index=0,next=0;  // 设置两个下标，index表示当前显示的轮播图的下标，next表示下一张要显示的图的下标
    bannerImg[0].style.left=0;  //默认显示第一张图
    bannerDot[0].classList.add("dot1");  //默认选中对应的第一个轮播点
    let timer;
    //左移函数
    function toLeft(){
        bannerImg[index].style.left=0;   //当前显示的轮播图的位置
        bannerImg[next].style.left="1336px";  //下一张将要显示的轮播图的位置
        animate(bannerImg[index],{left:-1336}); //当前轮播图的左移动画，以及最后停止的位置
        animate(bannerImg[next],{left:0});  //下一张
        bannerDot[index].classList.remove("dot1");
        bannerDot[next].classList.add("dot1");
        index=next;
    }
    //右移函数
    function toRight(){
        bannerImg[index].style.left=0;
        bannerImg[next].style.left=-1336+"px";
        animate(bannerImg[index],{left:1336});
        animate(bannerImg[next],{left:0});
        bannerDot[index].classList.remove("dot1");
        bannerDot[next].classList.add("dot1");
        index=next;
    }
    //设置时间函数，实现自动轮播
    timer=setInterval(()=>{
        next++;  // 让下一张图片的下标保持自增
        if(next>bannerImg.length-1)
            next=0;   //如果下标大于了图片的数量-1，让下标再从0开始
        toLeft();
    },2000)
    //当鼠标移入时，停止轮播
    banner.onmouseover=()=>{
        clearInterval(timer);
    }
    //当鼠标移出时，继续轮播
    banner.onmouseout=()=>{
        timer=setInterval(()=>{
            next++;  // 让下一张图片的下标保持自增
            if(next>bannerImg.length-1)
                next=0;   //如果下标大于了图片的数量-1，让下标再从0开始
            toLeft();
        },2000)
    }
    //左右箭头的移入移除效果
    bannerArrow.forEach((x)=>{
        x.onmouseover=()=>{
            x.style.transform="translateY(-40px)";
        }
        x.onmouseout=()=>{
            x.style.transform="translateY(0px)";
        }
    })
    //左箭头点击事件 (向右移动)
    bannerArrow[0].onclick=()=>{
        next--;
        if(next<0)
            next=bannerImg.length-1;
        toRight();
    }
    //右箭头点击事件 （向左移动）
    bannerArrow[1].onclick=()=>{
        next++;
        if(next>bannerImg.length-1)
            next=0;
        toLeft();
    }
    //轮播点点击事件
    bannerDot.forEach((v,i)=>{
        v.onclick=()=>{
            next=i;
            if(index>next)  //向右滑动
                toRight();
            if(index<next)  //向左滑动
                toLeft();
        }
    })

    //按需加载
    
}