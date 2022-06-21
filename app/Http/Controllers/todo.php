<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\todoModel;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class todo extends Controller
{
    public function index(){
        return view('login');
    }
    //--------------------

    public function registerpage(){
        return view('register');
    }

    public function getList(){
        //$data = array();
        if(Session::has('loginid')){
            $data = User::where('email', '=', Session::get('loginid'))->first();
            $todo = todoModel::where('email', '=', Session::get('loginid'))->get();
            return view('show', compact('data'))->with('todo', $todo);
        }else{
            return redirect('/');
        }

       
    }
    //-------------------

    public function store(Request $request){
        //dd($request->all());
        $formFields = $request->validate([
            'title'      => ['required', Rule::unique('todo', 'title')],
            'content'    => 'required',
            'email'      => 'required',
            'created_at' => 'required'
        ]);

        todoModel::create($formFields);
        return redirect('/dashboard')->with('message', 'List Added successful');;

    }
    //----------------------

    public function update(Request $request, $id){
        //dd($request->all());
        $new = todoModel::find($id);
        $formFields = $request->all();
        $new->fill($formFields);
        $new->save();
        return redirect('/dashboard')->with('message', 'Updated successful');
    }
    //-------------------------

    public function delete($id){
        //dd($request->all());
        $remove = todoModel::find($id);
        $remove->delete();

        return redirect('/dashboard')->with('message', 'Delete successful');
    }
    //--------------------------

    public function adduser(Request $request){
       //dd($request->all());
       $request->validate([
        'photo'     => 'required',
        'fullname'  => 'required',
        'phone'     => 'required|min:11',
        'email'     => ['required', 'email', Rule::unique('users', 'email')],
        'password'  => 'required|confirmed|min:4',
       ]);

       if($request->hasFile('photo')){
          $file_path = $request->file('photo')->store('logos', 'public');
       }

       $user = new User();
       $user->photo     = $file_path;
       $user->fullname  = $request->fullname;
       $user->phone     = $request->phone;
       $user->email     = $request->email;
       $user->password  = Hash::make($request->password);
       $user->save();
       
       //User::create($form);

       return redirect('/register')->with('success', 'Successful !!');
       
    }
    //--------------------

    public function login(Request $request){
        //dd($request->all());
        $request->validate([
            'email' => ['required', 'email'],
            'password' => 'required|min:4',
        ]);

        $user = User::where('email', '=', $request->email)->first();
        if($user){
            if(Hash::check($request->password, $user->password)){
                $request->session()->put('loginid', $user->email);
                return redirect('/dashboard');
            }else{
                return back()->with('failpass', 'fail');
            }
        }else{
            return back()->with('failemail', 'fail');
        }

    }
    //-----------------------

    public function logout(){
        if(Session::has('loginid')){
            Session::flush();
            //auth()->logout();
            //$request->session()->invalidate();
            //$request->session()->regenerateToken();

            return redirect('/');
        }
    }

}
   