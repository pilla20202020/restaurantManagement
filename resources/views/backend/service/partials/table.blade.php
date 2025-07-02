<tr>
    <td>{{++$key}}</td>
    <td>{{ Str::limit(ucfirst($service->title), 47) }}</td>
    <td>
        {{ $service->icon }}
    </td>
    @if (isset($service->image))
        <td><img src="{{ asset(str_replace('\\', '/', $service->image)) }}" class="img-circle width-1" alt="{{$service->title}}" width="70" height="70"></td>
    @else
        <td><img src="{{ asset('images/noimage.png') }}" class="img-circle width-1" alt="service_image" width="70" height="70"></td>
    @endif
    <td class="text-right">
        <a href="{{route('service.edit', $service->slug)}}" class="btn btn-flat btn-primary btn-xs" title="edit">
            <i class="fas fa-edit"></i>
        </a>

        <button class="btn btn-flat btn-danger btn-xs" title="delete" onclick="openDeleteModal({{ $service->id }}, '{{ $service->title }}')">
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
                Are you sure you want to delete the service titled "<strong id="serviceTitle"></strong>"?
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
