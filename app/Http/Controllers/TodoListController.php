<?php

namespace App\Http\Controllers;

use App\Models\TodoList;
use Illuminate\Http\Request;

class TodoListController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $todoLists = auth()->user()->todoLists();

        if ($search) {
            $todoLists->where(function ($query) use ($search) {
                $query->where('title', 'LIKE', "%$search%")
                    ->orWhere('description', 'LIKE', "%$search%");
            });
        }
        $priority = $request->input('priority');

        if ($priority) {
            $todoLists->where(function ($query) use ($priority) {
                $query->where('priority', 'LIKE', "%$priority%");
            });
        }
        $todoLists = $todoLists->get();
        return view('pages.todolists.index', compact('todoLists'));
    }

    public function create()
    {
        $todolist = new TodoList();
        return view('pages.todolists.create', compact('todolist'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'nullable',
            'priority' => 'nullable',
            'status' => 'nullable'
        ]);

        auth()->user()->todoLists()->create([
            'title' => $request->title,
            'description' => $request->description,
            'priority' => $request->priority,
            'status' => $request->status
        ]);

        return redirect()->route('todolists.index');
    }

    public function edit (Request $request)
    {
        // Kiểm tra quyền hạn trước khi cho phép chỉnh sửa
        $todoList = TodoList::findOrFail($request->id);
        return view('pages.todolists.create', compact('todoList'));
    }

    public function update(Request $request)
    {

        $request->validate([
            'title' => 'required',
            'description' => 'nullable',
            'priority' => 'nullable',
            'status' => 'nullable',
        ]);
        // Lấy giá trị id từ request
        $id = $request->id;

        // Update dựa trên $id
        TodoList::where('id', $id)->update([
            'title' => $request->title,
            'description' => $request->description,
            'priority' => $request->priority,
            'status' => $request->status,
        ]);

        return redirect()->route('todolists.index');
    }

    public function destroy(Request $request)
    {
        // Kiểm tra quyền hạn trước khi cho phép xóa
        $todolist = TodoList::findOrFail($request->id);
        $todolist->delete();
        return redirect()->route('todolists.index');
    }


}
