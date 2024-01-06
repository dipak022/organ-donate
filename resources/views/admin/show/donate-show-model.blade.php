@php
    $donate_info = \App\Models\Donate::where('id',$donate->id)->first();
@endphp
    <!-- add model start -->

<!-- add model start -->
<div class="modal fade" id="show_{{ $donate->id }}">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h4 class="modal-title">View Donate </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <div class="row form-group-lg">
                    <legend class="mb-0">Donate Used Organ View From :</legend>
                   
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="" class="col-form-label">Details<span
                                    style="color: red">*</span></label>
                            <textarea type="text" class="form-control" name="use_anything_description"
                                id="use_anything_description" readonly>{{ $donate_info->use_anything_description }}</textarea>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="" class="col-form-label">Used Date<span
                                    style="color: red">*</span></label>
                            <input type="text" name="use_date" value="{{ $donate_info->use_date }}" class="form-control" readonly>
                        </div>
                    </div>
                   
                  
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
    <!-- /.modal-content -->
</div>
<!-- /.modal -->


