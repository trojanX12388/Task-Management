@extends('layouts.app')

@section('content')
<h1>Edit Task</h1>

<form action="{{ route('tasks.update', $task->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="title" class="form-label">Title</label>
        <input type="text" name="title" class="form-control" value="{{ $task->title }}" required>
    </div>
    <div class="mb-3">
        <label for="description" class="form-label">Description</label>
        <textarea name="description" class="form-control">{{ $task->description }}</textarea>
    </div>
    <div class="mb-3">
        <label for="due_date" class="form-label">Due Date</label>
        <input type="date" name="due_date" class="form-control" value="{{ $task->due_date }}" required>
    </div>
    <button type="submit" class="btn btn-primary">Update Task</button>
</form>
@endsection
