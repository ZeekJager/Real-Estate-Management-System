/*-------------***comment showing and hidding functionality***-------------*/
let comment_section = document.getElementById("comment_section");
let video = document.getElementById("video");
let comment = 0;


function show_comment_section(){
    if(comment == 0){
        comment_section.style.width = "300px";
        comment_section.style.padding = "20px";
        video.style.borderTopLeftRadius = "0";
        video.style.borderBottomLeftRadius = "0";
        comment = 1;
    }
    else{
        comment_section.style.width = "0";
        comment_section.style.padding = "0";
        video.style.borderTopLeftRadius = "20px";
        video.style.borderBottomLeftRadius = "20px";
        comment = 0;
    }
}

function hide_comment_section(){
    comment_section.style.width = "0";
    comment_section.style.padding = "0";
    video.style.borderTopLeftRadius = "20px";
    video.style.borderBottomLeftRadius = "20px";
    comment = 0;
}