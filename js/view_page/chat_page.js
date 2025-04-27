/*-------------***search bar hidding and showing functionality***-------------*/
let search_bar = document.querySelector(".users .search input");
let search_button = document.querySelector(".users .search button");


search_button.onclick = () =>{
    search_bar.classList.toggle("active");
    search_bar.focus();
    search_button.classList.toggle("active");
}





/*-------------***user search engine functionality***-------------*/
function search_user(){
    let user_search = document.getElementById("search_bar").value.toLowerCase();
    let users = document.querySelectorAll("#users");
    let no_result = document.getElementById("no_result");
    let counter = 0;


    for(let i = 0; i < users.length; i++){
        let user_name = users[i].getElementsByTagName("span")[0].textContent.toLowerCase();
        let status_dot = document.querySelectorAll("#status_dot");

        
        if(user_name.includes(user_search) || user_search.includes(user_name)){
            users[i].style.display = "";
            status_dot[i].style.display = "";
            counter++;
        }
        else{
            users[i].style.display = "none";
            status_dot[i].style.display = "none";
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