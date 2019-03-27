<meta name="csrf-token" content="{{ csrf_token() }}">
<div class="modal fade" id="level-show" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
<h4 class="modal-title">Level</h4>
	
</div>
<form action="{{route('postInsertLevel')}}" method="POST" id="frm-level-create">
<div class="modal-body">
<div class="row">
<div class="col-sm-12">
<select type="text" name="program_id" id="program_id" class="form-control"></select>
	
</div>
	
</div>
<br>
<div class="row">
<div class="col-sm-12">
<input type="text" name="level" id="new_level" class="form-control" placeholder="level"></input>
	
</div>
	
</div>
<br>
<div class="row">
<div class="col-sm-12">
<input type="text" name="description" id="new_description" class="form-control" placeholder="level  description"></input>
	
</div>
	
</div>
	
</div>
<div class="modal-footer">
<button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
	<button class="btn btn-success btn-save-level" type="submit">Save</button>
</div>
	</form>
</div>
	
</div>
	
</div>