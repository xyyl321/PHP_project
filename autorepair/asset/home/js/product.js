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

    //选项卡
    let proTop=document.querySelectorAll(".proBox .proTop span");
    let proBot=document.querySelectorAll(".proBox .proBottom .selectCard");
    proTop[0].style.borderBottom="1px dotted #f0443a";
    proBot[0].style.display="block";
    proTop.forEach((v,i)=>{
        v.onclick=()=>{
            proTop.forEach((x,y)=>{
                x.style.borderBottom="1px dotted transparent";
                proBot[y].style.display="none";
            })
            v.style.borderBottom="1px dotted #f0443a";
            proBot[i].style.display="block";
        }
    })

}