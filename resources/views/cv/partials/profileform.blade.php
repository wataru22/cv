<form class="ajax-form" id="profileForm" role="form" method="POST" action="{{ url('/api/cv/profile') }}{{ $profile ? '/'.$profile->id : '' }}">

    @if ($profile)
    <input type="hidden" name="_method" value="PUT">
    @endif

    <div class="row">
        <div class="col-md-4 col-lg-4 form-group">
            <label for="firstname" class="control-label">First name</label>
            <input id="firstname" type="text" class="form-control" name="firstname" value="{{ $profile ? $profile->firstname : '' }}">
            <span class="help-block">
                <strong></strong>
            </span>
        </div>

        <div class="col-md-4 col-lg-4 form-group">
            <label for="middlename" class="control-label">Middle name(s)</label>
            <input id="middlename" type="text" class="form-control" name="middlename" value="{{ $profile ? $profile->middlename : '' }}">
            <span class="help-block">
                <strong></strong>
            </span>
        </div>

        <div class="col-md-4 col-lg-4 form-group">
            <label for="lastname" class="control-label">Family name</label>
            <input id="lastname" type="text" class="form-control" name="lastname" value="{{ $profile ? $profile->lastname : '' }}">
            <span class="help-block">
                <strong></strong>
            </span>
        </div>
    </div>

    <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
        <label for="title" class="control-label">Profile title</label>
        <input id="title" type="text" class="form-control" name="title" value="{{ $profile ? $profile->title : '' }}">
        <span class="help-block">
            <strong></strong>
        </span>
    </div>

    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
        <label for="email" class="control-label">E-Mail Address</label>
        <input id="email" type="email" class="form-control" name="email" value="{{ $profile ? $profile->email : '' }}">
        <span class="help-block">
            <strong></strong>
        </span>
    </div>

    <div class="row">
        <div class="col-md-4 col-lg-4 form-group{{ $errors->has('telephone') ? ' has-error' : '' }}">
            <label for="telephone" class="control-label">Telephone</label>
            <input id="telephone" type="text" class="form-control" name="telephone" value="{{ $profile ? $profile->telephone : '' }}">
            <span class="help-block">
                <strong></strong>
            </span>
        </div>

        <div class="col-md-4 col-lg-4 form-group{{ $errors->has('mobile') ? ' has-error' : '' }}">
            <label for="mobile" class="control-label">Mobile or secondary telephone</label>
            <input id="mobile" type="text" class="form-control" name="mobile" value="{{ $profile ? $profile->mobile : '' }}">
            <span class="help-block">
                <strong></strong>
            </span>
        </div>
    </div>

    <div class="form-group{{ $errors->has('websites') ? ' has-error' : '' }}">
        <label for="websites" class="control-label">Website(s)</label>
        <input id="websites" type="text" class="form-control" name="websites" value="{{ $profile ? $profile->websites : '' }}">
        <span class="help-block">
            <strong></strong>
        </span>
    </div>

    <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
        <label for="address" class="control-label">Address</label>
        <textarea id="address" class="form-control" name="address">{{ $profile ? $profile->address : '' }}</textarea>
        <span class="help-block">
            <strong></strong>
        </span>
    </div>

    <div class="form-group{{ $errors->has('summary') ? ' has-error' : '' }}">
        <label for="summary" class="control-label">Profile summary</label>
        <textarea id="summary" class="form-control" name="summary">{{ $profile ? $profile->summary : '' }}</textarea>
        <span class="help-block">
            <strong></strong>
        </span>
    </div>

    <div class="form-group">
        <div class="pull-right">
            <button type="submit" class="btn btn-primary">
                <i class="fa fa-btn fa-save"></i> Save
            </button>
        </div>
        <div class="ajax-message pull-right">
            <span></span>
        </div>
        <!-- <div class="pull-right ajax-progress">
            <div class="spinner">
              <div class="bounce1"></div>
              <div class="bounce2"></div>
              <div class="bounce3"></div>
            </div>
            <span>Saving...</span>
        </div> -->
    </div>
</form>