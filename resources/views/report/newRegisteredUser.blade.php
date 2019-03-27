@extends('layouts.master')
@section('content')

{!!Charts::assets()!!}

{{-----------------------------}}
<div class="row">
<div class="col-lg-12">
  <h3 class="page-header"><i class="fa fa-file-text-o"></i>Student</h3>
<ol class="breadcrumb">
<li><i class="fa fa-home" ></i><a href="#"></a>Home</li>
<li><i class="icon_document"></i>Chart</li>
<li><i class="fa fa-file-text-o"></i>Student Chart</li>
	</ol>
</div>

</div>

{{------------------------------}}
<div class="panel panel-default">
<div class="panel-heading">
<b><i class="fa fa-apple"></i>Registration Chart</b>

</div>
<div class="panel panel-body" style="padding-bottom: 10px; margin-top: 0;">
{!! $chart-> render() !!}

</div>
<div>


@endsection
