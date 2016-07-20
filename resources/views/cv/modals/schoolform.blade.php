<div class="modal fade" id="schoolFormModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel"><span class="title-action">Add</span> education</h4>
            </div>
            <div class="modal-body">
                <form id="schoolForm" class="ajax-form" role="form" method="POST" action="{{ url('/api/cv/school') }}" data-type="school">
                    <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                        <label for="title" class="control-label">Degree / Course</label>
                        <input id="title" type="text" class="form-control" name="title" value="{{ old('title') }}">
                        <span class="help-block">
                            <strong></strong>
                        </span>
                    </div>

                    <div class="form-group{{ $errors->has('institution') ? ' has-error' : '' }}">
                        <label for="institution" class="control-label">Institution</label>
                        <input id="institution" type="text" class="form-control" name="institution" value="{{ old('institution') }}">
                        <span class="help-block">
                            <strong></strong>
                        </span>
                    </div>

                    <div class="row date-range-inputs">
                        <div class="col-xs-6 col-md-4 form-group">
                            <label for="school-start" class="control-label">Start date</label>
                            <div class="input-group date date-input-start">
                                <input id="school-start" type="text" class="form-control" name="start" value="" placeholder="YYYY-MM-DD">
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
                            <label for="school-end" class="control-label">End date</label>
                            <div class="input-group date date-input-end">
                                <input id="school-end" type="text" class="form-control" name="end" value="" placeholder="YYYY-MM-DD">
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
                <button type="button" class="btn btn-primary" data-target="#schoolForm">
                    <i class="fa fa-btn fa-save"></i> Save
                </button>
            </div>
        </div>
    </div>
</div>