<div class="modal fade" id="skillFormModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel"><span class="title-action">Add</span> skill</h4>
            </div>
            <div class="modal-body">
                <form id="skillForm" class="ajax-form" role="form" method="POST" action="{{ url('/api/cv/skill') }}" data-type="skill">
                    <div class="form-group{{ $errors->has('skill') ? ' has-error' : '' }}">
                        <label for="skill" class="control-label">Skill</label>
                        <input id="skill" type="text" class="form-control" name="skill" value="{{ old('skill') }}">
                        <span class="help-block">
                            <strong></strong>
                        </span>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" data-target="#skillForm">
                    <i class="fa fa-btn fa-save"></i> Save
                </button>
            </div>
        </div>
    </div>
</div>