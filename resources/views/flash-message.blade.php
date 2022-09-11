@if ($message = Session::get('success'))
        <div class="col-md-4 offset-md-8 padding-alert alert alert-primary dark alert-dismissible fade show" role="alert"><strong>{{ $message }}</strong>
            <button class="btn-close" style="top: -7px" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
@endif

@if ($message = Session::get('error'))
        <div class="col-md-4 offset-md-8 padding-alert alert alert-danger dark alert-dismissible fade show" role="alert"><strong>{{ $message }}</strong>
            <button class="btn-close" style="top: -7px" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
@endif
