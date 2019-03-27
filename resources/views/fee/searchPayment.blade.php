@extends('layouts.master')
@section('content')
@include('fee.stylesheet.css-payment')




<div class="panel panel-default">
<div class="panel-heading">
<div class="col-md-3">
<form action="{{route('showStudentPayment')}}" class="search-payment" method="GET">
<input class="form-control" name="student_id" placeholder="Student ID" type="text"></input>
	
</form>
	
</div>
<div class="col-md-3">
<label class="eng-name">Name:  <b class="student-name"></b></label>
	
</div>
<div class="col-md-3">
</div>

<div class="col-md-3" style="text-align: right;">
<label class="data-invoice">Date:  <b>{{date('d-M-Y')}}</b></label>
	
</div>
<div class="col-md-3" style="text-align: right;">
<label class="invoice-number">Receip n<sub>0</sub>: <b></b></label>
	
</div>
	
</div>

<div class="panel-body">
<table style="margin-top: -12px">
<caption class="academicDetail">
	
</caption>
<thead>
	<tr>
		<th>Program</th>
		<th>Level</th>
		<th>School Fee(Ksh)</th>
		<th>Dis(Ksh)</th>
		<th>Paid(Ksh)</th>
		<th>Balance(Ksh)</th>
	</tr>
</thead>
<tr>
	<td>
		<select id="AcademicID" name="AcademicID">
		<option value="">--------------------</option>
			
		</select>
	</td>

	<td>
		<select>
			<option value="">--------------------</option>
		</select>
	</td>

	<td>
		<input type="text" name="fee" id="fee" readonly="true"></input>
		<input type="hidden" name="fee_id" id="FeeID"></input>
		<input type="hidden" name="student_id" id="StudentID"></input>
		<input type="hidden" name="level_id" id="LevelID"></input>
		<input type="hidden" name="user_id" id="UserID"></input>
		<input type="hidden" name="transacdate" id="TransacDate"></input>
	</td>
	<td>
		<input type="text" name="amount" id="Amount" required></input>
	</td>

	<td>
		<input type="text" name="discount" id="Discount"></input>
	</td>

	<td>
		<input type="text" name="paid" id="Paid"></input>
	</td>

	<td>
		<input type="text" name="balance" id="Balance"></input>
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
			<input type="text" name="description" id="description"></input>
		</td>
		<td colspan="5">
		<input type="text" name="remark" id="remark">
			
		</input>
			
		</td>
	</tr>
</tbody>
	
</table>

	
</div>	

<div class="panel-footer" style="height: 40px;">
	
</div>
</div>
@endsection