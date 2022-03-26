function deleteTask(id, page) {
    window.location.href = 'task_controller.php?action=delete&id='+id+'&page='+page
}

function editTask(id, task_description, page) {
    //edit form
    let form = document.createElement('form')
    form.action = 'task_controller.php?action=update&page='+page
    form.method = 'post'
    form.className = 'row'

    //create 'input' tag
    let inputTask = document.createElement('input')
    inputTask.type = 'text'
    inputTask.name = 'task'
    inputTask.className = 'col-9 form-control'
    inputTask.value = task_description

    //create button
    let button = document.createElement('button')
    button.type = 'submit'
    button.className = 'col-3 btn btn-info'
    button.innerHTML = 'Update'

    //create hidden input to receive id
    let inputId = document.createElement('input')
    inputId.type = 'hidden'
    inputId.name = 'id'
    inputId.value = id

    //add input, button and hidden input to form
    form.appendChild(inputTask)
    form.appendChild(button)
    form.appendChild(inputId)

    let task = document.getElementById('task_'+id);

    //clean the task text
    task.innerHTML = ''

    //include form on the page
    task.insertBefore(form, task[0])
}

function finishTask(id, status, page) {
    window.location.href = 'task_controller.php?action=update&id='+id+'&status='+status+'&page='+page
}