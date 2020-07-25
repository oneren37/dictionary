///--- sing in check ---///

if (document.cookie == ""){
    window.location.replace("/sing-in.html");
}

document.querySelector(".login").innerHTML = document.cookie.split('=')[1];