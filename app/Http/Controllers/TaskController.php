<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Task;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Inertia\Inertia;
use Inertia\Response;

class TaskController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): Response
    {
        return Inertia::render('Task/Create');
    }
    /**
     * Display the registration view.
     */
    public function show(Request $request)
    {   
        return response()->json(Task::all());
    }
    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'Title' => 'required|string|max:199',
            'Description' => 'required|string|max:199',
            'Status' => 'required|string|max:199',
            'User_Id' => 'required|integer',
        ]);

        $Task = Task::create([
            'Title' => $request->Title,
            'Description' => $request->Description,
            'Status' => $request->Status,
            'User_Id' => $request->User_Id,
        ]);


        return redirect(route('task', absolute: false));
    }

     /**
     * Display the registration view.
     */
    public function update(Request $request): Response
    {
        $task =Task::where('id',$request->id)->first();
        return Inertia::render('Task/Update', [
            'Title' => $task->Title,
            'Description' => $task->Description,
            'Status' => $task->Status,
            'User_Id' => $task->User_Id,
        ]);
    }
     /**
     * Display the registration view.
     */
    public function edit(Request $request)
    {
        $task =Task::where('id',$request->id)->first();
        $task->Title = $request->Title;
        $task->Description = $request->Description;
        $task->Status = $request->Status;
        $task->User_Id = $request->User_Id;
        $task->save();

        return redirect(route('task', absolute: false));

    }
}
