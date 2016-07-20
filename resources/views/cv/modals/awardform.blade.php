<div class="modal fade" id="awardFormModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel"><span class="title-action">Add</span> award/achievement</h4>
            </div>
            <div class="modal-body">
                <form id="awardForm" class="ajax-form" role="form" method="POST" action="{{ url('/api/cv/award') }}" data-type="award">
                    <div class="form-group{{ $errors->has('award') ? ' has-error' : '' }}">
                        <label for="award" class="control-label">Award or achievement</label>
                        <input id="award" type="text" class="form-control" name="award" value="{{ old('award') }}">
                        <span class="help-block">
                            <strong></strong>
                        </span>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" data-target="#awardForm">
                    <i class="fa fa-btn fa-save"></i> Save
                </button>
            </div>
        </div>
    </div>
</div>