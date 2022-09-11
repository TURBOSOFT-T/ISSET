
<div class="modal fade" id="detail_modal_rapport" tabindex="-1" role="dialog" aria-labelledby="detail_modal_rapport" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Modifier informations</h5>
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            @if(!empty($list_rapport))
                <form  method="POST" action="{{ route('modifier.rapport') }}" class="theme-form">
                    @csrf
            <div class="modal-body">
                <div class="login-main">
                        <div class="form-group">
                            <label class="col-form-label">Date</label>
                            <input type="hidden" value="{{$list_rapport->id}}" name="id_rapport">
                            <input class="form-control" type="date" value="{{$list_rapport->date}}" name="date">
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Agent</label>
                            <select name="id_agent" class="form-select col-sm-12">
                                @foreach (\App\Models\Agent::all() as $key => $agent)
                                    <option value="{{ $agent->id }}" @if($agent->id == $list_rapport->id_agent) selected @endif>
                                        {{ $agent->name }}   {{ $agent->prenom }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Nombre de TF impactes par des inscriptions</label>
                            <input class="form-control" type="number" name="nbre_tf_impactes" value="{{$list_rapport->nbre_tf_impactes}}">
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Nombre d'inscription</label>
                            <input class="form-control" type="number" name="nbre_inscription" value="{{$list_rapport->nbre_inscription}}">
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Nombre de TF crées</label>
                            <input class="form-control" type="number" value="{{$list_rapport->nbre_tf_crees}}" name="nbre_tf_crees">
                        </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">
                    Modifier
                </button>
            </div>
            @endif
                </form>
        </div>
    </div>
</div>
