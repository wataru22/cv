<div id="school-entry-{{ $school->id }}" class="entry-body panel-body">
    <h3 class="data-title">{{ $school->title }}</h3>
    <dl>
        <dt>Institution:</dt>
        <dd><p class="data-institution">{{ $school->institution }}</p></dd>
        <dt>Location:</dt>
        <dd><p class="data-location">{{ $school->location }}</p></dd>
        <dt>Start date:</dt>
        <dd><p class="data-start">{{ date('Y-m-d', strtotime($school->start)) }}</p></dd>
        <dt>End date:</dt>
        <dd><p class="data-end">{{ $school->end ? date('Y-m-d', strtotime($school->end)) : 'Current' }}</p></dd>
        <dt>Description:</dt>
        <dd><p class="data-description">{!! nl2br($school->description) !!}</p></dd>
        <dt>Website:</dt>
        <dd><p class="data-website">{{ $school->website }}</p></dd>
    </dl>
    <div class="form-group">
        <div class="pull-right">
            <button type="submit" class="btn btn-primary" data-toggle="modal" data-action="edit" data-target="#schoolFormModal" data-url="{{ url('/api/cv/school/'.$school->id) }}" data-entry="{{ $school }}">
                <i class="fa fa-btn fa-pencil"></i> Edit entry
            </button>
            <button type="submit" class="btn btn-danger" onclick="$('#del-school-{{ $school->id }}').submit()">
                <i class="fa fa-btn fa-trash"></i> Delete entry
            </button>
            <form id="del-school-{{ $school->id }}" action="{{ url('/api/cv/school/'.$school->id) }}" method="POST"
            onsubmit="return deleteEntry(this)" data-target="#school-entry-{{ $school->id }}">
                {{ csrf_field() }}
                <input type="hidden" name="_method" value="DELETE">
            </form>
        </div>
    </div>
</div>