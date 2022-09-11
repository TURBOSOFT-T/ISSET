
    <?php
        $nom_agent = \App\Models\Agent::where('id', $id_agent)->pluck('name');
        $prenom_agent = \App\Models\Agent::where('id', $id_agent)->pluck('prenom');
    ?>
    <?php echo e($nom_agent[0]); ?> <?php echo e($prenom_agent[0]); ?><?php /**PATH C:\xampp\htdocs\isset\resources\views/rapport/actionNameAgent.blade.php ENDPATH**/ ?>