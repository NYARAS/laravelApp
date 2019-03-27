@include('inc.header')
<div class="container">
<div class="row">
 <legend>Online Job Application</legend>
 <div class="row">
 <div class="col-md-12 col-lg-12">
 @if(session('info'))
 <div style="color: green" class="alert alert-success">
 	

 {{session('info')}}
  </div>
 @endif
 </div>
 </div>
<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Title</th>
      <th scope="col">Description</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  @if(count($articles) >0)
  @foreach($articles->all() as $article)
  
    <tr class="table-active">
      
      <td>{{$article->id}}</td>
      <td>{{$article->title}}</td>
      <td>{{$article->description}}</td>
      <td>
      <a href="{{url('')}}" class="btn btn-primary">View</a>|
       <a href="{{url("/update/{$article->id}")}}" class="btn btn-Success">Update</a>|
        <a href="{{url('')}}" class="btn btn-danger">Delete</a>|
      </td>
    </tr>
  @endforeach
  @endif

  </tbody>
</table>
	
</div>
	
</div>
@include('inc.footer')