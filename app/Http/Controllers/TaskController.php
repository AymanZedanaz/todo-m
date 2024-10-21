<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    // عرض جميع المهام
    public function index()
    {
        $tasks = Task::all();
        return view('tasks.index', compact('tasks'));
    }

    // إضافة مهمة جديدة
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
        ]);

        Task::create([
            'title' => $request->title,
        ]);

        return redirect()->back();
    }

    // تحديث حالة المهمة (اكتملت أم لا)
    public function update(Task $task)
    {
        $task->update([
            'completed' => !$task->completed,
        ]);

        return redirect()->back();
    }

    // حذف مهمة
    public function destroy(Task $task)
    {
        $task->delete();

        return redirect()->back();
    }
}
