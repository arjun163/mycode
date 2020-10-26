@extends('master')
@extends('layouts.master1')


@section('main')
  


<div class="jumbotron text-center"  class="bg-primary text-white">
	<div allign="right">
		<a href="{{route('user.index')}}" class="btn btn-danger">Back</a>
	</div>
	<br/>
	<td><img src="{{asset('image/'.$user->image)}}" height="100px" width="100px"></td>

	<h3> First_name :-{{$user->first_name}}</h3>
	<h3> Last_Name :-{{$user->last_name}}</h3>
	<h3> Email : -{{$user->email}}</h3>
	<h3> Country :-{{$user->country}}</h3>
	
	<h3> City :-{{$user->state}}</h3>
	
	<h3> Mobile No.:-{{$user->mobile}}</h3>
	<h3> Birth-Date.:-{{$user->birthdate}}</h3>



</div>

@endsection