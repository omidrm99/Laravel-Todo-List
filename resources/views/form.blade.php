@extends('layouts.task')

@section('title', isset($task) ? 'Edit Task' : 'Add a new Task')

@section('content')
    <form method="post"
          action="{{ isset($task) ? route('tasks.update', ['task' => $task->id]) :  route('tasks.store') }}">
        @csrf
        @isset($task)
            @method('PUT')
        @endisset
        <div class="mb-4">
            <label for="title">Title</label>
            <input name="title" type="text" id="title"
                   value="{{ $task->title ?? old('title') }}"
                   class="@error('title') border-red-500 @enderror"
            >
            @error('title')
            <p class="error">
                {{ $message }}
            </p>
            @enderror
        </div>
        <div class="mb-4">
            <label for="description">Description</label>
            <textarea  class="@error('description') border-red-500 @enderror" name="description" id="description"
                      rows="5">{{ $task->description ?? old('description') }}</textarea>
            @error('description')
            <p class="error">
                {{ $message }}
            </p>
            @enderror
        </div>
        <div class="flex gap-2 items-center">
            <button type="submit" class="btn">
                @isset($task)
                    Update Task
                @else
                    Add Task
                @endisset
            </button>
            <a class="link" href="{{ route('tasks.index') }}">Cancel</a>
        </div>
    </form>
@endsection
