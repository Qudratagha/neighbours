<a class="btn btn-xs btn-primary" href="{{ route($crud . '.show', $row->$primaryKey) }}"> View </a>
<a class="btn btn-xs btn-info" href="{{ route($crud . '.edit', $row->$primaryKey) }}"> Edit </a>
<form action="{{ route($crud . '.destroy', $row->$primaryKey) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this?');" style="display: inline-block;">
    <input type="hidden" name="_method" value="DELETE">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="submit" class="btn btn-xs btn-danger" value="Delete">
</form>
