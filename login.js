personJSONText.innerHTML = localStorage.getItem("JSONLoginInfo");
const formLogin = document.querySelector("#login_form");
formLogin.addEventListener("submit", function (e) {
    //get and verify username field
    let username = document.querySelector("#username").value;
    if(username==null || username=="") {
        alert("Enter first name");
        e.preventDefault();
        return;
    }
    //get and verify password field
    let password = document.querySelector("#password").value;
    if(password==null || password=="") {
        alert("Enter last name");
        e.preventDefault();
        return;
    }
});