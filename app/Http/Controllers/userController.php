<?php

namespace App\Http\Controllers;
use Illuminate\Http\UploadedFile;
use Illuminate\Pagination\Paginator;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Role;
use App\Http\Middleware\Admin;




class userController extends Controller
{
  public function __construct()
  {
    $this->Middleware('auth');
     $this->Middleware('Admin');

  }

       public function index(Request $request)

   {
        
         


        $users= DB::table('users')
                    ->leftJoin('parents', 'parents.id', '=', 'users.role_id');
                      if(isset($request->search))
        {
           $users = $users->where('users.first_name',$request->search);
           
        }


                      $users=$users->select('users.id','parents.role','users.first_name','users.last_name','users.usertype','users.email','users.password','users.mobile','users.user_name','users.birthdate','users.gender','users.bio','users.image','users.image','users.country','users.state','users.pincode','users.status')
                    ->simplePaginate(5);

                    //print_r($contacts);die;
                return view('test.index', compact('users'))->with('i',1);

        /*
        $contacts = Contact::all();

        return view('contacts.index', compact('contacts'));
       */ 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $parents = Role::get();
        return view('test.create',compact('parents'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
       // $request->validate([
         //   'first_name'=>'required',
           // 'last_name'=>'required',
            //'email'=>'required',
            //'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
       // ]);
        /*
          $image=$request->file('image');
        $new_name=rand(11111,99999).'.'.$image->getClientOriginalExtension();
        $image->move(public_path('image'),$new_name);


        $student = new Contact();
        $student->first_name =$request->input('first_name');
        $student->last_name =$request->input('last_name');
        $student->email =$request->input('email');
        $student->job_title =$request->input('job_title');
        $student->city =$request->input('city');
        $student->country =$request->input('country');
        $student->role_id =$request->input('role_id');
        $student->image = $new_name;

        $student->save();
      
      
        return redirect('/contacts')->with('success', 'Contact saved!');
    }
        */

        $image=$request->file('image');
    
        $new_name=rand(11111,99999).'.'.$image->getClientOriginalExtension();
    
          $image->move(public_path('image'),$new_name);

        $student = new User();
        $student->first_name =$request->input('first_name');
        $student->last_name =$request->input('last_name');
        $student->email =$request->input('email');
        $student->password=bcrypt($request->password);
        $student->mobile =$request->input('mobile');
        $student->user_name =$request->input('user_name');
        $student->birthdate =$request->input('birthdate');
        $student->gender =$request->input('gender');
          $student->bio =$request->input('bio');
           $student->country=$request->input('country');
            $student->state=$request->input('state');
             $student->pincode =$request->input('pincode');
              $student->role_id =$request->input('role_id');


        $student->image = $new_name;

        $student->save();
      
      
        return redirect('/user')->with('success', 'Contact saved!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   public function show($id)
    {
        $user=User::find($id);
        return view('test.show',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
         $parents = Role::get();
        return view('test.edit', compact('user','parents')); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)

    {
       
      //  $request->validate([
           // 'first_name'=>'required',
           // 'last_name'=>'required',
            //'email'=>'required'
       // ]);

        $contact = User::find($id);
        $contact->first_name =  $request->get('first_name');
        $contact->last_name = $request->get('last_name');
        $contact->email = $request->get('email');
        $contact->mobile = $request->get('mobile');
        $contact->country = $request->get('country');
        $contact->state= $request->get('state');
        $contact->role_id = $request->get('role_id');

        

        $contact->save();

        return redirect('/user')->with('success', 'Contact updated!');
 

     }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    // public function destroy($id)
    // {
    //     $contact = User::find($id);
    //     $contact->delete();

    //     return redirect('/user')->with('success', 'Contact deleted!');
    // }
    
    public function destroy($id)
    {
      // print_r($id);die('rajjs');
    $contact=User::find($id);
    //$contact->delete(); 
     

    //return back()->with('status','User soft deleted successfully!!');
       


    if( $contact)
    {  
         $contact->delete(); 
            return back()->with('User soft deleted successfully!!');

        
       }
       elseif( !$contact )
      {
      
       
         return 'User Does not exits';
       }


    }

      public function changeStatus(Request $request)
    {
        $user = User::find($request->user_id);
        $user->status = $request->status;
        $user->save();
  
        return response()->json(['success'=>'Status change successfully.']);
    }

    //public function delete($id)
   // {

       // $contact=User::find($id);
        //$contact->delete(); 

       // return back()->with('status','User soft deleted successfully!!');


   // }





}   