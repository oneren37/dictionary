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

function checkWord() {
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

function nextWord(){
    word = getWord();
    task.innerHTML = trainingMode ? word["ru"] : word["en"];
    translation.value = "";
    body.style["background-color"] = "#ffffff";
    translation.value = "";
}

let trainingMode = true;
// RuEn = true
// EnRu = false
let body = document.querySelector("body");
let task = document.querySelector("#task");
let translation = document.querySelector("#translation");
let check = document.querySelector("#check");
let next = document.querySelector("#next");
let word = getWord();

// -- валидация формы ввода новых слов

let addButton = document.querySelector("#add-new");
let error = document.querySelector(".error");

addButton.onclick = () => {
    let ru = document.querySelector("#ru");
    let en = document.querySelector("#en");

    const request = new XMLHttpRequest();
    const url = "edit.php";
    request.open("POST", url, false);
    request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    let params = "ru=" + ru.value + "&en=" + en.value;
    request.send(params);
    
    let resp = request.response;
    error.innerHTML = resp;
    ru.value = "";
    en.value = "";
}

document.querySelector("#ru-en").onclick = () => {trainingMode = true}
document.querySelector("#en-ru").onclick = () => {trainingMode = false}
next.onclick = () => {task = getWord();}

//task.innerHTML = trainingMode ? word["ru"] : word["en"];

check.onclick = () => checkWord();
document.addEventListener('keydown', function(e) {
    if (e.keyCode === 13) {
        checkWord();
    }
});
document.addEventListener('keydown', function(e) {
    if (e.keyCode === 16) {
        nextWord();
    }
});

next.onclick = () => nextWord();