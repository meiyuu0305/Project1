//set up which form to get items from
const personJSONText = document.getElementById("personJSONResult");
personJSONText.innerHTML = localStorage.getItem("JSONInfoPerson");
const formPerson = document.querySelector("#personForm");
formPerson.addEventListener("submit", function (e) {
    //get and verify first name field
    let fname = document.querySelector("#f-firstname").value;
    if(fname==null || fname=="") {
        alert("Enter first name");
        e.preventDefault();
        return;
    }
    //get and verify last name filed
    let lname = document.querySelector("#f-lastname").value;
    if(lname==null || lname=="") {
        alert("Enter last name");
        e.preventDefault();
        return;
    }
    //set up JSON object to be displayed on page
    const teamMemberInfo = {FirstName:fname, LastName:lname};
    let personTextJSON = JSON.stringify(teamMemberInfo);
    localStorage.setItem("JSONInfoPerson", personTextJSON);
});
