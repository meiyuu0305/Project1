//set up which form to get field values from
const taskJSONText = document.getElementById("taskJSONResult");
taskJSONText.innerHTML = localStorage.getItem("JSONInfoTask");
const formTask = document.querySelector("#taskForm");
formTask.addEventListener("submit", function (e) {
    //get and verify task name
    let ftask = document.querySelector("#f-task").value;
    if(ftask==null || ftask=="") {
        alert("Enter a task to be assigned");
        e.preventDefault();
        return;
    }
    //get and verify due date
    let fdueDate = document.querySelector("#f-dueDate").value;
    if(fdueDate==null || fdueDate=="") {
        alert("Choose a due date");
        e.preventDefault();
        return;
    }
    //get and verify team member field
    let fteamMember = document.querySelector("#f-teamMember").value;
    if(fteamMember==null || fteamMember=="") {
        alert("Choose a team member to assign the task to");
        e.preventDefault();
        return;
    }

    //display field values in JSON on task page
    const taskInfo = {Task:ftask, DueDate:fdueDate, TeamMember:fteamMember};
    let taskTextJSON = JSON.stringify(taskInfo);
    localStorage.setItem("JSONInfoTask", taskTextJSON);
});
