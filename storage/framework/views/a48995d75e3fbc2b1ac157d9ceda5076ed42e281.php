

<?php $__env->startSection('css'); ?>
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/vendors/datatables.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/vendors/select2.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/vendors/date-picker.css')); ?>">

<?php $__env->stopSection(); ?>

<?php $__env->startSection('style'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb-title'); ?>
    <h3>Rapports</h3>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb-items'); ?>
    <li class="breadcrumb-item active">rapports</li>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <?php echo $__env->make('flash-message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div id="afficher_details_rapport">
            <?php echo $__env->make("rapport.details", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>

        <?php echo $__env->make("rapport.create", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-original-title="test" data-bs-target="#save_modal_rapport">Ajouter</button>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="display" id="ajax-crud-rapport" >
                                <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Date</th>
                                    <th>Agent</th>
                                    <th>Nbres de TF impactés par les inscriptions</th>
                                    <th>Nbres d'inscriptions</th>
                                    <th>Nbres de TF</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script src="<?php echo e(asset('assets/js/datatable/datatables/jquery.dataTables.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/datatable/datatables/datatable.custom.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/datepicker/date-picker/datepicker.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/datepicker/date-picker/datepicker.en.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/datepicker/date-picker/datepicker.custom.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/select2/select2.full.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/select2/select2-custom.js')); ?>"></script>
    <script type="text/javascript">


        function deleteFuncRapport(id){
            if (confirm("Voulez-vous vraiment le supprimer?") == true) {
                var id = id;
                // ajax
                $.ajax({
                    type:"POST",
                    url: "<?php echo e(url('/rapports/supprimer-rapport')); ?>",
                    data: { id: id,_token: '<?php echo e(csrf_token()); ?>' },
                    dataType: 'json',
                    success: function(res){
                        var oTable = $('#ajax-crud-rapport').dataTable();
                        oTable.fnDraw(false);
                    }
                });
                }
             }

        jQuery(function ($){

            $(document).ready( function () {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.fn.dataTable.ext.errMode = 'none';
                var table =  $('#ajax-crud-rapport').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: "<?php echo e(url('/rapports')); ?>",
                    columns: [

                        {data: 'id', name: 'id'},
                        {data: 'date', name: 'date'},
                        {data: 'name', name: 'name'},
                        {data: 'nbre_tf_impactes', name: 'nbre_tf_impactes'},
                        {data: 'nbre_inscription', name: 'nbre_inscription'},
                        {data: 'nbre_tf_crees', name: 'nbre_tf_crees'},
                        {data: 'action', name: 'action', orderable: false},
                    ],
                    order: [[0, 'desc']]
                });


                $("#datepicker").datepicker({maxDate: new Date() });

                $('body').on('click', '#open_detail_rapport', function (event) {
                    event.preventDefault();
                    var id = $(this).data('id');
                    var id = id;
                    // ajax
                    $.ajax({
                        type: "POST",
                        url: "<?php echo e(url('/rapports/details')); ?>",
                        data: {id: id,_token: '<?php echo e(csrf_token()); ?>' },
                        success: function (data) {
                            $('#afficher_details_rapport').html(data);
                            $('#detail_modal_rapport').modal('show');

                        }
                    });

                });


            });
        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.simple.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\isset\resources\views/rapport/list.blade.php ENDPATH**/ ?>