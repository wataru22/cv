<div id="award-entry-{{ $award->id }}" class="entry-body panel-body">
    <p class="data-award">{{ $award->award }}</p>
    <div class="form-group">
        <div class="pull-right">
            <button type="submit" class="btn btn-primary" data-toggle="modal" data-action="edit" data-target="#awardFormModal" data-url="{{ url('/api/cv/award/'.$award->id) }}" data-entry="{{ $award }}">
                <i class="fa fa-btn fa-pencil"></i> Edit entry
            </button>
            <button type="submit" class="btn btn-danger" onclick="$('#del-award-{{ $award->id }}').submit()">
                <i class="fa fa-btn fa-trash"></i> Delete entry
            </button>
            <form id="del-award-{{ $award->id }}" action="{{ url('/api/cv/award/'.$award->id) }}" method="POST"
            onsubmit="return deleteEntry(this)" data-target="#award-entry-{{ $award->id }}">
                {{ csrf_field() }}
                <input type="hidden" name="_method" value="DELETE">
            </form>
        </div>
    </div>
</div>