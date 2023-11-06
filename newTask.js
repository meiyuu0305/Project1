const taskJSONText = document.getElementById("taskJSONResult");
taskJSONText.innerHTML = localStorage.getItem("JSONInfoTask");
const formTask = document.querySelector("#taskForm");
formTask.addEventListener("submit", function (e) {
    let ftask = document.querySelector("#f-task").value;
    if(ftask==null || ftask=="") {
        alert("Enter a task to be assigned");
        e.preventDefault();
        return;
    }
    let fteamMember = document.querySelector("#f-teamMember").value;
    if(fteamMember==null || fteamMember=="") {
        alert("Choose a team member to assign the task to");
        e.preventDefault();
        return;
    }


    const taskInfo = {Task:ftask, TeamMember:fteamMember};
    let taskTextJSON = JSON.stringify(taskInfo);
    localStorage.setItem("JSONInfoTask", taskTextJSON);
});