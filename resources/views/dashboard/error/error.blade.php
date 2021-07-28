
@if($errors->any())
    <div class="card shadow mb-3" >
        <div class="card-body"style="padding-bottom: 4px">
            <ul class="list-unstyled mb-0">
                @foreach($errors->all() as $error)
                    <li class="text-danger">
                        <i class="material-icons">play_arrow</i>
                        {{$error}}
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
@endif
