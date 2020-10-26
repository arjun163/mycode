@extends('master')
@extends('layouts.master1')


@section('main')
<div class="row">
    <div class="col-sm-8 offset-sm-2">
        <h1 class="display-3">Update a contact</h1>

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        <br> 
        @endif
        <form method="post" action="{{ route('user.update', $user->id) }}" enctype="multipart/form-data">
          @method('PATCH') 
            @csrf
            <div class="form-group">

                <label for="first_name">First Name:</label>
                <input type="text" class="form-control" name="first_name" value="{{ $user->first_name }}" />
            </div>

            <div class="form-group">
                <label for="last_name">Last Name:</label>
                <input type="text" class="form-control" name="last_name" value="{{ $user->last_name }}" />
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="text" class="form-control" name="email" value="{{ $user->email }}" />
            </div>
            <div class="form-group">
                <label for="city">Mobile:</label>
                <input type="text" class="form-control" name="mobile" value="{{ $user->mobile }}" />
            </div>
            <div class="form-group">
                <label for="country">Country:</label>
                <input type="text" class="form-control" name="country" value="{{ $user->country }}" />
            </div>
            <div class="form-group">
                <label for="job_title">State:</label>
                <input type="text" class="form-control" name="state" value="{{ $user->state }}" />
            </div>
             <div>
            
               <label for="cars">choose your intrest:</label>

                 <select id="cars" name="role_id">
                  <option value="">Select Role</option>
                  @forelse($parents as $parent)
                  <option value="{{$parent->id}}" {{($parent->id == $user->role_id) ? 'selected' : ''}}>{{$parent->role}}</option>
                  @empty
                  @endforelse
                  </select>


          </div>
          <!-- <div class="form-group">
              <label for="for_image">Image field:</label>
              <img src="{{asset('image/'.$user->image)}}" width="50px" height="50px">
               <input type="file" name="image" id="fileToUpload">
          </div> -->
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>
@endsection