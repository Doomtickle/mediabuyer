<a class="btn btn-primary" style="margin-bottom:30px;" role="button" data-toggle="collapse" href="#addTask" aria-expanded="false" aria-controls="addTask">
    New Task
</a>
@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="collapse" id="addTask">
    <div class="well">
        <form id="addTaskForm" action="/tasklist/{{ $tasklist->name }}/tasks"
              method="POST"
              style="margin-bottom:50px;">
            {{ csrf_field() }}
            <div class="row">
                <div class="form-group">
                    <label for="task_name">Task Name</label>
                    <input type="text" name="task_name" id="task_name" class="form-control" value="{{ old('task_name') }}">
                </div>
                <div class="form-group">
                    <label for="due_date">Due date</label>
                    <input type="date" name="due_date" id="due_date" class="form-control" value="{{ old('due_date') }}">
                </div>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Add Task</button>
            </div>
        </form>
    </div>
</div>
