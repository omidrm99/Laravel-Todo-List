@extends('layouts.task')

@section('title', 'Task list')

@section('content')
    <nav class="mb-4">
        <a href="{{ route('tasks.create') }}" class="link">ADD NEW TASK</a>
    </nav>
    @forelse($tasks as $task)
        <div>
            <a href="{{ route('tasks.show', ['task'  => $task->id]) }}" @class([ 'line-through' => $task->status])>
                {{ $task->title }}
            </a>
        </div>
    @empty
        <div>
            no task
        </div>
    @endforelse
    @if($tasks->count())
        <nav class="mt-4">
            {{ $tasks->links() }}
        </nav>
    @endif
@endsection
