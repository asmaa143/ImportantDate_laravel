@if(\Session::has('suspended'))
    <div class="card shadow bg-success text-white mb-3">
        <div class="card-body" >
            <div class="alert alert-danger">
                {{\Session::get('suspended')}}
            </div>
        </div>
    </div>
@endif
