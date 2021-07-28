@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">

        <div class="col-12">
            <div class="card">
                <div class="card-header"><h4>Crear Tarea</h4></div>

                <div class="card-body">
                    <form  method="post" id="form_create" action="{{ route('tasks.store') }}">
                       {{ csrf_field() }}
             
                       <div class="row mb-2">

                          <div class="col-12">
                             <label>Fecha de ejecucion</label>
                             <input type="date" name="date_exe" id="date_exe" class="form-control {{ $errors->has('date_exe') ? 'is-invalid' : '' }}"
                                value="{{ old('date_exe')  }}" placeholder="Fecha de ejecucion" autofocus >
                             @if($errors->has('date_exe'))
                             <div class="invalid-feedback">
                                <strong>{{ $errors->first('date_exe') }}</strong>
                             </div>
                             @endif
                          </div>
                       </div>
                       <div class="row mb-2">
                          <div class="col-12">
                             <label>Usuario asignado</label>
                             <select class="form-control select"  name="user_id" id="user_id">
                                @foreach($users as $user)
                                <option value="{{ $user->id }}">{{ $user->name}} </option>
                                @endforeach
                             </select>
                             @if($errors->has('user_id'))
                             <div class="invalid-feedback">
                                <strong>{{ $errors->first('user_id') }}</strong>
                             </div>
                             @endif
                          </div>
                        
                       </div>

                        <div class="row mb-2">
                          <div class="col-12">
                             <label>Descripción</label>
                             <textarea type="textarea" name="description" class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}"
                                    value="" placeholder="Contenido" autofocus maxlength="300">{{ old('description')  }}</textarea>

                             @if($errors->has('description'))
                             <div class="invalid-feedback">
                                <strong>{{ $errors->first('description') }}</strong>
                             </div>
                             @endif
                          </div>
                        
                       </div>

                       {{-- Save button --}}
                       <div class="row mt-2 float-right">
                          <div class="col-sm-12">
                             <a href="{{ route('home') }}" class="btn btn-default" id="btn_cancel" value="cancel">Cancelar
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