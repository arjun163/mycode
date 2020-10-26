


@extends('master')
@extends('layouts.master1')



@section('content')
@section('main')


<div class="col-sm-12" class="container" >

  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div>
  @endif
</div>

@section('main')
<br>
<br>


<div style="margin-left: 10%">

<div class="row">
<div class="col-sm-12">
<form method="get" action="">
    <div class="form-group"> 
              <input type="search" name="search" placeholder="Search" value="{{Request::get('search')}}" />
              <button type="submit" class="btn btn-primary" >Search</button>
              </div>     

</form>
<div class="dropdown">
        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" onclick="show()">
          CLASS
        </button>
       <div class="show" aria-labelledby="" id ="showid" style="display: none;">
          <a class="dropdown-item" href="{{url('software')}}">software developer</a>
          <a class="dropdown-item" href="{{url('support')}}">IT support</a>
         
          <a class="dropdown-item" href="{{url('manager')}}">manager</a>

        </div>
        </div>


    <div>
    <a style="margin: 19px;" href="{{ route('contacts.create')}}" class="btn btn-primary">New contact</a>
    </div>
    <div class=" container d-flex-p-2 ">    
  <table class="table table-striped">
    <thead>
        <tr>
          <td>ID</td>
          <td>Image</td>
          <td>Name</td>
          <td>Email</td>
          <td>Job Title</td>
          <td>City</td>
          <td>Country</td>
          <td>Roles</td>

          <td>Edit</td>
          <td>Delete</td>
          <td>View</td>

        </tr>
    </thead>
    <tbody>

        @foreach($roles as $contact)
        <tr>
            <td>{{$contact->id}}</td>
            <td><img src="{{asset('image/'.$contact->image)}}" height="50px" width="50px"></td>
            <td>{{$contact->first_name}}
            {{$contact->last_name}}</td>
            <td>{{$contact->email}}</td>
            <td>{{$contact->job_title}}</td>
            <td>{{$contact->city}}</td>
            <td>{{$contact->country}}</td>
            <td>{{$contact->role}}</td>
            <td>
                <a href="{{ route('contacts.edit',$contact->id)}}" class="btn btn-primary"><span class="glyphicon glyphicon-scissors">Edit</span></a>
            </td>
            <td>
                <form action="{{ route('contacts.destroy', $contact->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit" ><span  class="glyphicon glyphicon-trash">Delete</span></button>
                 
                </form>
            </td>
            <td> <a href="{{ route('contacts.show',$contact->id)}}" class="btn btn-primary" ><span class="glyphicon glyphicon-eye-open">View </span></a></td>
        </tr>

        @endforeach
    </tbody>

  </table>
</div>
</div>

</div>
</div>
@endsection
@endsection