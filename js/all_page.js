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





/*-------------***filter on and off functionality***-------------*/
let container_of_additional_inputs = document.getElementById("container_of_additional_inputs");


function slide_in(){
    container_of_additional_inputs.style.display = "block";
    container_of_additional_inputs.style.transform = "translateX(0)";
}

function slide_out(){
    container_of_additional_inputs.style.display = "none";
    container_of_additional_inputs.style.transform = "translateX(-100%)";
}





/*-------------***voice search functionality***-------------*/
let textarea = document.getElementById("textarea");

function start_audio(){
    window.SpeechRecognition = window.SpeechRecognition || window.webkitSpeechRecognition;

    const recognition = new SpeechRecognition();
    recognition.interimResults = true;

    recognition.addEventListener('result', e =>{
        console.log(e.results);
        const transcript = Array.from(e.results).map(result => result[0]).map(result => result.transcript).join('');

        textarea.textContent = transcript;
        console.log(transcript);
    });

    recognition.addEventListener('end', recognition.start);
    recognition.start();
}





/*-------------***voice search box showing and hidding functionality***-------------*/
let section_1 = document.getElementById("section_1");
let section_2 = document.getElementById("section_2");
let section_3 = document.getElementById("section_3");
let speech_to_text = document.getElementById("speech_to_text");


function show_profile_card(){
    speech_to_text.style.position = "absolute";
    speech_to_text.style.top = "120%";
    speech_to_text.style.right = "25%";
    speech_to_text.style.width = "600px";
    speech_to_text.style.height = "300px";
    speech_to_text.style.padding = "50px";


    section_1.style.filter = "blur(20px)";
    section_2.style.filter = "blur(20px)";
    section_3.style.filter = "blur(20px)";
}

function hide_profile_card(){
    speech_to_text.style.position = "absolute";
    speech_to_text.style.top = "680px";
    speech_to_text.style.right = "430px";
    speech_to_text.style.width = "0px";
    speech_to_text.style.height = "0px";
    speech_to_text.style.padding = "0px";


    section_1.style.filter = "blur(0px)";
    section_2.style.filter = "blur(0px)";
    section_3.style.filter = "blur(0px)";
}