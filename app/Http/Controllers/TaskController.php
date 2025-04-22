<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class TaskController extends Controller
{
    /**
     * Display a listing of the tasks.
     *
     * @return View
     */
    public function index(): View
    {
        $tasks = Task::all();
        return view('tasks.index', compact('tasks'));
    }

    /**
     * 
     *
     * @return View
     */
    public function create(): View
    {
        return view('tasks.create');
    }

    /**
     * 
     *
     * @param  Request  $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'is_completed' => 'boolean',
        ]);

        Task::create($request->all());

        return redirect()->route('tasks.index')->with('success', 'Task created successfully.');
    }

    /**
     * 
     *
     * @param  Task  $task
     * @return View
     */
    public function show(Task $task): View
    {
        return view('tasks.show', compact('task'));
    }

    /**
     *
     *
     * @param  Task  $task
     * @return View
     */
    public function edit(Task $task): View
    {
        return view('tasks.edit', compact('task'));
    }

    /**
     * 
     *
     * @param  Request  $request
     * @param  Task  $task
     * @return RedirectResponse
     */
    public function update(Request $request, Task $task): RedirectResponse
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'is_completed' => 'boolean',
        ]);

        $task->update($request->all());

        return redirect()->route('tasks.index')->with('success', 'Task updated successfully.');
    }

    /**
     * 
     *
     * @param  Task  $task
     * @return RedirectResponse
     */
    public function destroy(Task $task): RedirectResponse
    {
        $task->delete();

        return redirect()->route('tasks.index')->with('success', 'Task deleted successfully.');
    }
}