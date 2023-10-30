const inputBox = document.getElementById("input-box");
const listContainer = document.getElementById("list-container");

// Load tasks from localStorage on page load
document.addEventListener("DOMContentLoaded", showTasks);

function addTask() {
  const taskText = inputBox.value.trim();
  if (taskText === "") {
    alert("Write something");
  } else {
    const taskData = {
      text: taskText
    };

    fetch('/api/tasks/add', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json'
      },
      body: JSON.stringify(taskData)
    })
    .then(response => {
      if (response.status === 200) {
        // Task added successfully
        inputBox.value = "";
        showTasks();
      } else {
        // Handle errors
        console.error(response.statusText);
      }
    });
  }
}

function appendTaskToDOM(taskData) {
  const li = document.createElement("li");
  li.textContent = taskData.text;

  if (taskData.completed) {
    li.classList.add("checked");
  }

  const deleteButton = document.createElement("span");
  deleteButton.textContent = "\u00d7";

  li.appendChild(deleteButton);
  listContainer.appendChild(li);

  // Add click event listener for task completion and deletion
  li.addEventListener("click", function (e) {
    if (e.target.tagName === "LI") {
      toggleTaskCompleted(li, taskData);
    } else if (e.target.tagName === "SPAN") {
      removeTaskFromDOM(li);
      removeTaskFromStorage(taskData);
    }
  });
}

function toggleTaskCompleted(li, taskData) {
  taskData.completed = !taskData.completed;
  li.classList.toggle("checked");
  saveTaskToStorage(taskData);
}

function removeTaskFromDOM(li) {
  li.remove();
}

function saveTaskToStorage(taskData) {
  const tasks = JSON.parse(localStorage.getItem("tasks")) || [];
  tasks.push(taskData);
  localStorage.setItem("tasks", JSON.stringify(tasks));
}

function removeTaskFromStorage(taskData) {
  const tasks = JSON.parse(localStorage.getItem("tasks")) || [];
  const updatedTasks = tasks.filter((task) => task.text !== taskData.text);
  localStorage.setItem("tasks", JSON.stringify(updatedTasks));
}

function showTasks() {
  fetch('/api/tasks')
  .then(response => response.json())
  .then(data => {
    listContainer.innerHTML = "";
    data.forEach(task => {
      appendTaskToDOM(task);
    });
  });
}

