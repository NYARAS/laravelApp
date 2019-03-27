@extends('layouts.master')
@section('content')
@include('fee.stylesheet.css-payment')
@include('fee.createFee')




<div class="panel panel-default">
<div class="panel-heading">
<div class="col-md-3">
<form action="{{route('showStudentPayment')}}" class="search-payment" method="GET">
<input class="form-control" name="student_id" value="{{$student_id}}" placeholder="Student ID" type="text"></input>
	
</form>
	
</div>
<div class="col-md-3">
<label class="eng-name">Name:  <b class="student-name">{{$status->first_name." ".$status->second_name}}</b></label>
	
</div>
<div class="col-md-3">
</div>

<div class="col-md-3" style="text-align: right;">
<label class="data-invoice">Date:  <b>{{date('d-M-Y')}}</b></label>
	
</div>
<div class="col-md-3" style="text-align: right;">
<label class="invoice-number">Receip n<sub>0</sub>: <b>{{sprintf('%05d',$receipt_id)}}</b></label>
	
</div>
	
</div>
<form action="{{ count($readStudentFee) !=0 ? route('extraPay'): route('savePayment')}}" method="POST" id="frm-payment">
{{csrf_field()}}
<div class="panel-body">
<table style="margin-top: -12px">
<caption class="academicDetail">
	{{$status->program}}/
	Level: {{$status->level}}/
	Shift: {{$status->shift}}/
	Time:  {{$status->time}}/
	Batch:  {{$status->batch}}/
	Group:  {{$status->group }}

</caption>
<thead>
	<tr>
		<th>Program</th>
		<th>Level</th>
		<th>School Fee(Ksh)</th>
		<th>Amount(Ksh)</th>

		<th>Dis(Ksh)</th>
		<th>Paid(Ksh)</th>
		<th>Balance(Ksh)</th>
	</tr>
</thead>
<tr>
	<td>
		<select id="program_id" name="program_id" class="d">
		<option value="">--------------------</option>
		@foreach($programs as $key => $p)
		<option value="{{$p->program_id}}" {{ $p ->program_id==$status->program_id? 'selected' : null}}>{{$p->program}}</option>


		@endforeach
			
		</select>
	</td>

	<td>
		<select id="Level_ID" class="d" >
			<option value="">--------------------</option>
			@foreach($levels as $key => $l)
		<option value="{{$l->level_id}}" {{ $l ->level_id==$status->level_id? 'selected' : null}}>{{$l->level}}</option>


		@endforeach
		</select>
	</td>

	<td>
	<div class="input-group">
	<span class="input-group-addon create-fee" title="create fee" style="cursor: pointer;color: blue;padding: 0px 3px; border-right: none;" >($)</span>
		<input type="text" name="fee" value="{{$studentfee->amount or null}}" id="Fee" readonly="true"></input>
</div>
		<input type="hidden" name="fee_id" value="{{$studentfee->fee_id or null}}" id="FeeID"></input>
		<input type="hidden" name="student_id" value="{{$student_id}}" id="StudentID"></input>

		<input type="hidden" name="level_id" value="{{$status->level_id}}" id="LevelID"></input>
		<input type="hidden" name="user_id" value="{{Auth::id()}}" id="UserID"></input>
		<input type="hidden" name="transaction_date" value="{{date('Y-m-d H:i:s')}}" id="TransacDate"></input>
		<input type="hidden" name="s_fee_id" id="s_fee_id"></input>
	</td>
	<td>
		<input type="text" name="amount" id="Amount" required class="d"></input>
	</td>

	<td>
		<input type="text" name="discount" id="Discount" class="d" ></input>
	</td>

	<td>
		<input type="text" name="paid" id="Paid"></input>
	</td>

	<td>
		<input type="text" name="balance" id="Balance" disabled="true"></input>
	</td>
</tr>


<thead>
	<tr>
		<th colspan="2">Remark</th>
		<th colspan="5">Description</th>
	</tr>
</thead>
<tbody>
	<tr>
		<td colspan="2">
			<input type="text" name="remark" id="remark"></input>
		</td>
		<td colspan="5">
		<input type="text" name="description" id="description">
			
		</input>
			
		</td>
	</tr>
</tbody>
	
</table>

	
</div>	

<div class="panel-footer" >
<input type="submit" id="btn-go" name="btn-go" class="btn btn-default btn-payment" value="{{count($readStudentFee)!=0 ? 'Exstra Pay' : 'Save'}}"></input>
@if (count($readStudentFee)!=0)
<a href="{{route('printInvoice', $receipt_id)}}" class="btn btn-default btn-sm" target="_blank" title="print" ><i class="fa fa-print"></i></a>
@endif
<input type="button" onclick="this.form.reset()" class="btn btn-default btn-reset pull-right" value="Reset"></input>

	</form>
</div>

@if (count($readStudentFee)!=0)
@include('fee.list.studentFeeList')
<input type="hidden" value="0" id="disabled"></input>

@endif
</div>

@endsection

@section('script')
@include('fee.script.script-payment')
@include('fee.script.script-fee')

@endsection