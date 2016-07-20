<div id="work-entry-{{ $work->id }}" class="entry-body panel-body">
    <h3 class="data-title">{{ $work->title }}</h3>
    <dl>
        <dt>Employer:</dt>
        <dd><p class="data-employer">{{ $work->employer }}</p></dd>
        <dt>Location:</dt>
        <dd><p class="data-location">{{ $work->location }}</p></dd>
        <dt>Start date:</dt>
        <dd><p class="data-start">{{ date('Y-m-d', strtotime($work->start)) }}</p></dd>
        <dt>End date:</dt>
        <dd><p class="data-end">{{ $work->end ? date('Y-m-d', strtotime($work->end)) : 'Current' }}</p></dd>
        <dt>Description:</dt>
        <dd><p class="data-description">{!! nl2br($work->description) !!}</p></dd>
        <dt>Website:</dt>
        <dd><p class="data-website">{{ $work->website }}</p></dd>
    </dl>

    <div class="form-group">
        <div class="pull-right">
            <button type="submit" class="btn btn-primary" data-toggle="modal" data-action="edit" data-target="#workFormModal" data-url="{{ url('/api/cv/work/'.$work->id) }}" data-entry="{{ $work }}">
                <i class="fa fa-btn fa-pencil"></i> Edit entry
            </button>
            <button type="submit" class="btn btn-danger" onclick="$('#del-work-{{ $work->id }}').submit()">
                <i class="fa fa-btn fa-trash"></i> Delete entry
            </button>
            <form id="del-work-{{ $work->id }}" action="{{ url('/api/cv/work/'.$work->id) }}" method="POST"
            onsubmit="return deleteEntry(this)" data-target="#work-entry-{{ $work->id }}">
                {{ csrf_field() }}
                <input type="hidden" name="_method" value="DELETE">
            </form>
        </div>
    </div>
</div>