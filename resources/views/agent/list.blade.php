@extends('layouts.simple.master')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/datatables.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/select2.css')}}">

@endsection

@section('style')
@endsection

@section('breadcrumb-title')
    <h3>Agents</h3>
@endsection

@section('breadcrumb-items')
    <li class="breadcrumb-item active">agents</li>
@endsection


@section('content')
    <div class="container-fluid">
        @include('flash-message')
        <div id="afficher_details">
            @include("agent.details")
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <a class="btn btn-primary" href="{{route('create')}}" data-bs-toggle="tooltip" title="" role="button" aria-describedby="tooltip613978">Ajouter</a>
                     </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="display" id="ajax-crud-agent" >
                                <thead>
                                <tr>
                                    <th>Matricule</th>
                                    <th>Nom</th>
                                    <th>Prenom</th>
                                    <th>Fonction</th>
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
@endsection

@section('script')
    <script src="{{asset('assets/js/datatable/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('assets/js/datatable/datatables/datatable.custom.js')}}"></script>
    <script src="{{asset('assets/js/select2/select2.full.min.js')}}"></script>
    <script src="{{asset('assets/js/select2/select2-custom.js')}}"></script>
    <script type="text/javascript">


        function deleteFunc(id){
            if (confirm("Voulez-vous vraiment le supprimer?") == true) {
                var id = id;
                // ajax
                $.ajax({
                    type:"POST",
                    url: "{{ url('/agents/supprimer-agent') }}",
                    data: { id: id,_token: '{{csrf_token()}}' },
                    dataType: 'json',
                    success: function(res){
                        var oTable = $('#ajax-crud-agent').dataTable();
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
                $('#ajax-crud-agent').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: "{{ url('/agents') }}",
                    columns: [

                        {data: 'matricule', name: 'matricule'},
                        {data: 'name', name: 'name'},
                        {data: 'prenom', name: 'prenom'},
                        {data: 'fonction', name: 'fonction'},
                        {data: 'email', name: 'email'},
                        {data: 'action', name: 'action', orderable: false},
                    ],
                    order: [[0, 'desc']]
                });

                $('body').on('click', '#open_detail', function (event) {
                    event.preventDefault();
                    var id = $(this).data('id');
                    var id = id;
                    // ajax
                    $.ajax({
                        type: "POST",
                        url: "{{ url('/agents/details') }}",
                        data: {id: id,_token: '{{csrf_token()}}' },
                        success: function (data) {
                            $('#afficher_details').html(data);
                            $('#detail_modal').modal('show');

                        }
                    });

                });

            });
        });
    </script>
@endsection