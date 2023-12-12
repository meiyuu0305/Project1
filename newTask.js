//set up which form to get field values from
//const taskJSONText = document.getElementById("taskJSONResult");
//taskJSONText.innerHTML = localStorage.getItem("JSONInfoTask");
const formTask = document.querySelector("#taskForm");
formTask.addEventListener("submit", function (e) {
    //get and verify task name
    let task = document.querySelector("#task").value;
    if(task==null || task=="") {
        alert("Enter a task to be assigned");
        e.preventDefault();
        return;
    }
    //get and verify due date
    let dueDate = document.querySelector("#dueDate").value;
    if(dueDate==null || dueDate=="") {
        alert("Choose a due date");
        e.preventDefault();
        return;
    }
    //get and verify team member field
    let teamMember = document.querySelector("#assignedMember").value;
    if(teamMember==null || teamMember=="") {
        alert("Choose a team member to assign the task to");
        e.preventDefault();
        return;
    }

    //display field values in JSON on task page
    /*const taskInfo = {Task:ftask, DueDate:fdueDate, TeamMember:fteamMember};
    let taskTextJSON = JSON.stringify(taskInfo);
    localStorage.setItem("JSONInfoTask", taskTextJSON);*/
});
