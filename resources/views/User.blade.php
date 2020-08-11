@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Registrar') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('usuario.store') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div> 

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Correo electrónico') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">Rol</label>
                            <div class="col-md-6">
                                <select name="rol" class="form-control">
                                    <option selected disabled>-</option>
                                    @foreach ($roles as $role)
                                    <option value="{{$role->id}}">{{$role->nombre}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Contraseña') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirmar contraseña') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Registrar') }}
                                </button>
                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="/login">
                                        {{ __('Iniciar sesión') }}
                                    </a>
                                @endif
                            </div>
                            
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{--
    <div class="row">
        <div class="col-sm-4">
            <h1>Nuevo usuario</h1>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
    </div>
            <form action="{{ route('usuario.store') }}" method="POST">
                @csrf

                <div class="row">
                    <div class="form-group col-md-6">
                      <label >Nombre</label>
                      <input type="text" name="name" class="form-control" placeholder="Nombre">
                    </div>
                    <div class="form-group col-md-6">
                      <label >Email</label>
                      <input type="email" name="email" class="form-control" placeholder="Email">
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-6">
                      <label >Contraseña</label>
                      <input type="password" name="password" class="form-control" placeholder="contraseña">
                    </div>
                    <div class="form-group col-md-6">
                      <label >Confirmar contraseña</label>
                      <input type="password" name="password_confirmation" class="form-control" placeholder="Confirmar contraseña">
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-6">
                      <label >Rol</label>
                      <select name="rol" class="form-control">
                          <option selected disabled>-</option>
                          @foreach ($roles as $role)
                            <option value="{{$role->id}}">{{$role->nombre}}</option>
                          @endforeach
                      </select>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-6">
                      <button type="submit" class="btn btn-primary">Reguistrar</button>
                      <button type="reset" class="btn btn-danger">Cancelar</button>
                    </div>
                </div>
                --}}
<!-------------------------------------------------------------------

                <div class="form-group">
                <label for="name">Nombre</label>
                <input type="text" class="form-control" name="name" placeholder="Ingrese su nombre">
                </div>
                <div class="form-group">
                    <label for="email">email</label>
                    <input type="email" class="form-control" name="email" placeholder="Ingrese su email">
                </div>
                <div class="form-group">
                    <label for="email">Rol</label>
                    <select name="rol" class="form-control">
                        <option selected disabled>Elejir rol</option>
                        {{--
                        @foreach ($roles as $role)
                            <option value="{{$role->id}}">{{$role->name}}</option>    
                        @endforeach
                        --}}
                    </select>
                </div>
                <div class="form-group">
                <label for="password">contraseña</label>
                <input type="password" class="form-control" name="password" placeholder="Ingerse contraseña">
                </div>
                <button type="submit" class="btn btn-primary">Reguistrar</button>
                <button type="reset" class="btn btn-danger">Cancelar</button>
--------------------------------------------------------------------------------------->
            </form>
        
</div>

@endsection