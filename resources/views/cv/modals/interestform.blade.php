<div class="modal fade" id="interestFormModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel"><span class="title-action">Add</span> interests</h4>
            </div>
            <div class="modal-body">
                <form id="interestForm" class="ajax-form" role="form" method="POST" action="{{ url('/api/cv/interest') }}" data-type="interest">
                    <div class="form-group{{ $errors->has('activity') ? ' has-error' : '' }}">
                        <label for="activity" class="control-label">Activity</label>
                        <input id="activity" type="text" class="form-control" name="activity" value="{{ old('activity') }}">
                        <span class="help-block">
                            <strong></strong>
                        </span>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" data-target="#interestForm">
                    <i class="fa fa-btn fa-save"></i> Save
                </button>
            </div>
        </div>
    </div>
</div>