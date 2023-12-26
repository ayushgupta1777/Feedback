document.addEventListener('DOMContentLoaded', function () {
    const taskForm = document.getElementById('taskForm');
    const taskList = document.getElementById('taskList');

    taskForm.addEventListener('submit', function (e) {
        e.preventDefault();

        const taskInput = document.getElementById('task');
        const assigneeInput = document.getElementById('assignee');
        const deadlineInput = document.getElementById('deadline');

        const task = taskInput.value;
        const assignee = assigneeInput.value;
        const deadline = deadlineInput.value;

        if (task && assignee && deadline) {
            addTask(task, assignee, deadline);
            taskForm.reset();
        }
    });

    function addTask(task, assignee, deadline) {
        const taskItem = document.createElement('div');
        taskItem.className = 'task';

        const taskInfo = document.createElement('div');
        taskInfo.innerHTML = `<strong>${task}</strong> assigned to ${assignee}, deadline: ${deadline}`;
        taskItem.appendChild(taskInfo);

        const completeButton = document.createElement('button');
        completeButton.textContent = 'Complete';
        completeButton.addEventListener('click', function () {
            taskItem.classList.toggle('completed');
        });
        taskItem.appendChild(completeButton);

        taskList.appendChild(taskItem);
    }
});
