<?php

namespace App\Http\Controllers;

use App\Models\Priority;
use Illuminate\Http\Request;

class PriorityController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $priority = Priority::query();

        if ($search) {
            $priority->where(function ($query) use ($search) {
                $query->where('name', 'LIKE', "%$search%");
            });
        }
        $priorities = $priority->get();
        return view('pages.priority.index', compact('priorities'));
    }
    public function getPriority(Request $request)
    {
        $id = $request->id;
        $priority = Priority::findOrFail($id);
        return response()->json(['priority' => $priority]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);
        $id = $request->id;
        if ($id) {
            $priority = Priority::findOrFail($id);
            $priority->update([
                'name' => $request->name,
            ]);
        } else {
            Priority::create([
                'name' => $request->name,
            ]);
        }
        return response()->json(['message' => 'Priority saved successfully']);
    }

    public function destroy(Request $request)
    {
        $id = $request->id;
        $priority = Priority::findOrFail($id);
        $priority->delete();
        return response()->json(['message' => 'Priority deleted successfully']);
    }
}
