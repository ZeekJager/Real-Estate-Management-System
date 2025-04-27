/*-------------***image scalling up and down ---- review box hidding and showing ---- rating box showing and hidding ---- rating star coloring functionalities***-------------*/
/*-------------variables-------------*/
let image = document.getElementById("images");
let rating = document.getElementById("rating");

let arrow = document.getElementById("arrow");
let review_section = document.getElementById("review_section");
let x_button = document.getElementById("x_button");
let main = document.getElementById("main");
let footer = document.getElementById("footer");
let review = 1;

let div_top = document.getElementById("div_top");
let div_top_2 = document.getElementById("div_top_2");

let rating_1 = document.getElementById("rating_1");
let rating_2 = document.getElementById("rating_2");
let rating_3 = document.getElementById("rating_3");
let rating_4 = document.getElementById("rating_4");
let rating_5 = document.getElementById("rating_5");





/*-------------image scalling up and down functionality-------------*/
function scale_image_up(){
    image.style.position = "fixed";
    image.style.top = "120px";
    image.style.left = "20%";

    arrow.style.filter = "blur(10px)";
    main.style.filter = "blur(10px)";
    review_section.style.filter = "blur(10px)";
    footer.style.display = "none";

    div_top.style.zIndex = "1";

    arrow.style.position = "absolute";
    arrow.style.top = "10px";
    arrow.style.left = "10px";
}


function scale_image_down(){
    image.style.position = "relative";
    image.style.top = "0";
    image.style.left = "0";

    arrow.style.filter = "blur(0px)";
    main.style.filter = "blur(0px)";
    review_section.style.filter = "blur(0px)";
    footer.style.display = "block";

    div_top.style.zIndex = "-1";

    arrow.style.position = "absolute";
    arrow.style.top = "10px";
    arrow.style.left = "10px";
}





/*-------------review box hidding and showing functionality-------------*/
function show_review_section(){
    if(review == 0){
        review_section.style.width = "30%";
        x_button.style.display = "block";
        review_section.style.transition = "1s";
        review = 1;
    }
    else{
        review_section.style.width = "0px";
        x_button.style.display = "none";
        review_section.style.transition = "1s";
        review = 0;
    }
}


function hide_review_section(){
    review_section.style.width = "0px";
    x_button.style.display = "none";
    review_section.style.transition = "1s";
    review = 0;
}





/*-------------rating box showing and hidding functionality-------------*/
function scale_rating_box_up(){
    rating.style.width = "700px";
    rating.style.height = "400px";

    arrow.style.filter = "blur(10px)";
    image.style.filter = "blur(10px)";
    main.style.filter = "blur(10px)";
    review_section.style.filter = "blur(10px)";
    footer.style.display = "none";

    div_top_2.style.zIndex = "3";

    arrow.style.position = "absolute";
    arrow.style.top = "10px";
    arrow.style.left = "10px";
}


function scale_rating_box_down(){
    rating.style.width = "0px";
    rating.style.height = "0px";

    arrow.style.filter = "blur(0px)";
    image.style.filter = "blur(0px)";
    main.style.filter = "blur(0px)";
    review_section.style.filter = "blur(0px)";
    footer.style.display = "block";

    div_top_2.style.zIndex = "-1";

    arrow.style.position = "absolute";
    arrow.style.top = "10px";
    arrow.style.left = "10px";
}





/*-------------rating star coloring functionality-------------*/
function rating_11(){
    rating_1.setAttribute('style', 'cursor: pointer; color: yellow; font-size: 30px; margin-right: 5px;');
    rating_1.setAttribute('class', 'fa-solid fa-star');

    rating_2.setAttribute('style', 'cursor: pointer; color: white; font-size: 30px; margin-right: 5px;');
    rating_2.setAttribute('class', 'fa-regular fa-star');
    rating_3.setAttribute('style', 'cursor: pointer; color: white; font-size: 30px; margin-right: 5px;');
    rating_3.setAttribute('class', 'fa-regular fa-star');
    rating_4.setAttribute('style', 'cursor: pointer; color: white; font-size: 30px; margin-right: 5px;');
    rating_4.setAttribute('class', 'fa-regular fa-star');
    rating_5.setAttribute('style', 'cursor: pointer; color: white; font-size: 30px; margin-right: 5px;');
    rating_5.setAttribute('class', 'fa-regular fa-star');
}

function rating_22(){
    rating_1.setAttribute('style', 'cursor: pointer; color: yellow; font-size: 30px; margin-right: 5px;');
    rating_1.setAttribute('class', 'fa-solid fa-star');
    rating_2.setAttribute('style', 'cursor: pointer; color: yellow; font-size: 30px; margin-right: 5px;');
    rating_2.setAttribute('class', 'fa-solid fa-star');

    rating_3.setAttribute('style', 'cursor: pointer; color: white; font-size: 30px; margin-right: 5px;');
    rating_3.setAttribute('class', 'fa-regular fa-star');
    rating_4.setAttribute('style', 'cursor: pointer; color: white; font-size: 30px; margin-right: 5px;');
    rating_4.setAttribute('class', 'fa-regular fa-star');
    rating_5.setAttribute('style', 'cursor: pointer; color: white; font-size: 30px; margin-right: 5px;');
    rating_5.setAttribute('class', 'fa-regular fa-star');
}
        
function rating_33(){
    rating_1.setAttribute('style', 'cursor: pointer; color: yellow; font-size: 30px; margin-right: 5px;');
    rating_1.setAttribute('class', 'fa-solid fa-star');
    rating_2.setAttribute('style', 'cursor: pointer; color: yellow; font-size: 30px; margin-right: 5px;');
    rating_2.setAttribute('class', 'fa-solid fa-star');
    rating_3.setAttribute('style', 'cursor: pointer; color: yellow; font-size: 30px; margin-right: 5px;');
    rating_3.setAttribute('class', 'fa-solid fa-star');

    rating_4.setAttribute('style', 'cursor: pointer; color: white; font-size: 30px; margin-right: 5px;');
    rating_4.setAttribute('class', 'fa-regular fa-star');
    rating_5.setAttribute('style', 'cursor: pointer; color: white; font-size: 30px; margin-right: 5px;');
    rating_5.setAttribute('class', 'fa-regular fa-star');
}
        
function rating_44(){
    rating_1.setAttribute('style', 'cursor: pointer; color: yellow; font-size: 30px; margin-right: 5px;');
    rating_1.setAttribute('class', 'fa-solid fa-star');
    rating_2.setAttribute('style', 'cursor: pointer; color: yellow; font-size: 30px; margin-right: 5px;');
    rating_2.setAttribute('class', 'fa-solid fa-star');
    rating_3.setAttribute('style', 'cursor: pointer; color: yellow; font-size: 30px; margin-right: 5px;');
    rating_3.setAttribute('class', 'fa-solid fa-star');
    rating_4.setAttribute('style', 'cursor: pointer; color: yellow; font-size: 30px; margin-right: 5px;');
    rating_4.setAttribute('class', 'fa-solid fa-star');

    rating_5.setAttribute('style', 'cursor: pointer; color: white; font-size: 30px; margin-right: 5px;');
    rating_5.setAttribute('class', 'fa-regular fa-star');
}
        
function rating_55(){
    rating_1.setAttribute('style', 'cursor: pointer; color: yellow; font-size: 30px; margin-right: 5px;');
    rating_1.setAttribute('class', 'fa-solid fa-star');
    rating_2.setAttribute('style', 'cursor: pointer; color: yellow; font-size: 30px; margin-right: 5px;');
    rating_2.setAttribute('class', 'fa-solid fa-star');
    rating_3.setAttribute('style', 'cursor: pointer; color: yellow; font-size: 30px; margin-right: 5px;');
    rating_3.setAttribute('class', 'fa-solid fa-star');
    rating_4.setAttribute('style', 'cursor: pointer; color: yellow; font-size: 30px; margin-right: 5px;');
    rating_4.setAttribute('class', 'fa-solid fa-star');
    rating_5.setAttribute('style', 'cursor: pointer; color: yellow; font-size: 30px; margin-right: 5px;');
    rating_5.setAttribute('class', 'fa-solid fa-star');
}