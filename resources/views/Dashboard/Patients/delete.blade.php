<!-- Deleted insurance -->
<div class="modal fade" id="Deleted{{ $patient->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">حذف بيانات مريض</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('patients.destroy', $patient) }}" method="post">
                    @method('DELETE')
                    @csrf
                    <div class="row">
                        <div class="col">
                            <p class="h5 text-danger"> هل انت متاكد من حذف بيانات المريض ؟ </p>
                            <input type="text" class="form-control" readonly value="{{ $patient->name }}">
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary"
                            data-dismiss="modal">{{ trans('patient.close') }}</button>
                        <button class="btn btn-success">{{ trans('patient.save') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>