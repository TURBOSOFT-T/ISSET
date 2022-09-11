@extends('layouts.simple.master')

@section('title', 'Sign-up')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/select2.css')}}">
@endsection

@section('style')

@endsection

@section('breadcrumb-title')
    <h3>Ajouter un utilisateur</h3>
@endsection

@section('breadcrumb-items')
    <li class="breadcrumb-item active">Créer</li>
    <li class="breadcrumb-item"><a href="{{route('user')}}">Retour</a></li>
@endsection


@section('content')
    <div class="container-fluid p-0">
        <div class="row m-0">
            <div class="col-12 p-0 bg-div">
                <div>
                    <div>
                        <div>
                            <form class="padd-form" method="POST" action="{{ route('register_user') }}">
                                @csrf
                                <div class="form-group mbotton">
                                    <label class="col-form-label pt-0">Nom</label>
                                    <div class="row g-2">
                                        <input id="name" type="text"
                                               class="form-control @error('name') is-invalid @enderror" name="name"
                                               value="{{ old('name') }}" autofocus>
                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group mbotton">
                                    <label class="col-form-label pt-0">Prenom</label>
                                    <div class="row g-2">
                                        <input id="prenom" type="text"
                                               class="form-control @error('prenom') is-invalid @enderror" name="prenom"
                                               value="{{ old('prenom') }}" autofocus>
                                        @error('prenom')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group mbotton">
                                    <label class="col-form-label pt-0">Téléphone</label>
                                    <div class="row g-2">
                                        <input id="telephone" type="text"
                                               class="form-control @error('telephone') is-invalid @enderror" name="telephone"
                                               value="{{ old('telephone') }}" autofocus>
                                        @error('telephone')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label pt-0">Role</label>
                                    <select name="role" class="form-control js-example-basic-single col-sm-12 @error('role') is-invalid @enderror">
                                        <option value="">Veuillez sélectionner</option>
                                        <option value="Administrateur">Administrateur</option>
                                        <option value="Agent">Agent</option>
                                        <option value="Chef de service">Chef de service</option>
                                    </select>
                                    @error('role')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                            </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label">Email Address</label>
                                    <input id="email" type="email"
                                           class="form-control @error('email') is-invalid @enderror" name="email"
                                           value="{{ old('email') }}" autocomplete="email">
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label">Mot de passe</label>
                                    <input class="form-control @error('password') is-invalid @enderror" id="password"
                                           type="password" name="password">
                                    <div class="show-hide show-hide-passe"><span class="show"></span></div>
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="password-confirm" class="col-form-label text-md-right">Confirmez le mot
                                        de passe</label>
                                    <input id="password-confirm" type="password" class="form-control"
                                           name="password_confirmation" required autocomplete="new-password">
                                </div>
                                <div class="form-group mb-0 mt-3">
                                    <button class="btn btn-primary btn-block" type="submit">Enregistrer</button>
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
    <script src="{{asset('assets/js/select2/select2.full.min.js')}}"></script>
    <script src="{{asset('assets/js/select2/select2-custom.js')}}"></script>
@endsection