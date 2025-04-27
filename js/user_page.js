/*-------------***arrow click functionality for the side navigation***-------------*/
let header_container = document.getElementById("header");
let label = document.getElementById("label");
let arrow = document.getElementById("arrow");
let option_labels = document.querySelectorAll("#option_labels");

function collapse_sidebar(){
    header_container.classList.toggle("hide_header");
    label.classList.toggle("hide_label");
    arrow.classList.toggle("arrow_rotation");
    for(let i = 0; i < option_labels.length; i++){
        option_labels[i].classList.toggle("hide_option_labels");
    }
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