<!-- resources/views/todolists/create.blade.php -->

@extends('layouts.layout')

@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="card">
                    <div class="card-header">
                        @if(isset($todoList))
                            Edit Todo List
                        @else
                            Add Todo List
                        @endif
                    </div>
                    <div class="card-body">
                        <!-- Form để chỉnh sửa hoặc thêm mới danh sách công việc -->
                        <form method="post" action="{{ isset($todoList) ? route('todolists.update', $todoList->id) : route('todolists.store') }}">
                            @csrf
                            @if(isset($todoList))
                                @method('PUT')
                            @endif
                            <input type="hidden" name="id" value="{{ old('id', isset($todoList) ? $todoList->id : '') }}">
                            <div class="mb-3">
                                <label for="title" class="form-label">Title <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title', isset($todoList) ? $todoList->title : '') }}" required>
                                @error('title')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description">{{ old('description', isset($todoList) ? $todoList->description : '') }}</textarea>
                                @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="priority" class="form-label">Priority</label>
                                <select class="form-select @error('priority') is-invalid @enderror" id="priority" name="priority">
                                    @foreach(['low', 'medium', 'high'] as $value)
                                        <option value="{{ $value }}" {{ old('priority', isset($todoList) ? $todoList->priority : '') == $value ? 'selected' : '' }}>
                                            {{ ucfirst($value) }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('priority')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="status" class="form-label">Status</label>
                                <select class="form-select @error('status') is-invalid @enderror" id="status" name="status">
                                    @foreach(['incomplete', 'complete'] as $value)
                                        <option value="{{ $value }}" {{ old('status', isset($todoList) ? $todoList->status : '') == $value ? 'selected' : '' }}>
                                            {{ ucfirst($value) }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('status')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">{{ isset($todoList) ? 'Update' : 'Create' }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
