<style type="text/css">
	.table-fee{
		border:none;
	}

	.table-fee tr.td.th{
		border:none;
	}
</style>

<div class="modal fade" id="createFeePopup" role="dialog">
<div class="modal-dialog modal-md">
<div class="row">
<div class="panel panel-default">
<div class="panel-heading">
<b><i class="glyphicon glyphicon-apple"></i>Create School Fee</b>
	
</div>

{{------------------------}}

<form action="{{route('createFee')}}" method="POST" id="frm-fee">
{{csrf_field()}}
<div class="panel-body">
<div class="table-responsive">

{{-----start Table-------------}}
<table class="table-fee">
<tr>
	<td><label>Fee Type</label></td>

<td>
	<select class="form-control" id="fee_type_id" name="fee_type_id" >
	@foreach($feetypes as $key => $ft)

	<option value="{{$ft->fee_type_id}}">{{$ft -> fee_type}}</option>

	@endforeach
	</select>
</td>

</tr>

<tr>
	<td><label>Fee Heading</label></td>
	<td>
		<input type="text" name="fee_heading" id="fee_heading" value="Fees" ></input>
	</td>
</tr>

<tr>
	<td>Academic Year</td>
	<td>
		<input type="text" value="{{$status->academic_id}}" name="academic_id" id="academic_id"></input>
	
	</td>
</tr>

<tr>
	<td>Program</td>
	<td>
		<input type="text"  value="{{$status->program}}" disabled></input>
	</td>
</tr>

<tr>
	<td>Level</td>
	<td>
		<input type="text" name="level_id" class="form-control" id="level_id" value="{{$status->level_id}}"></input>
	</td>
</tr>
<tr>
	<td>School Fee(Ksh)</td>
	<td>
		<input type="text" name="amount" class="form-control" id="amount" placeholder="Amount" autocomplete="off" required></input>
	</td>
</tr>
	
</table>

{{---end Table----}}

	
</div>
	
</div>
<div class="panel-footer">
<input type="submit" class="btn btn-default" value="Create Fee"></input>
<button type="button" class="btn btn-default pull-right" data-dismiss="modal">Close</button>
	
</div>
	
</form>

{{----End Form----------------}}
	 
</div>
	
</div>
	 
</div>
	
</div>