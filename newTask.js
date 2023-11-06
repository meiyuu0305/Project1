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
    let fdueDate = document.querySelector("f-dueDate").value;
    if(fdueDate==null || fdueDate=="") {
        alert("Select a due date");
        e.preventDefault();
        return;
    }


    const taskInfo = {Task:ftask, DueDate:fduedate};
    let taskTextJSON = JSON.stringify(taskInfo);
    localStorage.setItem("JSONInfoTask", taskTextJSON);
});