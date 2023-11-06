const taskJSONText = document.getElementById("taskJSONResult");
taskJSONText.innerHTML = localStorage.getItem("JSONInfoTask");
const formTask = document.querySelector("#taskForm");
formTask.addEventListener("submit", function (e) {
    let task = document.querySelector("#f-task").value;
    if(task==null || task=="") {
        alert("Enter a task to be assigned");
        e.preventDefault();
        return;
    }

    const taskInfo = {Task:task};
    let taskTextJSON = JSON.stringify(taskInfo);
    localStorage.setItem("JSONInfoTask", taskTextJSON);
});