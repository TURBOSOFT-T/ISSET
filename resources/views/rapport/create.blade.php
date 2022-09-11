
<div class="modal fade" id="save_modal_rapport" tabindex="-1" role="dialog" aria-labelledby="save_modal_rapport" >
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Enregistrer un rapport</h5>
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
                <form  method="POST" action="{{ route('register_rapport') }}" class="theme-form">
                    @csrf
                    <div class="modal-body">
                        <div class="login-main">
                            <div class="form-group">
                                <label class="col-form-label">Date</label>
                                <input type="hidden" value="{{Auth::user()->id}}" name="id_user">
                                <input type="hidden" value="{{date("Y-m-d", time())}}" name="date_save">
                                <input class="form-control datepicker-here @error('date') is-invalid @enderror" autocomplete="off" maxDate="<?=date("m/d/Y",time())?>" id="datepicker" type="text" data-language="en" name="date">
                                @error('date')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                            </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="col-form-labe pt-0l">Agent</label>
                                <select name="id_agent" class="form-select col-sm-12 @error('id_agent') is-invalid @enderror">
                                    <option value="">Veuillez sélectionner un agent</option>
                                    @foreach (\App\Models\Agent::all() as $key => $agent)
                                        <option value="{{ $agent->id }}">
                                            {{ $agent->name }}   {{ $agent->prenom }}
                                        </option>
                                    @endforeach
                                </select>

                                @error('id_agent')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                 </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Nombre de TF impactes par des inscriptions</label>
                                <input class="form-control @error('nbre_tf_impactes') is-invalid @enderror" type="number" name="nbre_tf_impactes">
                                @error('nbre_tf_impactes')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                            </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Nombre d'inscription</label>
                                <input class="form-control @error('nbre_inscription') is-invalid @enderror" type="number" name="nbre_inscription">
                                @error('nbre_inscription')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                            </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Nombre de TF crées</label>
                                <input class="form-control @error('nbre_tf_crees') is-invalid @enderror" type="number" name="nbre_tf_crees">
                                @error('nbre_tf_crees')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                            </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">
                            Enregistrer
                        </button>
                    </div>
                </form>
        </div>
    </div>
</div>
