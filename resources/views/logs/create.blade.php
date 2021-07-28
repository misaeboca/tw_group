@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">

        <div class="col-12">
            <div class="card">
                <div class="card-header"><h4>Crear Logs</h4></div>

                <div class="card-body">
                    <form  method="post" id="form_create" action="{{ route('logs.store') }}">
                       {{ csrf_field() }}
             
                       <div class="row mb-2">
                        <input type="hidden" name="tasks_id" value="{{$tasks->id}}">

                          <div class="col-12">
                             <label>Fecha</label>
                             <input type="date" name="date" id="date" class="form-control {{ $errors->has('date') ? 'is-invalid' : '' }}"
                                value="{{ old('date')  }}" placeholder="Fecha" autofocus >
                             @if($errors->has('date'))
                             <div class="invalid-feedback">
                                <strong>{{ $errors->first('date') }}</strong>
                             </div>
                             @endif
                          </div>
                       </div>

                      <div class="row mb-2">
                          <div class="col-12">
                             <label>Comentario</label>
                             <textarea type="textarea" name="comment" class="form-control {{ $errors->has('comment') ? 'is-invalid' : '' }}"
                                    value="" placeholder="Contenido" autofocus maxlength="300">{{ old('value')  }}</textarea>

                             @if($errors->has('comment'))
                             <div class="invalid-feedback">
                                <strong>{{ $errors->first('comment') }}</strong>
                             </div>
                             @endif
                          </div>
                        
                       </div>

                       {{-- Save button --}}
                       <div class="row mt-2 float-right">
                          <div class="col-sm-12">
                             <a href="{{ route('tasks.show', $tasks->id) }}" class="btn btn-default" id="btn_cancel" value="cancel">Cancelar
                             </a>
                             <button type="submit" class="btn btn-primary" id="_btn_save" value="create">Guardar
                             </button>
                          </div>
                       </div>
                       </div>
                    </form>
                </div>
                 
            </div>
        </div>
    </div>
</div>


@endsection