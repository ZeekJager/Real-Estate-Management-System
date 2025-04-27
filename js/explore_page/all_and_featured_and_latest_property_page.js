/*-------------***search engine functionality***-------------*/
function search_bar(){
    let user_search = document.getElementById("search_bar").value.toLowerCase();
    let houses = document.querySelectorAll("#houses");
    let no_result = document.getElementById("no_result");
    let counter = 0;


    for(let i = 0; i < houses.length; i++){
        let house_name = houses[i].getElementsByTagName("h1")[0].textContent.toLowerCase();

        
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





function search_filter(){
    let user_search = document.getElementById("search_bar").value.toLowerCase();
    let user_location = document.getElementById("location").value.toLowerCase();
    let user_price = document.getElementById("price").value;
    let user_bedroom = document.getElementById("bedroom").value;
    let user_bathroom = document.getElementById("bathroom").value;
    let user_area = document.getElementById("area").value;
    let houses = document.querySelectorAll("#houses");
    let counter = 0;


    for(let i = 0; i < houses.length; i++){
        let house_name = houses[i].getElementsByTagName("h1")[0].textContent.toLowerCase();
        let house_price = houses[i].getElementsByTagName("p")[0].textContent;
        let house_location = houses[i].getElementsByTagName("p")[1].textContent.toLowerCase();
        let house_bedroom = houses[i].getElementsByTagName("p")[3].textContent; 
        let house_bathroom = houses[i].getElementsByTagName("p")[4].textContent;
        let house_area = houses[i].getElementsByTagName("p")[5].textContent;

        
        if(house_name.includes(user_search) && house_price.includes(user_price) && house_location.includes(user_location) && house_bedroom.includes(user_bedroom) && house_bathroom.includes(user_bathroom) && house_area.includes(user_area)){
            houses[i].style.display="";
            counter++;
        }
        else{
            houses[i].style.display="none";
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





/*-------------***side navigation bar hide and show functionality***-------------*/
let bar = document.getElementById("bar");
let x_mark = document.getElementById("x_mark");
let option = document.querySelectorAll("#option");
let section_1 = document.getElementById("section_1");
let section_2 = document.getElementById("section_2");


function show_nav_bar(){
    section_1.style.width = "13.3%";
    section_2.style.marginLeft = "13.3%";
    section_2.style.width = "86.7%";

    x_mark.style.display = "block";
    bar.style.display = "none";

    for(let i = 0; i < option.length; i++){
        option[i].style.display="block";
    }    
}

function hide_nav_bar(){
    section_1.style.width = "0";
    section_2.style.marginLeft = "0";
    section_2.style.width = "100%";

    x_mark.style.display = "none";
    bar.style.display = "block";

    for(let i = 0; i < option.length; i++){
        option[i].style.display="none";
    }    
}