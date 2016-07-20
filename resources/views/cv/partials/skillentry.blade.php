<div id="skill-entry-{{ $skill->id }}" class="entry-body panel-body">
    <p class="data-skill">{{ $skill->skill }}</p>
    <form>
        <input class="entry-data" type="hidden" value="{{ $skill }}">
    </form>
    <div class="form-group">
        <div class="pull-right">
            <button type="submit" class="btn btn-primary" data-toggle="modal" data-action="edit" data-target="#skillFormModal" data-url="{{ url('/api/cv/skill/'.$skill->id) }}" data-entry="{{ $skill }}">
                <i class="fa fa-btn fa-pencil"></i> Edit entry
            </button>
            <button type="submit" class="btn btn-danger" onclick="$('#del-skill-{{ $skill->id }}').submit()">
                <i class="fa fa-btn fa-trash"></i> Delete entry
            </button>
            <form id="del-skill-{{ $skill->id }}" action="{{ url('/api/cv/skill/'.$skill->id) }}" method="POST"
            onsubmit="return deleteEntry(this)" data-target="#skill-entry-{{ $skill->id }}">
                {{ csrf_field() }}
                <input type="hidden" name="_method" value="DELETE">
            </form>
        </div>
    </div>
</div>