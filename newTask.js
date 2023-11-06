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

    const taskInfo = {Task:ftask};
    let taskTextJSON = JSON.stringify(taskInfo);
    localStorage.setItem("JSONInfoTask", taskTextJSON);
});