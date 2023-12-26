@extends('layouts.layout')

@section('content')
    <div class="container">
        <div class="row justify-content-center align-items-center main-row">
            <div class="col shadow main-col bg-white">
                <div class="row bg-primary text-white">
                    <div class="col p-2">
                        <h4>Todo App</h4>
                    </div>
                </div>
                <div class="row justify-content-between text-white p-2">
                    <div class="form-group flex-fill mb-2">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Priority</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($todoLists as $todoList)
                                <tr>
                                    <td>{{ $todoList->title }}</td>
                                    <td>{{ $todoList->description ?? 'N/A' }}</td>
                                    <td>
                                            <span class="badge
                                                @if($todoList->priority == 'low') text-bg-success
                                                @elseif($todoList->priority == 'medium') text-bg-warning
                                                @elseif($todoList->priority == 'high') text-bg-danger
                                                @endif
                                            ">
                                                {{ ucfirst($todoList->priority) }}
                                            </span>
                                    </td>
                                    <td>
                                            <span class="badge
                                                @if($todoList->status == 'incomplete') text-bg-danger
                                                @elseif($todoList->status == 'complete') text-bg-success
                                                @endif
                                            ">
                                                {{ ucfirst($todoList->status) }}
                                            </span>
                                    </td>
                                    <td>
                                    <td>
                                        <a type="button" class="btn btn-primary mb-2 ml-2" href="{{ route('todolists.edit',['id' => $todoList->id]) }}">Edit</a>

                                        <!-- Sử dụng method POST và xác nhận xóa trước khi thực hiện -->
                                        <form action="{{ route('todolists.destroy', ['id' =>$todoList->id]) }}" method="post" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger mb-2 ml-2" onclick="return confirm('Are you sure you want to delete this item?')">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <a type="button" class="btn btn-primary mb-2 ml-2" href="{{route('todolists.create')}}">Add todo</a>
                </div>
                <div class="row" id="todo-container">
                </div>
            </div>
        </div>
    </div>
@endsection
