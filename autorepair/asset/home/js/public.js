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
}