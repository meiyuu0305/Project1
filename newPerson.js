const personJSONText = document.getElementById("personJSONResult");
personJSONText.innerHTML = localStorage.getItem("JSONInfo1");
const formPerson = document.querySelector("#personForm");
formPerson.addEventListener("submit", function (e) {
    let fname = document.querySelector("#f-firstname").value;
    if(fname==null || fname=="") {
        alert("Enter first name");
        e.preventDefault();
        return;
    }
    let lname = document.querySelector("#f-lastname").value;
    if(lname==null || lname=="") {
        alert("Enter last name");
        e.preventDefault();
        return;
    }

    const teamMemberInfo = {FirstName:fname, LastName:lname};
    let personTextJSON = JSON.stringify(teamMemberInfo);
    localStorage.setItem("JSONInfo1", personTextJSON);
});
