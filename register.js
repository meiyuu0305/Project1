const formRegister = document.querySelector("#register_form");
formRegister.addEventListener("submit", function (e) {
    //get and verify username field
    let username = document.querySelector("#username").value;
    if(username==null || username=="") {
        alert("Enter username");
        e.preventDefault();
        return;
    }
    //get and verify password field
    let password = document.querySelector("#password").value;
    if(password==null || password=="") {
        alert("Enter password");
        e.preventDefault();
        return;
    }
    //get and verify confirm password field
    let confirm_password = document.querySelector("#confirm_password").value;
    if(confirm_password==null || confirm_password=="") {
        alert("Confirm password");
        e.preventDefault();
        return;
    }
});