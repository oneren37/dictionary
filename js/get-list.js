function getContent(){
    const request = new XMLHttpRequest();
    const url = "php/get-list.php";

    //request.responseType = "json";
    request.open("POST", url, false);
    request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    request.send();
    let resp = JSON.parse(request.response);
    return resp;
}

let data = getContent();
let container = document.querySelector(".list-container");


let div = document.createElement('div');
div.className = "alert";
container.append(div);

let prevDate = data[0]["date"];

for (let i = data.length - 1; i >= 0; i--){

    let checkbox = document.createElement('input');
    let id   = document.createElement('input')
    let row  = document.createElement('label');
    let ru   = document.createElement('div');
    let en   = document.createElement('div');
    let date = document.createElement('div');

    checkbox.id = "row-" + i;
    row.setAttribute("for", "row-" + i)

    row.className   = "list-row";
    ru.className    = "list-row__ru";
    en.className    = "list-row__en";
    date.className  = "list-row__date";
    checkbox.className  = "list-row__checkbox";
    id.setAttribute("type", "hidden");
    id.setAttribute("id", "id");
    checkbox.setAttribute("type", "checkbox");

    row.append(checkbox)
    row.append(id)
    row.append(ru);
    row.append(en);

    ru.innerHTML    = data[i]["ru"];
    en.innerHTML    = data[i]["en"];
    id["value"]     = data[i]["id"];

    if (data[i]["date"] != prevDate){
        prevDate = data[i]["date"];
        container.append(date)
        date.innerHTML  = prevDate;
    }

    if (data[i]["active"] === "1"){
        checkbox.checked = 1;
    }
    
    container.append(row);
}

let trainButton = document.querySelector("#train");
trainButton.onclick = () => {
    words =  document.querySelectorAll(".list-row");
    activeWorsId = []
    words.forEach(el => {
        if (el.querySelector(".list-row__checkbox").checked == 1){
            activeWorsId.push(el.querySelector("#id")['value']);
        }
        
    });

    const request = new XMLHttpRequest();
    const url = "php/change-train-words.php";
    const params = "words=" + JSON.stringify(activeWorsId);

    request.open("POST", url, false);
    request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    request.send(params);
    document.location.href = "/";
}