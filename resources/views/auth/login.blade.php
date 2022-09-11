@extends('layouts.authentication.master')
@section('title', 'Login')

@section('css')
@endsection

@section('style')
@endsection

@section('content')
    <div class="container-fluid p-0">
        <div class="row m-0">
            <div class="col-12 p-0">
                <div class="login-card">
                    <div>
                        @if (isset($errors) and $errors->any())
                            <div class="col-xl-12">
                                <div class="alert alert-danger">
                                    <ul class="list list-check">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        @endif
                        <div style="font-size: 27px;"><a class="logo" href="{{ route('/') }}"><img src="{{asset('assets/images/favicon.png')}}">  ISSET</a></div>
                        <div style="font-size: 27px; ">Interface du Suivi des Saisies des Titres Fonciers</div> 
                        <div class="logo mx-5"><img src="http://127.0.0.1:8000/assets/images/logo.png"></div>
                        
                        <div class="login-main mt-3">
                            <form  method="POST" action="{{ route('login') }}" class="theme-form">
                                @csrf
                                <h4>Connectez-vous au compte</h4>
                                {{-- class="text-danger" --}}
                                <p>Entrez votre email et votre mot de passe pour vous connecter</p>
                                <div class="form-group">
                                    <i class="fa fa-envelope"></i>
                                    <label class="col-form-label">Addresse Email</label>
                                    
                                    <input class="form-control" type="email" name="email" >
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <i class="fa fa-lock"></i>
                                    <label class="col-form-label">Mot de passe</label>
                                    
                                    <input class="form-control" type="password" name="password">
                                    <div class="show-hide"><span class="show"></span></div>
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-2">
                                    <button type="submit" class="btn btn-primary">
                                        Se connecter
                                    </button>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
@endsection

