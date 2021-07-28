@if(\Session::has('success'))
    <div class="card shadow bg-success text-white mb-3">
        <div class="card-body" >
            <div class="alert bg-green alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                {{\Session::get('success')}}
            </div>
        </div>
    </div>
@endif
