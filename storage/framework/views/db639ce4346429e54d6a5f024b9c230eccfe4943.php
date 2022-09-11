
<div class="modal fade" id="detail_modal_user" tabindex="-1" role="dialog" aria-labelledby="detail_modal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Modifier informations</h5>
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <?php if(!empty($list_user)): ?>
                <form  method="POST" action="<?php echo e(route('modifier.utilisateur')); ?>" class="theme-form">
                    <?php echo csrf_field(); ?>
            <div class="modal-body">
                <div class="login-main">
                        <div class="form-group">
                            <label class="col-form-label">Nom</label>
                            <input type="hidden" value="<?php echo e($list_user->id); ?>" name="id_user">
                            <input class="form-control" type="text" name="name" value="<?php echo e($list_user->name); ?>" >
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Prenom</label>
                            <input class="form-control" type="text" name="prenom" value="<?php echo e($list_user->prenom); ?>">
                        </div>
                       <div class="form-group">
                            <label class="col-form-label">Téléphone</label>
                            <input class="form-control" type="text" name="telephone" value="<?php echo e($list_user->telephone); ?>">
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Role</label>
                            <select name="role" class="form-select js-example-basic-single col-sm-12">
                                <option value="">Veuillez sélectionner</option>
                                <option <?php if($list_user->role == "Administrateur"): ?> selected <?php endif; ?> value="Administrateur">Administrateur</option>
                                <option <?php if($list_user->role == "Gerant"): ?> selected <?php endif; ?> value="Gerant">Gerant</option>
                                <option <?php if($list_user->role == "Directeur"): ?> selected <?php endif; ?> value="Directeur">Directeur</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Email</label>
                            <input class="form-control" type="email" value="<?php echo e($list_user->email); ?>" name="email">
                        </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">
                    Modifier
                </button>
            </div>
            <?php endif; ?>
                </form>
        </div>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\isset\resources\views/user/details.blade.php ENDPATH**/ ?>