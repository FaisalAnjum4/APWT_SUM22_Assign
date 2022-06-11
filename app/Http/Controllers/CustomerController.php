<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\alluser;

class CustomerController extends Controller
{
  
    function home(){
        return view("homepge");
    }
    

    function create(){
        return view('customercreate');
    }
    function createSubmit(Request $req){
        $this->validate($req,
            [
                "name"=>"required|regex:/^([A-Z .-])+$/i",
                "email"=>"required|regex:/^([0-9]{2}-[0-9]{5}-[0-3]{1}@student.aiub.edu)+$/i",
                "password"=>"required|min:8",
                "conf_password"=>"required|min:8|same:password"
            ],
            [
                "name.required"=>"Please provide your name",
                "name.regex"=>"Only alphabetic",
                "email.regex"=>"email format must xx-xxxxx-xx@student.aiub.edu",
                "password.regex"=>"must be 8 characters"
               


                
            ]);
            $ur = new alluser();
            $ur->name = $req->name;
            $ur->email =$req->email;
            $ur->password = $req->password;
            $ur->save();

        return redirect()->route("homepge");
        
    }

    function login(){
        return view('customerlogin');
    }

    function loginvalidate(Request $req){
        $this->validate($req,
            [
        
                "email"=>"required|regex:/^([0-9]{2}-[0-9]{5}-[0-3]{1}@student.aiub.edu)+$/i",
                "password"=>"required|min:8",
                 
            ],
            [
                "email.regex"=>"email format must xx-xxxxx-xx@student.aiub.edu",
   
            ]);
        $users= alluser::where('email','=',$req->email)
        ->where('password','=',$req->password)->first();
       if($users){
            return redirect()->route("userlist");
       }
       else
       return redirect()->route("homepge");
    }


    public function list(){
        $userinfo = alluser::all(); 

        return view('userlist')->with('allusers',$userinfo);

    }


    public function details($id){
        $id="alluser $id";
        return view('userdetails')
        ->with('id',$id)
        ->with('name',$name)
        ->with('email',$email);
    }

}
