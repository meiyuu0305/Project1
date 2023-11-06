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
    let fdate = document.querySelector("#f-dueDate").value;
    if(fdate==null) {
        alert("Select a due date");
        e.preventDefault();
        return;
    }
    let fteamMember = document.querySelector("f-teamMember").value;
    if(fteamMember==null || fteamMember=="") {
        alert("Assign this task to a team member");
        e.preventDefault();
        return;
    }

    const taskInfo = {Task:ftask, DueDate:fdate, TeamMember:fteamMember};
    let taskJSONText = JSON.stringify(taskInfo);
    //localStorage.setItem("JSONInfoTask", taskJSONText);
});