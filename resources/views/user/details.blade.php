
<div class="modal fade" id="detail_modal_user" tabindex="-1" role="dialog" aria-labelledby="detail_modal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Modifier informations</h5>
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            @if(!empty($list_user))
                <form  method="POST" action="{{ route('modifier.utilisateur') }}" class="theme-form">
                    @csrf
            <div class="modal-body">
                <div class="login-main">
                        <div class="form-group">
                            <label class="col-form-label">Nom</label>
                            <input type="hidden" value="{{$list_user->id}}" name="id_user">
                            <input class="form-control" type="text" name="name" value="{{$list_user->name}}" >
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Prenom</label>
                            <input class="form-control" type="text" name="prenom" value="{{$list_user->prenom}}">
                        </div>
                       <div class="form-group">
                            <label class="col-form-label">Téléphone</label>
                            <input class="form-control" type="text" name="telephone" value="{{$list_user->telephone}}">
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Role</label>
                            <select name="role" class="form-select js-example-basic-single col-sm-12">
                                <option @if($list_user->role == "Administrateur") selected @endif value="Administrateur">Administrateur</option>
                                <option @if($list_user->role == "Gerant") selected @endif value="Gerant">Agent</option>
                                <option @if($list_user->role == "Directeur") selected @endif value="Directeur">Chef de service</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Email</label>
                            <input class="form-control" type="email" value="{{$list_user->email}}" name="email">
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
