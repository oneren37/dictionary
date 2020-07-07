function getWord(){
    const request = new XMLHttpRequest();
    const url = "get-word.php";

    //request.responseType = "json";
    request.open("POST", url, false);
    request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    request.send();
    let resp = JSON.parse(request.response);
    return resp;
}


let trainingMode = true;
// RuEn = true
// EnRu = false
let task = document.querySelector("#task");
let translation = document.querySelector("#translation");
let check = document.querySelector("#check");
let result = document.querySelector("#result");
let next = document.querySelector("#next");
let word = getWord();

document.querySelector("#ru-en").onclick = () => {trainingMode = true; console.log(true)}
document.querySelector("#en-ru").onclick = () => {trainingMode = false; console.log(false)}
next.onclick = () => {task = getWord();}

task.innerHTML = trainingMode ? word["ru"] : word["en"];

check.onclick = () => {
    if (trainingMode){
        result.innerHTML = translation.value == word["en"] ? "умничка" : "неа";
    }else{
        result.innerHTML = translation.value == word["ru"] ? "умничка" : "неа";
    }
    
}
next.onclick = () => {
    word = getWord();
    task.innerHTML = trainingMode ? word["ru"] : word["en"];
    result.innerHTML = "";
    translation.value = "";
};