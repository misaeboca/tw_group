<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Logs;
use App\Models\Tasks;
use App\Mail\NotificationLogs;
use Illuminate\Support\Facades\Mail;



class LogsController extends Controller
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    /***return totail amount invoice***/
    public function create($id)
    {
        $tasks = Tasks::find($id);

        return view('logs.create', compact('tasks'));
    }

    public function store(Request $request){
        $validator = \Validator::make($request->all(), [
            'date' => 'required|date',
            'comment' => 'required|string'
        ],
        [
            'date.required' => 'Fecha requerido',
            'date.date' => 'Debe ser tipo fecha',
            'comment.required' => 'Comentario requerida',
            'comment.string' => 'Ingrese una cadena'
        ]
        );

        if ($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }


        $logs = new Logs();
        $logs->date = $request->input('date');
        $logs->tasks_id = $request->input('tasks_id');
        $logs->comment = $request->input('comment');

        $logs->save();

        try {
            //Enviar email 
            $tasks = Tasks::find($request->input('tasks_id'));

            $details = [ 
                        'usuario' =>  $tasks->user->name,
                        'tasks_id' => $tasks->id,
                        'description' => $tasks->description,
                        'url' => route('login')
                    ];

            Mail::to($tasks->user->email)->send(new NotificationLogs($details));

            return redirect()->route('tasks.show', $request->input('tasks_id'))->with('success', 'Logs creada correctamente!');
       
        } catch (Exception $e) {
            return redirect()->route('tasks.show', $request->input('tasks_id'))->with('success', 'Logs creada correctamente, pero no se ha enviado la notificacion');
        }

        
    }

}