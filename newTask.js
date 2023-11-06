const taskJSONText = document.getElementById("taskJSONResult");
taskJSONText.innerHTML = localStorage.getItem("JSONInfoTask");
const formTask = document.querySelector("#taskForm");
formPerson.addEventListener("submit", function (e) {
    let task = document.querySelector("#f-task").value;
    if(task==null || task=="") {
        alert("Enter a task to be assigned");
        e.preventDefault();
        return;
    }
    let dueDate = document.querySelector("#f-dueDate").value;
    if(dueDate==null ||dueDate=="") {
        alert("Select a due date");
        e.preventDefault();
        return;
    }
    let teamMember = document.querySelector("#f-teamMember").value;
    if(teamMember==null || teamMember=="") {
        alert("Choose a team member to assign the task to");
        e.preventDefault();
        return;
    }

    const taskInfo = {Task:task, DueDate:ldueDate, TeamMember:teamMember};
    let taskTextJSON = JSON.stringify(taskInfo);
    localStorage.setItem("JSONInfoTask", taskTextJSON);
});