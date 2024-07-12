@extends('layouts.task')

@section('title', $task->title)

@section('content')

    <div class="mb-4">
        <a href="{{ route('tasks.index') }}" class="link">
            Go Back to Home</a>
    </div>
    <p class="mb-4 text-slate-700">{{ $task->description }}</p>
    <p class="mb-4 text-slate-500 text-sm">Created : {{ $task->created_at->diffForHumans() }}
        /\\/ Updated : {{ $task->updated_at->diffForHumans() }}</p>
    <p class="mb-4">
        @if($task->status)
            <span class="font-medium text-green-500">Completed</span>
        @else
            <span class="font-medium text-red-500"> NOT Completed</span>
        @endif
    </p>

    <div class="flex gap-2">
        <a href="{{ route('tasks.edit',['task'=> $task->id]) }}" class="btn">EDIT</a>

        <form method="post" action="{{ route('tasks.toggle-status',['task'=> $task->id]) }}">
            @csrf
            @method('PUT')
            <button class="btn" type="submit">Mark as {{ $task->status ? 'not completed' : 'completed' }}</button>
        </form>

        <form action="{{ route('tasks.destroy', ['task' => $task->id]) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn">Delete this task</button>
        </form>
    </div>
@endsection
