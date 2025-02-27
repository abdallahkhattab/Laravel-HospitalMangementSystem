@foreach($sections as $section)
    <div class="modal fade" id="delete{{ $section->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel{{ $section->id }}" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content border-0 shadow-sm">
                <div class="modal-header bg-danger text-white">
                    <h5 class="modal-title" id="deleteModalLabel{{ $section->id }}">
                        <i class="las la-trash-alt mr-2"></i>Delete Section
                    </h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form action="{{ route('section.destroy', $section->id) }}" method="POST" id="deleteForm{{ $section->id }}">
                    @csrf
                    @method('DELETE')
                    <div class="modal-body py-4">
                        <div class="text-center mb-3">
                            <i class="las la-exclamation-triangle text-warning" style="font-size: 2.5rem;"></i>
                        </div>
                        <p class="text-center mb-4">
                            Are you sure you want to delete the section "<strong>{{ $section->name }}</strong>"? 
                            This action cannot be undone.
                        </p>
                        <div class="form-group mb-0">
                            <label class="font-weight-bold" for="section_name_{{ $section->id }}">Section Name</label>
                            <input type="text" 
                                   name="name" 
                                   id="section_name_{{ $section->id }}" 
                                   class="form-control form-control-lg bg-light" 
                                   value="{{ $section->name }}" 
                                   readonly>
                        </div>
                    </div>
                    <div class="modal-footer bg-light">
                        <button type="button" class="btn btn-secondary px-4" data-dismiss="modal">
                            <i class="las la-times mr-1"></i>Cancel
                        </button>
                        <button type="button" class="btn btn-danger px-4" data-toggle="modal" data-target="#confirmDelete{{ $section->id }}" data-dismiss="modal">
                            <i class="las la-trash mr-1"></i>Delete
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Custom Confirmation Modal -->
    <div class="modal fade" id="confirmDelete{{ $section->id }}" tabindex="-1" role="dialog" aria-labelledby="confirmDeleteLabel{{ $section->id }}" aria-hidden="true">
        <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
            <div class="modal-content border-0 shadow-lg">
                <div class="modal-header bg-gradient-danger text-white py-3">
                    <h6 class="modal-title font-weight-bold" id="confirmDeleteLabel{{ $section->id }}">
                        <i class="las la-exclamation-circle mr-2"></i>Confirm Deletion
                    </h6>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body text-center py-4">
                    <div class="mb-3">
                        <i class="las la-trash text-danger" style="font-size: 3rem;"></i>
                    </div>
                    <p class="mb-2">
                        Delete "<strong>{{ $section->name }}</strong>" permanently?
                    </p>
                    <small class="text-muted">This action cannot be undone.</small>
                </div>
                <div class="modal-footer justify-content-center bg-light py-3">
                    <button type="button" class="btn btn-outline-secondary btn-sm px-4" data-dismiss="modal">
                        <i class="las la-undo mr-1"></i>No, Keep It
                    </button>
                    <button type="button" class="btn btn-danger btn-sm px-4" onclick="document.getElementById('deleteForm{{ $section->id }}').submit();">
                        <i class="las la-check mr-1"></i>Yes, Delete
                    </button>
                </div>
            </div>
        </div>
    </div>
@endforeach

@section('css')
    @parent
    <style>
        .bg-gradient-danger {
            background: linear-gradient(45deg, #dc3545, #ff7588);
        }
        .modal-content {
            border-radius: 10px;
            overflow: hidden;
        }
        .modal-footer {
            border-top: none;
        }
        .btn-sm {
            font-size: 0.875rem;
            transition: all 0.2s ease;
        }
        .btn-sm:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .modal-body small {
            display: block;
            margin-top: 5px;
        }
    </style>
@endsection