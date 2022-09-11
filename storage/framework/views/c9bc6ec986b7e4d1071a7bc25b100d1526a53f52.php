
<div class="modal fade" id="detail_modal_rapport" tabindex="-1" role="dialog" aria-labelledby="detail_modal_rapport" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Modifier informations</h5>
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <?php if(!empty($list_rapport)): ?>
                <form  method="POST" action="<?php echo e(route('modifier.rapport')); ?>" class="theme-form">
                    <?php echo csrf_field(); ?>
            <div class="modal-body">
                <div class="login-main">
                        <div class="form-group">
                            <label class="col-form-label">Date</label>
                            <input type="hidden" value="<?php echo e($list_rapport->id); ?>" name="id_rapport">
                            <input class="form-control" type="date" value="<?php echo e($list_rapport->date); ?>" name="date">
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Agent</label>
                            <select name="id_agent" class="form-select col-sm-12">
                                <?php $__currentLoopData = \App\Models\Agent::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $agent): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($agent->id); ?>" <?php if($agent->id == $list_rapport->id_agent): ?> selected <?php endif; ?>>
                                        <?php echo e($agent->name); ?>   <?php echo e($agent->prenom); ?>

                                    </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Nombre de TF impactes par des inscriptions</label>
                            <input class="form-control" type="number" name="nbre_tf_impactes" value="<?php echo e($list_rapport->nbre_tf_impactes); ?>">
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Nombre d'inscription</label>
                            <input class="form-control" type="number" name="nbre_inscription" value="<?php echo e($list_rapport->nbre_inscription); ?>">
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Nombre de TF crées</label>
                            <input class="form-control" type="number" value="<?php echo e($list_rapport->nbre_tf_crees); ?>" name="nbre_tf_crees">
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
<?php /**PATH C:\wamp64\www\Projet-Isset\isset\resources\views/rapport/details.blade.php ENDPATH**/ ?>