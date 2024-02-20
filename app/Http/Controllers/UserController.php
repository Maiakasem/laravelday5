<?php

namespace App\Http\Controllers;
use App\Models\User;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        $users=User::withCount('posts')->paginate(10);
     
        $id=User::all();
        return view('users.index',['users'=>$users]);
    }

    public function show( $id){
        $data=User::with('posts')->whereId($id)->get();
        $id=User::find($id);
        return view('users.show',['user'=>$id]);
        
    }

    public function create(){
       
        return view('users.create');
    }
    public function store(Request $request){
      
        User::create([
        'name'=> $request->name,
        'email'=> $request->email,
        'password'=> $request->password

       ]);
      return redirect (url('/users')) ; 
    }

    public function edit($id){
       
        $id=User::find($id);
        return view('users.edit',['user'=>$id]);
    }
    public function update($id,Request $request){
       
        User::find($id)->update([
            'name'=> $request->name,
            'email'=> $request->email,
            'password'=> $request->password
            
           ]);
          return redirect (url('/users')) ; 
    }
    public function delete($id){
       
        User::find($id)->delete();
        return redirect()->route ('users.index') ; 
    }

}
