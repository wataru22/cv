@extends('layouts.app')

@section('meta')
<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('content')
<style>
    #flash {
        position: fixed;
        bottom: 10px;
        right: 10px;
        padding: 1em;
        display: inline-block;
        z-index: 9000;
        -webkit-box-shadow: 0px 2px 8px 0px rgba(0,0,0,0.3);
        -moz-box-shadow: 0px 2px 8px 0px rgba(0,0,0,0.3);
        box-shadow: 0px 2px 8px 0px rgba(0,0,0,0.3);
        display: none;
    }
</style>
<div id="flash" class=""></div>
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    You are logged in!
                    <br>
                    <a href="{{ url('/cv') }}" target="_blank" class="btn btn-success pull-right"><i class="fa fa-btn fa-external-link"></i> View CV</a>
                </div>
            </div>

            <!-- Nav tabs -->
            <ul class="nav nav-pills" role="tablist">
                <li role="presentation" class="active"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Profile</a></li>
                <li role="presentation"><a href="#work" aria-controls="work" role="tab" data-toggle="tab">Work experience</a></li>
                <li role="presentation"><a href="#education" aria-controls="education" role="tab" data-toggle="tab">Education</a></li>
                <li role="presentation"><a href="#skills" aria-controls="skills" role="tab" data-toggle="tab">Skills</a></li>
                <li role="presentation"><a href="#awards" aria-controls="awards" role="tab" data-toggle="tab">Awards</a></li>
                <li role="presentation"><a href="#interests" aria-controls="interests" role="tab" data-toggle="tab">Interests</a></li>
            </ul>
            <br>
            <!-- Tab panes -->
            <div class="tab-content">
                <div role="tabpanel" class="panel panel-default tab-pane fade in active" id="profile">
                    <div class="panel-body">
                        @include('cv.partials.profileform')
                    </div>
                </div>

                <div role="tabpanel" class="panel panel-default tab-pane fade" id="work">
                    <div class="panel-body">
                        <div class="form-group">
                            <div class="pull-right">
                                <a href="#" class="btn btn-success" data-toggle="modal" data-action="add" data-target="#workFormModal" data-url="{{ url('/api/cv/work') }}">
                                    <i class="fa fa-btn fa-plus"></i> Add entry
                                </a>
                            </div>
                        </div>
                    </div>
                    <div id="work-entries">
                    @foreach ( $works as $work )
                    @include('cv/partials/workentry', ['work' => $work])
                    @endforeach
                    </div>
                </div>

                <div role="tabpanel" class="panel panel-default tab-pane fade" id="education">
                    <div class="panel-body">
                        <div class="form-group">
                            <div class="pull-right">
                                <a href="#" class="btn btn-success" data-toggle="modal" data-action="add" data-target="#schoolFormModal" data-url="{{ url('/api/cv/school') }}">
                                    <i class="fa fa-btn fa-plus"></i> Add entry
                                </a>
                            </div>
                        </div>
                    </div>
                    <div id="school-entries">
                    @foreach ( $schools as $school )
                    @include('cv/partials/schoolentry', ['school' => $school])
                    @endforeach
                    </div>
                </div>

                <div role="tabpanel" class="panel panel-default tab-pane fade" id="skills">
                    <div class="panel-body">
                        <div class="form-group">
                            <div class="pull-right">
                                <a href="#" class="btn btn-success" data-toggle="modal" data-action="add" data-target="#skillFormModal" data-url="{{ url('/api/cv/skill') }}">
                                    <i class="fa fa-btn fa-plus"></i> Add entry
                                </a>
                            </div>
                        </div>
                    </div>
                    <div id="skill-entries">
                    @foreach ( $skills as $skill )
                    @include('cv/partials/skillentry', ['skill' => $skill])
                    @endforeach
                    </div>
                </div>

                <div role="tabpanel" class="panel panel-default tab-pane fade" id="awards">
                    <div class="panel-body">
                        <div class="form-group">
                            <div class="pull-right">
                                <a href="#" class="btn btn-success" data-toggle="modal" data-action="add" data-target="#awardFormModal" data-url="{{ url('/api/cv/award') }}">
                                    <i class="fa fa-btn fa-plus"></i> Add entry
                                </a>
                            </div>
                        </div>
                    </div>
                    <div id="award-entries">
                    @foreach ( $awards as $award )
                    @include('cv/partials/awardentry', ['award' => $award])
                    @endforeach
                    </div>
                </div>

                <div role="tabpanel" class="panel panel-default tab-pane fade" id="interests">
                    <div class="panel-body">
                        <div class="form-group">
                            <div class="pull-right">
                                <a href="#" class="btn btn-success" data-toggle="modal" data-action="add" data-target="#interestFormModal" data-url="{{ url('/api/cv/interest') }}">
                                    <i class="fa fa-btn fa-plus"></i> Add entry
                                </a>
                            </div>
                        </div>
                    </div>
                    <div id="interest-entries">
                    @foreach ( $interests as $interest )
                    @include('cv/partials/interestentry', ['interest' => $interest])
                    @endforeach
                    </div>
                </div>
            </div>

            {{-- Modals --}}
            @include('cv.modals.workform')
            @include('cv.modals.schoolform')
            @include('cv.modals.skillform')
            @include('cv.modals.awardform')
            @include('cv.modals.interestform')

        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
function deleteEntry(el) {
    if ( confirm('Are you sure you want to delete this entry?') ) {

        var form = $(el);
        var formData = form.serialize();

        // process the form
        $.ajax({
            type        : 'POST',
            url         : form.attr('action'),
            data        : formData,
            dataType    : 'json',
            encode      : true
        })
        // using the done promise callback
        .done(function(data) {

            // log data to the console so we can see
            console.log(data);
            $(form.attr('data-target')).slideUp(500, function(){
              $(this).remove();
            });
        })
        .error(function(data) {

        })
        .always(function() {
            // stop loading animation and unlock fields
            //form.find('input, textarea').attr('disabled', false);
        });
    }
    return false;
}

$(function() {

    // date picker init
    $('.date-range-inputs').each(function(){
        var start = $(this).find('.date-input-start');
        var end = $(this).find('.date-input-end');
        //var current = $(this).find('.current-checkbox');
        start.datetimepicker({
            format: 'YYYY-MM-DD'
        });
        end.datetimepicker({
            useCurrent: false,
            format: 'YYYY-MM-DD'
        });

        start.on("dp.change", function (e) {
            end.data("DateTimePicker").minDate(e.date);
        });
        end.on("dp.change", function (e) {
            start.data("DateTimePicker").maxDate(e.date);
        });

        // current.on('change', function(){
        //     // lock end field if current
        //     if ( $(this).prop('checked') ) {
        //         $(end).find('input').val('').attr('disabled', true);
        //     }
        //     else {
        //         $(end).find('input').attr('disabled', false);
        //     }
        // });
    });

    // on modal show add / edit
    $('.modal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var action = button.data('action') // Extract info from data-* attributes
        var modal = $(this)
        var form = modal.find('.ajax-form');

        // get and set form action URL
        form.attr('action', button.data('url'));

        if (action == 'add') {
            modal.find('.modal-title .title-action').text('Add');
            form.find('input, textarea').val('');
            form.find('checkbox')
            form.find('.form-method').remove();
        }
        else if ( action == 'edit' ) {
            modal.find('.modal-title .title-action').text('Edit');
            form.append($('<input class="form-method" type="hidden" name="_method" value="PUT"/>'));
            var data = JSON.parse(button.attr('data-entry'));
            for (var key in data) {
              if (data.hasOwnProperty(key)) {
                if ( (key == 'start' || key == 'end') && data[key] != null ) {
                    $(form).find('.form-control[name='+key+']').val(data[key].substring(0, 10));
                }
                else {
                    $(form).find('.form-control[name='+key+']').val(data[key]);
                }
              }
            }

        }
        //modal.find('.modal-body input').val();
    });

    // modal submit
    $('.modal-footer .btn-primary').click(function(event) {
        var form = $(this).attr("data-target");
        $(form).submit();
    });

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    // ajax forms
    $('.ajax-form').submit(function(event) {

        var form = $(this);
        // get the form data
        var formData = form.serialize();
        var type = form.attr('data-type');
        // lock fields and start loading
        //form.find('input, textarea').attr('disabled', true);
        $(form).find('.form-control + .help-block > strong').text('');
        $(form).find('.form-control').parent('.form-group').removeClass('has-error');

        // process the form
        $.ajax({
            type        : 'POST',
            url         : form.attr('action'),
            data        : formData,
            dataType    : 'json',
            encode      : true
        })
            // using the done promise callback
            .done(function(data) {
                $('#'+type+'FormModal').modal('hide');
                if ( data.saved ) {
                    $('#'+type+'-entries').prepend(data.entry);
                }
                else if ( data.updated ) {
                    var entry = data.entry;
                    var target = $('#'+type+'-entry-'+entry.id);
                    for (var key in entry) {
                      if (entry.hasOwnProperty(key)) {
                        if ( (key == 'start' || key == 'end') && entry[key] != null ) {
                            target.find('.data-'+key).html(entry[key].substring(0, 10));
                        }
                        else if ( ( key == 'description' ) && entry[key] != null ) {
                            target.find('.data-'+key).html( nl2br(entry[key]) );
                        }
                        else {
                            target.find('.data-'+key).html(entry[key]);
                        }
                      }
                    }
                    target.find('[data-action="edit"]').attr('data-entry', JSON.stringify(entry));
                }
                // flash message
                $('#flash').text('Saved!').addClass('bg-success');

            })
            .error(function(data) {

                // validation errors
                if(data.status == 422) {
                    var errors = jQuery.parseJSON(data.responseText);
                    for (var key in errors) {
                      if (errors.hasOwnProperty(key)) {
                        $(form).find('.form-control[name='+key+'] + .help-block > strong').text(errors[key]);
                        $(form).find('.form-control[name='+key+']').parent('.form-group').addClass('has-error');
                      }
                    }
                }

                // flash message
                $('#flash').text('An error occured. Please check the form and try again.').addClass('bg-danger');

            })
            .always(function() {
                // stop loading animation and unlock fields
                //form.find('input, textarea').attr('disabled', false);
                // flash message
                $('#flash').fadeIn('normal', function() {
                  $(this).delay(2500).fadeOut('normal', function() {
                    $(this).text('').removeClass('bg-danger').removeClass('bg-success');
                  });
                });
            });

        // stop the form from submitting the normal way and refreshing the page
        event.preventDefault();
    });

});

function nl2br (str, is_xhtml) {
    var breakTag = (is_xhtml || typeof is_xhtml === 'undefined') ? '<br />' : '<br>';
    return (str + '').replace(/([^>\r\n]?)(\r\n|\n\r|\r|\n)/g, '$1' + breakTag + '$2');
}
</script>
@endsection