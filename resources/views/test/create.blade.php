

@extends('master')
@extends('layouts.master1')







@section('main')
<div class="row">
 <div class="col-sm-8 offset-sm-2">
    <h1 class="display-3">Add a contact</h1>
  <div>
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
      <form method="post" action="{{ route('user.store') }}"   enctype="multipart/form-data" id="form" onsubmit="return validate()">
      
          @csrf
          <div class="form-group">    
              <label for="first_name">First Name:</label>
              <input type="text" class="form-control" name="first_name" id="first_name"/>
              <span class="error" style ="color:red;" id="error-first_name"></span> <br />
          </div>

          <div class="form-group">
              <label for="last_name">Last Name:</label>
              <input type="text" class="form-control" name="last_name"/>
              <span class="error" style ="color:red;" id="error-last_name"></span> <br />
          </div>

          <div class="form-group">
              <label for="email">Email:</label>
              <input type="text" class="form-control" name="email"/>
              <span class="error" style ="color:red;" id="error-email"></span> <br />
          </div>

         
          <div class="form-group">
              <label for="password">password:</label>
              <input type="password" class="form-control" name="password"  />
              <span class="error" style ="color:red;" id="error-password"></span> <br />
          </div> 
           <div class="form-group">
              <label for="confirmpassword">confirm password:</label>
              <input type="password" class="form-control" name="confirmpassword"/>
              <span class="error" style ="color:red;" id="error-confirmpassword"></span> <br />
          </div>
          <div class="form-group">
              <label for="job_title">Mobile No.:</label>
              <input type="text" class="form-control" name="mobile"/>

              <span class="error" style ="color:red;" id="error-mobile"></span> <br />
          </div>

            <div class="form-group">
              <label for="job_title">User_name:</label>
              <input type="text" class="form-control" name="user_name"/>

              <span class="error" style ="color:red;" id="error-user_name"></span> <br />
          </div>
          <div class="form-group">
             <label for="birthday">Birthday:</label>
               `<input type="date" id="birthday" name="birthdate">

              <span class="error" style ="color:red;" id="error-birthdate"></span> <br />
          </div>
          <div>
         Gender<select name="gender"> 
         <option value=" "> EMPTY </option> 
         <option value="Male">Male</option> 
         <option value="Female">Female</option> 
         </select> 
          <span class="error" style ="color:red;" id="error-gender"></span> <br />

                 </div>
                  <div class="form-group">    
              <label for="bio">Bio:</label>
              <input type="text" class="form-control" name="bio"/>
              <span class="error" style ="color:red;" id="error-bio"></span> <br />
          </div>

          <div>
            
               <label >choose your intrest:</label>

                 <select id="cars" name="role_id">
                  <option value="">Select Role</option>
                  @forelse($parents as $parent)
                  <option value="{{$parent->id}}">{{$parent->role}}</option>
                  @empty
                  @endforelse
                  </select>


          </div>
              <div class="form-group">    
              <label for="country">Country:</label>
              <input type="text" class="form-control" name="country"/>
              <span class="error" style ="color:red;" id="error-country"></span> <br />
          </div>
           </div>
              <div class="form-group">    
              <label for="state">state:</label>
              <input type="text" class="form-control" name="state"/>
              <span class="error" style ="color:red;" id="error-state"></span> <br />
          </div>

           

             
         <div class="form-group">    
              <label for="pin_code">PinCode:</label>
              <input type="text" class="form-control" name="pincode"/>
              <span class="error" style ="color:red;" id="error-pincode"></span> 
          </div>
          
          




           <div class="form-group">
              <label for="for_image">Image field:</label>
               <input type="file" name="image" id="fileToUpload">
               <div><button type="submit" class="btn btn-primary">Add</button></div>
                <div><button type="submit" class="btn btn-primary">Add</button></div>
           </div> 

         
      </form>
   



    <script>
  $('#first_name').on('keypress input', function() {
  var value = $(this).val();
  value = value.replace(/\d+/, ''); // removes any non-number char
  value=value.replace(/[`~!@#$%^&*()_|+\-=?;:'",.<>\{\}\[\]\\\/]/gi, '');
  $(this).val(value);


})
</script>




 <script>
               $("#form").validate({
                ignore: ".ignore",
            rules: {
                  first_name:{
                     required: true,
                       maxlength:20,
                       minlength:2

                  },

                   last_name:{
                     required: true,

                  },


                 email: {
                    required: true,
                    email:true
                },
                
                
                password: {
                    required: true,
                    maxlength:20,
                   
                },
                confirm_password: {
                    required: true
                   
                   
                },
                  mobile: {
                    required: true
                   
                   
                },
                 username: {
                    required: true
                   
                   
                },
                date: {
                    required: true
                   
                   
                },
                 gender: {
                    required: true
                   
                   
                },
                country: {
                    required: true
                   
                   
                },
                state: {
                    required: true
                   
                   
                },
                city: {
                    required: true
                   
                   
                },

                pincode: {
                    required: true
                  
                   
                },
                image: {
                    required: true
                   
                   
                },

                 role_id: {
                   required: true,
                 }

              
            },
            messages: {


                first_name:{
                     required: "Please enter first name"
                     

                  },

                   last_name:{
                     required: "Please enter last name"

                  },


               
                email: {
                    required: "Please enter email"
               
                  
                },
               

                 password: {
                    required: "Please enter the password",
                     maxlength:"Please enter atleast one digit ,one special and character."
                },
            confirm_password: {
                    required: "Please enter the confirm password"
                    
                },

                mobile:{
                     required: "Please enter mobile no"

                  },

               
                username:{
                     required: "Please enter username"

                  },

               
                date:{
                     required: "Please select the DOB"

                  },

               
                gender:{
                     required: "Please select gender"

                  },

               
                country:{
                     required: "Please enter country"

                  },

               
                state:{
                     required: "Please enter state"

                  },

               
                city:{
                     required: "Please enter city"

                  },

               
                pincode:{
                     required: "Please enter pincode"

                  },
              image:{
                     required: "Please select the image"

                  },

               

                  role_id: {
                    required: "Please select role",
                }
               
               
            },
            submitHandler: function (form) {
                abc = 'sdsadsad';
                checkBeginningWhiteSpace(abc)
            }
         });
         </script>
<script>
  DateTime dateTimeObj = DateTime.ParseExact(tbxFromDate.Value, "dd/MM/yyyy", CultureInfo.InvariantCulture);  
  
if (tbxFromDate.Value != "" && dateTimeObj > DateTime.Today)         
{        
       Messagebox.Show("From Date should be earlier or equal To Today Date", MessageHelper.MessageType.Warning);  
}  
</script>


@endsection