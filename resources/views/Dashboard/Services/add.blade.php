<!-- Modal -->
<div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{trans('Dashboard/Services.add_Service')}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('services.store') }}" method="post" autocomplete="off">
                @csrf
                <div class="modal-body">
                    <label for="name">{{trans('Dashboard/Services.name')}}</label>
                    <input type="text" name="name" id="name" class="form-control"><br>

                   

                    <label for="price">{{trans('Dashboard/Services.price')}}</label>
                    <input type="number" name="price" id="price" class="form-control"><br>

                    <label for="description">{{trans('Dashboard/Services.description')}}</label>
                    <textarea class="form-control" name="description" id="description" rows="5"></textarea>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{trans('Dashboard/Services.close')}}</button>
                    <button type="submit" class="btn btn-primary">{{trans('Dashboard/Services.submit')}}</button>
                </div>
            </form>
        </div>
    </div>
</div>