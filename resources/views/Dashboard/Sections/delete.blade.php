@foreach($sections as $section)
    <div class="modal fade" id="delete{{ $section->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel{{ $section->id }}" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content border-0 shadow-sm">
                <div class="modal-header bg-danger text-white">
                    <h5 class="modal-title" id="deleteModalLabel{{ $section->id }}">
                        <i class="las la-trash-alt mr-2"></i>{{ __('Dashboard/sections_trans.delete_section') }}
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
                            {{ __('Dashboard/sections_trans.confirm_delete', ['name' => $section->name]) }}
                        </p>
                        <div class="form-group mb-0">
                            <label class="font-weight-bold" for="section_name_{{ $section->id }}">{{ __('Dashboard/sections_trans.section_name') }}</label>
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
                            <i class="las la-times mr-1"></i>{{ __('Dashboard/sections_trans.cancel') }}
                        </button>
                        <button type="button" class="btn btn-danger px-4" data-toggle="modal" data-target="#confirmDelete{{ $section->id }}" data-dismiss="modal">
                            <i class="las la-trash mr-1"></i>{{ __('Dashboard/sections_trans.delete') }}
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
                        <i class="las la-exclamation-circle mr-2"></i>{{ __('Dashboard/sections_trans.confirm_deletion') }}
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
                        {{ __('Dashboard/sections_trans.delete_permanently', ['name' => $section->name]) }}
                    </p>
                    <small class="text-muted">{{ __('Dashboard/sections_trans.action_irreversible') }}</small>
                </div>
                <div class="modal-footer justify-content-center bg-light py-3">
                    <button type="button" class="btn btn-outline-secondary btn-sm px-4" data-dismiss="modal">
                        <i class="las la-undo mr-1"></i>{{ __('Dashboard/sections_trans.no_keep') }}
                    </button>
                    <button type="button" class="btn btn-danger btn-sm px-4" onclick="document.getElementById('deleteForm{{ $section->id }}').submit();">
                        <i class="las la-check mr-1"></i>{{ __('Dashboard/sections_trans.yes_delete') }}
                    </button>
                </div>
            </div>
        </div>
    </div>
@endforeach