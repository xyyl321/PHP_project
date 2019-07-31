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
    //轮播
    let bannerBox=document.querySelector(".conBox .detailBox .banners");
    let bannerImg=document.querySelectorAll(".conBox .detailBox .banners .banner img");
    let bannerDot=document.querySelectorAll(".conBox .detailBox .banners .dots .dot");
    let bannerLeft=document.querySelector(".conBox .detailBox .banner .btnLeft");
    let bannerRight=document.querySelector(".conBox .detailBox .banner .btnRight");
    let index=0,next=0;
    bannerImg[0].style.left=0;
    bannerDot[0].classList.add("dot1");
    bannerBox.onmouseover=()=>{
        bannerLeft.style.display="block";
        bannerRight.style.display="block";
    }
    bannerBox.onmouseout=()=>{
        bannerLeft.style.display="none";
        bannerRight.style.display="none";
    }
    function toLeft(){
        bannerImg[index].style.left=0;   //当前显示的轮播图的位置
        bannerImg[next].style.left="300PX";  //下一张将要显示的轮播图的位置
        animate(bannerImg[index],{left:-300}); //当前轮播图的左移动画，以及最后停止的位置
        animate(bannerImg[next],{left:0});  //下一张
        bannerDot[index].classList.remove("dot1");
        bannerDot[next].classList.add("dot1");
        index=next;
    }
    function toRight(){
        bannerImg[index].style.left=0;
        bannerImg[next].style.left=-300+"px";
        animate(bannerImg[index],{left:300});
        animate(bannerImg[next],{left:0});
        bannerDot[index].classList.remove("dot1");
        bannerDot[next].classList.add("dot1");
        index=next;
    }
    //左箭头点击事件 (向右移动)
    bannerLeft.onclick=()=>{
        next--;
        if(next<0)
            next=bannerImg.length-1;
        toRight();
    }
    //右箭头点击事件 （向左移动）
    bannerRight.onclick=()=>{
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
}