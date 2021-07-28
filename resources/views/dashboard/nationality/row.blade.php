<tr id="{{$row->id}}">
    <td>{{$row->name_en}}</td>
    <td>{{$row->name_ar}}</td>
    <td>
        <a class="edit" style="text-decoration:none" href=""
           data-route="{{route('admin.nationality.edit',$row->id)}}"
           data-toggle="modal" data-target="#exampleModal2">
            <i class="material-icons">edit_note</i>
        </a>
            <button style="border: none"  class="delete"   data-route="{{route('admin.nationality.destroy',$row->id)}}">
                <i style="color: #ee2200" class="material-icons">delete</i>
            </button>
    </td>
</tr>
