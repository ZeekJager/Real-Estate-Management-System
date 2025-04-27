/*-------------***option click functionality for house sale and rent***-------------*/
let profile_container = document.getElementById("profile_container");
let for_sale_container = document.getElementById("for_sale");
let for_rent_container = document.getElementById("for_rent");


function profile1(){
    profile_container.style.display = "block";
    for_sale_container.style.display = "none";
    for_rent_container.style.display = "none";
}

function for_sale(){
    profile_container.style.display = "none";
    for_sale_container.style.display = "grid";
    for_rent_container.style.display = "none";
}

function for_rent(){
    profile_container.style.display = "none";
    for_sale_container.style.display = "none";
    for_rent_container.style.display = "grid";
}





/*-------------***search engine functionality***-------------*/
function search_bar(){
    let user_search = document.getElementById("search_bar").value.toLowerCase();
    let houses = document.querySelectorAll("#houses");
    let no_result = document.getElementById("no_result");
    let counter = 0;


    for(let i = 0; i < houses.length; i++){
        let house_name = houses[i].getElementsByTagName("h4")[0].textContent.toLowerCase();

        
        if(house_name.includes(user_search) || user_search.includes(house_name)){
            houses[i].style.display = "";
            counter++;
        }
        else{
            houses[i].style.display = "none";
        }
    }


    if(counter == 0){
        no_result.classList.remove('display_none');
        no_result.innerText = "No Results Found!";
    }
    else{
        no_result.classList.add('display_none');
    }
}





/*-------------***profile card showing and hidding functionality***-------------*/
let main = document.getElementById("main");
let div = document.getElementById("div");
let profile = document.getElementById("profile");
let image = document.getElementById("image");
let houses_container1 = document.getElementById("houses_container1");
let houses_container2 = document.getElementById("houses_container2");


function show_profile_card(){
    profile.style.position = "absolute";
    profile.style.top = "20%";
    profile.style.right = "25%";
    profile.style.width = "600px";
    profile.style.height = "300px";


    main.style.filter = "blur(20px)";
    image.style.filter = "blur(20px)";
    div.style.zIndex = "2";
    houses_container1.style.display = "none";
    houses_container2.style.display = "none";
}

function hide_profile_card(){
    profile.style.position = "absolute";
    profile.style.top = "20px";
    profile.style.right = "20px";
    profile.style.width = "0px";
    profile.style.height = "0px";


    main.style.filter = "blur(0px)";
    image.style.filter = "blur(0px)";
    div.style.zIndex = "-1";
    houses_container1.style.display = "";
    houses_container2.style.display = "";
}