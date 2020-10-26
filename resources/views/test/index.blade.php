


@extends('master')
@extends('layouts.master1')
@section('content')



@section('main')

<script> 
function show() {
 


   document.getElementById('showid').style.display = "block";
 
}
</script>



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


<div style="margin-left: 30% width:100%; ">

<div class="row" style="width:50%">
<div class="col-2">
</div>
<div class="col-10" style="width: 80%;" >
<form method="get" action="">
    <div class=""> 
              <input type="search" name="search" placeholder="Search" value="{{Request::get('search')}}" />
              
              <button type="submit" class="btn btn-primary" >Search</button>
             <!-- <div class="dropdown">
                      <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Select
                      </button>
                      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="{{url('software')}}">Admin</a>
                        <a class="dropdown-item" href="{{url('support')}}">staff</a>
                        <a class="dropdown-item" href="{{url('manager')}}">manager</a>
                      </div>

                 </div> --> 

</div> 

  

</form>


    <div>
    <a style="margin: 19px;" href="{{ route('user.create')}}" class="btn btn-primary">New contact</a>
    </div>
    <div class=" container d-flex-p-2 ">    
  <table class="table table-striped">
    <thead>
        <tr  style="width: 700px">
          <td>ID</td>
          <td>Image</td>
          <td>Name</td>
          <td>Email</td>
          <td>Mobile No.</td>
          <td>Date Of Birth</td>
          <td>BIO</td>
          <td>Roles</td>

          <td>Edit</td>
          <td>Delete</td>
          <td>View</td>
          <td colspan="2">Status</td>
         

        </tr>
    </thead>
    <tbody>
      
     
      <tbody>
        @foreach($users as $contact)
        <tr>
            <td>{{$i++}}</td>
            <td><img src="{{asset('image/'.$contact->image)}}" height="50px" width="50px"></td>
            <td>{{$contact->first_name}}
                {{$contact->last_name}}</td>
            <td>{{$contact->email}}</td>
            <td>{{$contact->mobile}}</td>
            <td>{{$contact->birthdate}}</td>
            <td>{{$contact->bio}}</td>
            <td>{{$contact->role}}</td>
            <td>
                <a href="{{ route('user.edit',$contact->id)}}" class="btn btn-primary"><span class="glyphicon glyphicon-scissors">Edit</span></a>
            </td>
            <td>
                <form action="{{ route('user.destroy', $contact->id)}}" method="post" class="delete">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit" ><span  class="glyphicon glyphicon-trash">Delete</span></button>
                 
                </form>

            </td>
            <td> <a href="{{ route('user.show',$contact->id)}}" class="btn btn-primary" ><span class="glyphicon glyphicon-eye-open">View </span></a></td>
              <td> <input data-id="{{$contact->id}}" class="toggle-class" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Active" data-off="InActive" {{ $contact->status ? 'checked' : '' }}></td>
        </tr>
      
   
        @endforeach
        <script>
    $(".delete").on("submit", function(){
        return confirm("Are you sure?");
    });
</script>
    </tbody>






    </tbody> 

  </table>
   
   </div>

</div>

</div>
</div>

<script>
  $(function() {
    $('.toggle-class').change(function() {
        var status = $(this).prop('checked') == true ? 1 : 0; 
        var user_id = $(this).data('id'); 
         
        $.ajax({
            type: "GET",
            dataType: "json",
            url: '/changeStatus',
            data: {'status': status, 'user_id': user_id},
            success: function(data){
              console.log(data.success)
            }
        });
    })
  })

    
</script>
@endsection
@endsection

