<?php $total_a =0; ?>
<?Php

$nbre_tf_impactes_a = \App\Models\Rapport::where('id',$id)->sum('nbre_tf_impactes');
$nbre_inscription_a = \App\Models\Rapport::where('id',$id)->sum('nbre_inscription');
$nbre_tf_crees_a = \App\Models\Rapport::where('id',$id)->sum('nbre_tf_crees');
$total_a = $nbre_tf_impactes_a + $nbre_inscription_a + $nbre_tf_crees_a;
?>
<?php echo e($total_a); ?>

<?php /**PATH C:\xampp\htdocs\isset\resources\views/rapport-directeur/totalTable.blade.php ENDPATH**/ ?>