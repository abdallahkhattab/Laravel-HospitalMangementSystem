<!-- Modal -->
<div class="modal fade" id="edit{{ $service->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{ trans('Dashboard/Services.edit_Service') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('services.update', $service) }}" method="post">
               @method('PATCH')
                @csrf
                <div class="modal-body">
                    <label for="name">{{ trans('Dashboard/Services.name') }}</label>
                    <input type="text" name="name" id="name" value="{{ $service->name }}" class="form-control"><br>

                    <label for="price">{{ trans('Dashboard/Services.price') }}</label>
                    <input type="number" name="price" id="price" value="{{ $service->price }}" class="form-control"><br>

                    <label for="description">{{ trans('Dashboard/Services.description') }}</label>
                    <textarea class="form-control" name="description" id="description" rows="5">{{ $service->description }}</textarea>

                    <div class="form-group">
                        <label for="status">{{ trans('Dashboard/Services.Status') }}</label>
                        <select class="form-control" id="status" name="status" required>
                            <option value="{{ $service->status }}" selected>
                                {{ $service->status == 1 ? trans('Dashboard/Services.Enabled') : trans('Dashboard/Services.Not_enabled') }}
                            </option>
                            <option value="1">{{ trans('Dashboard/Services.Enabled') }}</option>
                            <option value="0">{{ trans('Dashboard/Services.Not_enabled') }}</option>
                        </select>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ trans('Dashboard.Close') }}</button>
                    <button type="submit" class="btn btn-primary">{{ trans('Dashboard.submit') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>
