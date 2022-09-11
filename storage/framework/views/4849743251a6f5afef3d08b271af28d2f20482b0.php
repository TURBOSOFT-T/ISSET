

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
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <form  method="POST" action="<?php echo e(route('rapport.export')); ?>">
                            <?php echo csrf_field(); ?>
                        <div class="dispform">


                            <div class="col-md-4 margin-div-dir">
                                <div class="form-group">
                                    <label class="col-form-label pt-0">Date</label>
                                    <input class="datepicker-here form-control digits height-range" autocomplete="off" name="search_id_date" id="search_id_date" type="text" data-range="true" placeholder="Veuillez sélectionner un interval de temps" data-multiple-dates-separator=" - " data-language="en">
                                </div>
                            </div>
                            <div class="col-md-4 mr-4 margin-div-dir">
                                <div class="form-group">
                                    <label class="col-form-label pt-0">Agent</label>
                                    <select name="search_id_agent" id="search_id_agent" class="form-control js-example-basic-single col-sm-12">
                                        <option value="">Tous les agents</option>
                                        <?php $__currentLoopData = \App\Models\Agent::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $agent): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($agent->id); ?>">
                                                <?php echo e($agent->name); ?>   <?php echo e($agent->prenom); ?>

                                            </option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <button type="button" class="btn-block-option margin-btn-dir btn btn-primary" id="validform" data-toggle="block-option"
                                            data-action="state_toggle" data-action-mode="demo">
                                        Valider
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="offset-md-8 col-md-4" style="text-align: right">
                            <div class="form-group">
                                <button type="submit" class="btn-block-option btn btn-primary" data-toggle="block-option"
                                   data-action="state_toggle" data-action-mode="demo">
                                    Exporter les données
                                </button>
                            </div>
                        </div>
                    </form>
                    </div>
                    <div class="card-body" id="emplacement_table">
                        <div class="table-responsive" id="show_table">
                            <table class="display" id="ajax-crud-directeur" >
                                <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Date</th>
                                    <th>Agent</th>
                                    <th>Nbres de TF impactés par les inscriptions</th>
                                    <th>Nbres d'inscriptions</th>
                                    <th>Nbres de TF</th>
                                </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                    <th>TOTAL</th>
                                    <th></th>
                                    <th></th>
                                    <th id="nbre_tf_impactes"></th>
                                    <th id="total_nbre_inscription"></th>
                                    <th id="total_nbre_tf_crees"></th>
                                </tr>
                                </tfoot>
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

        jQuery(function ($){


            $(document).ready( function () {

                setTimeout(function() {

                $('#validform').trigger('click');

                }, 2000);
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.fn.dataTable.ext.errMode = 'none';
             var table =  $('#ajax-crud-directeur').DataTable({
                     fixedHeader: {
                         header: true,
                         footer: true
                    },
                    processing: true,
                    serverSide: true,
                    iDisplayLength: 25,
                    ajax: {
                        'type': 'POST',
                        'url': '<?php echo e(url('/dashboard')); ?>',
                        'data' : function ( d ) {
                        return $.extend( {}, d, {
                            "_token" : "<?php echo e(csrf_token()); ?>",
                            "id_agent" :$("#search_id_agent").val(),
                            "date" : $("#search_id_date").val()
                        });
                      }
                    },
                    columns: [
                        {data: 'id', name: 'id'},
                        {data: 'date', name: 'date'},
                        {data: 'nomcomplet', name: 'nomcomplet'},
                        {data: 'nbre_tf_impactes', name: 'nbre_tf_impactes', className:'total_nbre_tf_impactes'},
                        {data: 'nbre_inscription', name: 'nbre_inscription', className:'total_nbre_inscription'},
                        {data: 'nbre_tf_crees', name: 'nbre_tf_crees', className:'total_nbre_tf_crees'},
                    ],
                    order: [[0, 'desc']]
                });

                table.on('draw', function () {

                    setTimeout(function() {

                        var somme1 = 0;
                        $("#nbre_tf_impactes").text(somme1);
                        $('#ajax-crud-directeur').find('tr').each(function(index) {

                            if(parseInt( $(this).find('.total_nbre_tf_impactes').text() )){
                                somme1 = somme1 + parseInt( $(this).find('.total_nbre_tf_impactes').text() );
                            }

                        });
                        $("#nbre_tf_impactes").text(somme1);


                        var somme2 = 0;
                        $("#total_nbre_inscription").text(somme2);
                        $('#ajax-crud-directeur').find('tr').each(function(index) {

                            if(parseInt( $(this).find('.total_nbre_inscription').text() )){
                                somme2 = somme2 + parseInt( $(this).find('.total_nbre_inscription').text() );
                            }

                        });
                        $("#total_nbre_inscription").text(somme2);

                        var somme3 = 0;
                        $("#total_nbre_tf_crees").text(somme3);
                        $('#ajax-crud-directeur').find('tr').each(function(index) {

                            if(parseInt( $(this).find('.total_nbre_tf_crees').text() )){
                                somme3 = somme3 + parseInt( $(this).find('.total_nbre_tf_crees').text() );
                            }

                        });
                        $("#total_nbre_tf_crees").text(somme3);


                    }, 1500);

                });

                $("#search_id_date").datepicker({maxDate: new Date() });

                $('body').on('click', '#validform', function () {
                     // alert($("#search_id_agent").val());
                       table.draw();

                    setTimeout(function() {

                        var somme1 = 0;
                    $("#nbre_tf_impactes").text(somme1);
                    $('#ajax-crud-directeur').find('tr').each(function(index) {

                        if(parseInt( $(this).find('.total_nbre_tf_impactes').text() )){
                            somme1 = somme1 + parseInt( $(this).find('.total_nbre_tf_impactes').text() );
                        }

                    });
                    $("#nbre_tf_impactes").text(somme1);


                    var somme2 = 0;
                    $("#total_nbre_inscription").text(somme2);
                    $('#ajax-crud-directeur').find('tr').each(function(index) {

                        if(parseInt( $(this).find('.total_nbre_inscription').text() )){
                            somme2 = somme2 + parseInt( $(this).find('.total_nbre_inscription').text() );
                        }

                    });
                    $("#total_nbre_inscription").text(somme2);

                    var somme3 = 0;
                    $("#total_nbre_tf_crees").text(somme3);
                    $('#ajax-crud-directeur').find('tr').each(function(index) {

                        if(parseInt( $(this).find('.total_nbre_tf_crees').text() )){
                            somme3 = somme3 + parseInt( $(this).find('.total_nbre_tf_crees').text() );
                        }

                    });
                    $("#total_nbre_tf_crees").text(somme3);


                    }, 1500);
                });



                $('body').on('click', '#export_exel', function (event) {
                    event.preventDefault();
                    var id_agent_export = $("#search_id_agent").val();
                    var date_export = $("#search_id_date").val();
                    // ajax
                    $.ajax({
                        type: "POST",
                        url: "<?php echo e(url('/export')); ?>",
                        data: {
                            id_agent_export: id_agent_export,
                            date_export: date_export,
                            _token: '<?php echo e(csrf_token()); ?>' },
                        success: function (data) {

                        }
                    });

                });

            });

        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.simple.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\Projet-Isset\isset\resources\views/rapport-directeur/list.blade.php ENDPATH**/ ?>