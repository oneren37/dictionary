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

function upRate(wordId){
    const request = new XMLHttpRequest();
    const url = "up-rate.php";
    const params = "id=" + wordId;

    request.open("POST", url, false);
    request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    request.send(params);
}

// function setDefault(){
    
// }

let trainingMode = true;
// RuEn = true
// EnRu = false
let body = document.querySelector("body");
let task = document.querySelector("#task");
let translation = document.querySelector("#translation");
let check = document.querySelector("#check");
let next = document.querySelector("#next");
let word = getWord();

document.querySelector("#ru-en").onclick = () => {trainingMode = true}
document.querySelector("#en-ru").onclick = () => {trainingMode = false}
next.onclick = () => {task = getWord();}

task.innerHTML = trainingMode ? word["ru"] : word["en"];

check.onclick = () => {
    if (trainingMode){
        if (translation.value == word["en"]){
            body.style["background-color"] = "rgba(63, 191, 63, 0.17)"
            upRate(word["id"]);
            getWord();
        }
        else{
            body.style["background-color"] = "rgba(191, 63, 63, 0.17)"
            task.innerHTML = "Правильно: " + word["en"];
        }
    }else{
        if (translation.value == word["ru"]){
            body.style["background-color"] = "rgba(63, 191, 63, 0.17)"
            upRate(word["id"]);
            getWord();
        }
        else{
            body.style["background-color"] = "rgba(191, 63, 63, 0.17)"
            task.innerHTML = "Correct: " + word["ru"];
        }
    }
    
}
next.onclick = () => {
    word = getWord();
    task.innerHTML = trainingMode ? word["ru"] : word["en"];
    result.innerHTML = "";
    translation.value = "";
};