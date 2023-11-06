const taskJSONText = document.getElementById("taskJSONResult");
taskJSONText.innerHTML = localStorage.getItem("JSONInfoTask");
const formTask = document.querySelector("#taskForm");