@extends('layouts.app')

@section('content')
<h1>Add Task</h1>

<form action="{{ route('tasks.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="title" class="form-label">Title</label>
        <input type="text" name="title" class="form-control" required>
    </div>
    <div class="mb-3">
        <label for="description" class="form-label">Description</label>
        <textarea name="description" class="form-control"></textarea>
    </div>
    <div class="mb-3">
        <label for="due_date" class="form-label">Due Date</label>
        <input type="date" name="due_date" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-success">Add Task</button>
</form>
@endsection