@extends('layouts.layout')

@section('content')
    <div class="container">
        <div class="row justify-content-center align-items-center main-row">
            <div class="col shadow main-col bg-white">
                <div class="row bg-primary text-white">
                    <div class="col p-2">
                        <h4>Priority</h4>
                    </div>
                </div>
                <div class="row justify-content-between text-white p-2">
                    <div class="form-group flex-fill mb-2">
                        <form method="get" action="{{ route('priority.index') }}">
                            <div class="input-group">
                                <input type="text" class="form-control" name="search" placeholder="Search...">
                                <button type="submit" class="btn btn-outline-primary">Search</button>
                            </div>
                        </form>
                    </div>
                    <div class="form-group flex-fill mb-2">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Title</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if($priorities && count($priorities) > 0)
                                @foreach($priorities as $priority)
                                    <tr>
                                        <td>{{ $priority->name }}</td>
                                        <td>
                                            <a type="button" class="btn btn-primary mb-2 ml-2"
                                               data-bs-toggle="modal" data-bs-target="#priorityModal" onclick="getPriorityId({{$priority->id}})" >Edit</a>
                                            <!-- Sử dụng method POST và xác nhận xóa trước khi thực hiện -->
                                            <form action="">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger mb-2 ml-2"
                                                        onclick="deletePriority({{$priority->id}})">
                                                    Delete
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="4">No data</td>
                                </tr>
                            @endif
                            </tbody>
                        </table>
                    </div>
                    <a type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#priorityModal">
                        Add Priority
                    </a>
                </div>
                <div class="row" id="todo-container">
                </div>
            </div>
        </div>
        <!-- Row -->
        @include('pages.Priority.modal')
        <!-- End Row -->
    </div>
@endsection

@section('script')
    <script src="{{asset('priority.js')}}"></script>
@endsection
