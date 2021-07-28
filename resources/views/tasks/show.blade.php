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
              <a href="{{ route('home') }}" class="btn  btn-default mr-2">ATRAS</a>
              <a href="{{ route('logs.create', $tasks->id) }}" class="btn btn-primary">AGREGAR LOGS</a>
  
            </div>
        </div>
        <div class="col-12">
            <div class="card">
                <div class="card-header"><h5><b>Detalle de la Tarea</b></h5></div>

                   <div class="card-body">
                      <div class="row">
                         <div class="col-12">
                               <ul class="nav nav-pills flex-column">
                                  <li class="nav-item ">
                                     <label>ID: </label><span class="pl-2">{{  $tasks->id }}</span>
                                  </li>
                                  <li class="nav-item">
                                     <label>USUARIO: </label><span class="pl-2">{{  $tasks->user->name }}</span>
                                  </li>
                                  <li class="nav-item">
                                     <label>DESCRIPCION: </label> <span class="pl-2">{{ $tasks->description }}
                                     </span>
                                  </li>
                                  <li class="nav-item">
                                     <label>FECHA DE EJECUCION: </label> <span class="pl-2">{{ $tasks->date_exe }}
                                     </span>
                                  </li>
                                 
                               </ul>
                         </div>
                      </div>
                   </div>
            </div>
        </div>

      <div class="col-12">
          <div class="card">
            <div class="card-header"><h5><b>Logs de la Tarea</b></h5></div>
             <div class="card-body">
                      <div class="row">
                         <table class="table table-bordered">
                               <thead>
                                    <tr class="">
                                        <td width="10%" class="text-center"><b>Id</b></td>
                                        <td width="60%" class="text-center"><b>Comentario</b></td>
                                        <td width="20%" class="text-center"><b>Fecha</b></td>
                                      
                                    </tr>
                               </thead>

                              <tbody>
                                  @if($tasks->logs->count() > 0)
                                      @foreach($tasks->logs as $t)
                                          <tr>
                                              <td width="7%" class="text-center">{{ $t->id }}</td>
                                              <td width="60%" class="text-left">{{ $t->comment }}</td>
                                              <td width="20%" class="text-center">{{ $t->date }}</td>
                                          </tr>
                                      @endforeach
                                  @else
                                          <tr>
                                              <td colspan="4"><center>No existen logs</center></td>
                                          </tr>
                                  @endif
                              </tbody>
                          </table>
                  </div>
             </div>
          </div>
        </div>
    </div>
</div>

@endsection
<style type="text/css">
    .table td, .table th {
        padding: .35rem !important;
        vertical-align: top;
        border-top: 1px solid #dee2e6;
    }

</style>