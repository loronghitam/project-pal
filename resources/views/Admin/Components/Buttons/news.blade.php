@role('SuperAdmin')
<button type="button" onclick="edit({{ $id }})" class="btn btn-info">Detail</button>
@else
    <button type="button" onclick="edit({{ $id }})" class="btn btn-info">Edit</button>
    <button type="button" onclick="deleteData({{ $id }})" class="btn btn-danger">Delete</button>
    @endrole
