@extends('layouts.master')
@section('content')
<div class="row">
<div class="col-lg-12">
<h3 class="page-header"><i class="fa fa-file-text-o"></i> Student Registration</h3>
<ol class="breadcrumb">
<li><i class="fa fa-home" ></i><a href="#"></a>Home</li>
<li><i class="icon_document"></i>Fees</li>
<li><i class="fa fa-file-text-o"></i>Fee Report </li>
	</ol>
</div>
	
</div>

{{---------------------}}

<div class="panel panel-default">

<div class="panel-heading">

<table>
	<tr>
	<td>
		<b><i class="fa fa-windows"></i>Fee Information</b>
	</td>
		<td>
			<input type="text" name="from" id="from" class="form-control" placeholder="dd-mm-yyyy"  required value="{{date('Y-m-d')}}"></input>
		</td>

		<td>
			<input type="text" name="to" id="to" class="form-control" placeholder="dd-mm-yyyy" value="{{date('Y-m-d')}}" required ></input>
		</td>
	</tr>
</table>

	
</div>

<div class="panel-body" style="padding-bottom: 4px;">
<p style="text-align: center; font-size: 20px; font-weight: bold;">Fee Report</p>
<div class="show-fee-info">
	
</div>
	
</div>
	
</div>



@endsection

@section('script')
<script type="text/javascript">
	
		//=========================================
	$('#from').datepicker({
		changeMonth:true,
		changeYear:true,
		dateFormat:'yy-mm-dd',
		onSelect: function(from)
		{

			showFee(from,$('#to').val())
		}
	})

	//-=========================================

	
	$('#to').datepicker({
		changeMonth:true,
		changeYear:true,
		dateFormat:'yy-mm-dd',
		onSelect: function(to){

			showFee($('#from').val(),to)
		
		}
	})
		//=========================================

		function showFee(from,to)
		{
			$.get("{{route('showFeeReport')}}",{from:from,to:to},function(data){

				$('.show-fee-info').html(data)
				
			})
		}
</script>




@endsection