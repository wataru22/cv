<div id="interest-entry-{{ $interest->id }}" class="entry-body panel-body">
    <p class="data-activity">{{ $interest->activity }}</p>
    <form>
        <input class="entry-data" type="hidden" value="{{ $interest }}">
    </form>
    <div class="form-group">
        <div class="pull-right">
            <button type="submit" class="btn btn-primary" data-toggle="modal" data-action="edit" data-target="#interestFormModal" data-url="{{ url('/api/cv/interest/'.$interest->id) }}" data-entry="{{ $interest }}">
                <i class="fa fa-btn fa-pencil"></i> Edit entry
            </button>
            <button type="submit" class="btn btn-danger" onclick="$('#del-interest-{{ $interest->id }}').submit()">
                <i class="fa fa-btn fa-trash"></i> Delete entry
            </button>
            <form id="del-interest-{{ $interest->id }}" action="{{ url('/api/cv/interest/'.$interest->id) }}" method="POST"
            onsubmit="return deleteEntry(this)" data-target="#interest-entry-{{ $interest->id }}">
                {{ csrf_field() }}
                <input type="hidden" name="_method" value="DELETE">
            </form>
        </div>
    </div>
</div>