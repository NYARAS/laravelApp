<style type="text/css">
	.academic-detail{
		white-space: normal;
		width: 400px;
	}
	td.del{
		text-align: center;
		width: 50px;
		vertical-align: middle;
	}
	#table-class-info{
		width: 100%;
	}
	table tbody > tr >td{
		vertical-align: middle;
	}
</style>
<table class=" table-striped table-bordered table-condensed table-hover" id="table-class-info">

	<thead>
		<tr>
			<th>Unit</th>
			<th>Semester</th>
		     <th>Shift</th>
		     <th>Time</th>
		     <th>Academic Details</th>
		     <th hidden="hidden">Action</th>
		      <th>
		      <input type="checkbox" id="checkall"></input>

		      </th>


		</tr>
	</thead>
	<tbody>
		@foreach($courses as $key => $c)
		<tr>
			<td>{{$c->program}}</td>
			<td>{{$c->level}}</td>
			<td>{{$c->shift}}</td>
			<td>{{$c->time}}</td>
			<td class="academic-detail">
				<a href="#" data-id="{{$c->class_id}}" id="class-edit">
				Program:{{$c->program}} / Level:{{$c->level}} / Shift: {{$c->shift}} / Time: {{$c->time}} / Batch: {{$c->batch}} / Group: {{$c->group}} / Start Date:{{date("d-m-y",strtotime($c->start_date))}} / End Date:{{date("d-m-y",strtotime($c->end_date))}}
				</a>
			</td>
			<td class="del" id="hidden">
				<button class="btn btn-danger btn-sm del-class" value="{{$c->class_id}}">Del</button>

			</td>
			<td>
				<input type="checkbox" name="chk[]" value="{{$c->class_id}}" class="chk"></input>
			</td>
		</tr>
		@endforeach
	</tbody>
</table>