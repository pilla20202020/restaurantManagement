<tr>
    <td>{{++$key}}</td>
    <td>{{ Str::limit(ucfirst($foodmenu->name), 47) }}</td>
    <td>{{$foodmenu->price}}</td>
    {{-- <td>{{$foodmenu->phone}}</td> --}}
{{--    <td class="text-center">{{ Carbon\Carbon::parse($foodmenu->date)->format('Y-m-d') }}</td>--}}
    <td class="text-right">
        <a href="{{route('foodmenu.edit', $foodmenu->id)}}" class="btn btn-flat btn-primary btn-xs" title="edit">
            <i class="fas fa-edit"></i>
        </a>

        <button class="btn btn-flat btn-danger btn-xs" title="delete" onclick="openDeletefoodmenuModal({{ $foodmenu->id }}, '{{ $foodmenu->name }}')">
            <i class="fas fa-trash-alt"></i>
        </button>
    </td>
</tr>


<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Confirm Deletion</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Are you sure you want to delete the foodmenu "<strong id="foodmenuTitle"></strong>"?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light waves-effect" data-bs-dismiss="modal">Cancel</button>
                <form id="deleteForm" action="" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>
