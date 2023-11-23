<?php

namespace App\Http\Controllers;

use App\Http\Requests\TodoRequest;
use App\Models\Todo;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class MainController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $todos = $request->user()->todos()->orderBy('created_at', 'desc')->paginate(10);
        return view('dashboard', [
            'todos' => $todos,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('todo.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TodoRequest $request): RedirectResponse
    {
        $request->merge([
            'completed' => $request->has('completed'),
            'important' => $request->has('important'),
            'marked' => $request->has('marked'),
            'reminder_at' => $request->has('reminder_at') ? $request->reminder_at : null,
        ]);
        $request->user()->todos()->create($request->only([
            'title',
            'description',
            'completed',
            'important',
            'reminder_at',
            'marked',
        ]));

        return redirect()->route('todo.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Todo $todo): View
    {
        return view('todo.edit', [
            'todo' => $todo,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Todo $todo): RedirectResponse
    {
        $request->merge([
            'completed' => $request->has('completed'),
            'important' => $request->has('important'),
            'marked' => $request->has('marked'),
            'reminder_at' => $request->has('reminder_at') ? $request->reminder_at : null,
        ]);

        if ($request->has('completed') && $request->completed) {
            $request->merge([
                'completed_at' => now(),
            ]);
        }

        $todo->update($request->only([
            'title',
            'description',
            'completed',
            'completed_at',
            'important',
            'reminder_at',
            'marked',
        ]));

        return redirect()->route('todo.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Todo $todo)
    {
        $todo->delete();

        return redirect()->route('todo.index');
    }
}
