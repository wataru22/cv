<div class="modal fade" id="workFormModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel"><span class="title-action">Add</span> work experience</h4>
            </div>
            <div class="modal-body">
                <form id="workForm" class="ajax-form" role="form" method="POST" action="{{ url('/api/cv/work') }}" data-type="work" >
                    <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                        <label for="title" class="control-label">Job title</label>
                        <input id="title" type="text" class="form-control" name="title" value="{{ old('title') }}">
                        <span class="help-block">
                            <strong></strong>
                        </span>
                    </div>

                    <div class="form-group{{ $errors->has('employer') ? ' has-error' : '' }}">
                        <label for="employer" class="control-label">Employer</label>
                        <input id="employer" type="text" class="form-control" name="employer" value="{{ old('employer') }}">
                        <span class="help-block">
                            <strong></strong>
                        </span>
                    </div>

                    <div class="row date-range-inputs">
                        <div class="col-xs-6 col-md-4 form-group">
                            <label for="work-start" class="control-label">Start date</label>
                            <div class="input-group date date-input-start">
                                <input id="work-start" type="text" class="form-control" name="start" value="" placeholder="YYYY-MM-DD">
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar">
                                    </span>
                                </span>
                            </div>
                            <span class="help-block">
                                <strong></strong>
                            </span>
                        </div>

                        <div class="col-xs-6 col-md-4 form-group">
                            <label for="work-end" class="control-label">End date</label>
                            <div class="input-group date date-input-end">
                                <input id="work-end" type="text" class="form-control" name="end" value="" placeholder="YYYY-MM-DD">
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar">
                                    </span>
                                </span>
                            </div>
                            <span class="help-block">
                                <strong></strong>
                            </span>

                            <!-- <div class="checkbox">
                                <label>
                                    <input class="current-checkbox" type="checkbox"> Current
                                </label>
                            </div> -->
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('location') ? ' has-error' : '' }}">
                        <label for="location" class="control-label">Location</label>
                        <input id="location" type="text" class="form-control" name="location" value="{{ old('location') }}">
                        <span class="help-block">
                            <strong></strong>
                        </span>
                    </div>

                    <div class="form-group{{ $errors->has('website') ? ' has-error' : '' }}">
                        <label for="website" class="control-label">Website</label>
                        <input id="website" type="text" class="form-control" name="website" value="{{ old('website') }}">
                        <span class="help-block">
                            <strong></strong>
                        </span>
                    </div>

                    <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                        <label for="description" class="control-label">Description</label>
                        <textarea id="description" class="form-control" name="description">{{ old('description') }}</textarea>
                        <span class="help-block">
                            <strong></strong>
                        </span>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" data-target="#workForm">
                    <i class="fa fa-btn fa-save"></i> Save
                </button>
            </div>
        </div>
    </div>
</div>