@extends('layouts.app')

@section('content')
<h1>Task List</h1>
<a href="{{ route('tasks.create') }}" class="btn btn-primary mb-3">Add Task</a>

@if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Title</th>
            <th>Description</th>
            <th>Due Date</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($tasks as $task)
            <tr>
                <td>{{ $task->title }}</td>
                <td>{{ $task->description }}</td>
                <td>{{ $task->due_date }}</td>
                <td class="{{ $task->is_completed ? 'text-success' : 'text-danger'  }}">{{ $task->is_completed ? 'Completed' : 'Pending' }}</td>
                <td>
                    <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-warning">Edit</a>

                    <form action="{{ route('tasks.updateStatus', $task->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('PATCH')
                        <button type="submit" class="btn {{ $task->is_completed ? 'btn-secondary' : 'btn-success' }}">
                            {{ $task->is_completed ? 'Mark as Pending' : 'Mark as Completed' }}
                        </button>
                    </form>

                    <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?');">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

{{ $tasks->links('pagination::simple-bootstrap-4') }}

@endsection