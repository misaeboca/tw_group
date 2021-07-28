@extends('layouts.app')

@section('content')



<div class="container">
    @if (\session('errors'))
    <div class="alert alert-danger">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
      <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
    @endif
    @if (session()->has('success'))
        <div class="alert alert-success">
           <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            {!! session()->get('success')!!} 
            
        </div>
    @endif

    <div class="row justify-content-center">
        <div class="col-12 mb-1 pr-3">
           <div class="row mb-1 float-right ">
              <a href="{{ route('tasks.create') }}" class="btn btn-primary">AGREGAR TAREA</a>
  
            </div>
        </div>

        <div class="col-12">
            <div class="card">
                <div class="card-header"><h4>Listado de Tareas</h4></div>

                <div class="card-body">
                   <table
                        class="table table-bordered">
                       <thead>
                            <tr class="">
                                <td width="10%" class="text-center"><b>Id</b></td>
                                <td width="30%" class="text-center"><b>Usuario Asignado</b></td>
                                <td width="30%" class="text-left"><b>Descripción</b></td>
                                <td width="15%" class="text-center"><b>Fecha de ejecución</b></td>
                                <td width="10%" class="text-center"><b>Acciones</b></td>
                            </tr>
                       </thead>

                        <tbody>
                            @if($tasks->count() > 0)
                                @foreach($tasks as $t)
                                    <tr>
                                        <td width="10%" class="text-center">{{ $t->id }}</td>
                                        <td width="30%" class="text-center">{{ $t->user->name }}</td>
                                        <td width="30%" class="text-left">{{ $t->description }}</td>
                                        <td width="15%" class="text-center @if($t->date_exe <= now()->toDateString()) text-danger @endif">{{ $t->date_exe }}</td>
                                        <td width="15%" class="text-center">
                                        @if(Auth()->user()->id ==$t->user->id )
                                            <a href="{{ route('tasks.show', $t->id) }}"  class="btn btn-xs btn-primary" data-toggle="tooltip" data-placement="top" title="Ver detalle"><i class="fa fa-search"></i></a>
                                        @endif
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                    <tr>
                                        <td colspan="4"><center>No existen tareas</center></td>
                                    </tr>
                            @endif
                        </tbody>
                   </table>

                     {!! $tasks->links() !!}
                  
                </div>
                 
            </div>
        </div>
    </div>
</div>


@endsection
<style type="text/css">
    .table td, .table th {
        padding: .40rem !important;
        vertical-align: top;
        border-top: 1px solid #dee2e6;
    }

</style>
