

<?php $__env->startSection('css'); ?>
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/vendors/datatables.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/vendors/select2.css')); ?>">

<?php $__env->stopSection(); ?>

<?php $__env->startSection('style'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb-title'); ?>
    <h3>Utilisateurs</h3>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb-items'); ?>
    <li class="breadcrumb-item active">utilisateurs</li>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <?php echo $__env->make('flash-message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div id="afficher_details_user">
            <?php echo $__env->make("user.details", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <a class="btn btn-primary" href="<?php echo e(route('createuser')); ?>" data-bs-toggle="tooltip" title="" role="button" aria-describedby="tooltip613978">Ajouter</a>
                     </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="display" id="ajax-crud-user" >
                                <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Nom</th>
                                    <th>Prenom</th>
                                    <th>Role</th>
                                    <th>Email</th>
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
    <script src="<?php echo e(asset('assets/js/select2/select2.full.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/select2/select2-custom.js')); ?>"></script>
    <script type="text/javascript">


        function deleteFuncUser(id){
            if (confirm("Voulez-vous vraiment le supprimer?") == true) {
                var id = id;
                // ajax
                $.ajax({
                    type:"POST",
                    url: "<?php echo e(url('/users/supprimer-utilisateur')); ?>",
                    data: { id: id,_token: '<?php echo e(csrf_token()); ?>' },
                    dataType: 'json',
                    success: function(res){
                        var oTable = $('#ajax-crud-user').dataTable();
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
                $('#ajax-crud-user').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: "<?php echo e(url('/users')); ?>",
                    columns: [

                        {data: 'id', name: 'id'},
                        {data: 'name', name: 'name'},
                        {data: 'prenom', name: 'prenom'},
                        {data: 'role', name: 'role'},
                        {data: 'email', name: 'email'},
                        {data: 'action', name: 'action', orderable: false},
                    ],
                    order: [[0, 'desc']]
                });

                $('body').on('click', '#open_detail_user', function (event) {
                    event.preventDefault();
                    var id = $(this).data('id');
                    var id = id;
                    // ajax
                    $.ajax({
                        type: "POST",
                        url: "<?php echo e(url('/users/details-utilisateur')); ?>",
                        data: {id: id,_token: '<?php echo e(csrf_token()); ?>' },
                        success: function (data) {
                            $('#afficher_details_user').html(data);
                            $('#detail_modal_user').modal('show');

                        }
                    });

                });

            });
        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.simple.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\Projet-Isset\isset\resources\views/user/list.blade.php ENDPATH**/ ?>