<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Tasks;

use Illuminate\Support\Facades\DB;


class TasksController extends Controller
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    /***return totail amount invoice***/
    public function index()
    {
        $tasks = Tasks::select('*')->paginate(20);

        return redirect()->route('home')->with('tasks');
    }

    public function create()
    {
        $users = User::select('id', 'name', 'email')->get();

        return view('tasks.create', compact('users'));
    }

    public function store(Request $request){
        $validator = \Validator::make($request->all(), [
            'date_exe' => 'required|date',
            'user_id' => 'required|numeric',
            'description' => 'required|string',
        ],
        [
            'date_exe.required' => 'Fecha de ejecucion requerido',
            'date_exe.date' => 'Debe ser tipo fecha',
            'user_id.required' => 'Usuario requerido',
            'user_id.numeric' => 'Ingrese una usuario valido',
            'description.required' => 'Descripción requerida',
            'description.string' => 'Ingrese una descripcion valida',
        ]
        );

        if ($validator->fails()){
            return redirect()->route('tasks.create')->withErrors($validator)->withInput();
        }

        $tasks = new Tasks();
        $tasks->date_exe = $request->input('date_exe');
        $tasks->user_id = $request->input('user_id');
        $tasks->description = $request->input('description');

        $tasks->save();

        return redirect()->route('home')->with('success', 'Tarea creada correctamente!');
    }


    public function show($id)
    {
        $tasks = Tasks::with('logs')->with('user')->where('id', $id)->first();

        return view('tasks.show', compact('tasks'));
    }


}