<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Permission;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Register;
use Carbon\Carbon;
use Auth;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:user|superadministrator');
    }


    public function users()
    {
        $supers = User::whereRoleIs('superadministrator')->get();
        /*->orWhereRoleIs('administrator')*/
      
        $admins = User::whereRoleIs('administrator')->get();


        $day = Carbon::createFromFormat('m', 11)->startOfMonth()->format( 'Y-m-d' );

        return view('users.all')->with(array('supers'=>$supers, 'admins'=>$admins));

    }

    public function store(Request $request)
    {
        $this->validate($request,
            [
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'mobile' => ['required', 'numeric', 'unique:users'],
            ], 
            [
                'name.required' => 'This is a required field.',
                'name.max' => 'The character limit is set at 140.',
                'email.required' => 'We need to know your e-mail address!',
            ]
        );

        $password = rand(1000,9999);

        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'mobile' => $request->input('mobile'),
            'password' => Hash::make($password),
            'password_change_at' => 1,
        ]);

        $user->attachRole('superadministrator');

        $details = [
                'title' => 'Hi '.$request->input('name'),
                'body' => 'Welcome to the Twendeni Porini Na Canon Promotion, your credentials include mobile: '.$request->input('mobile').' and password: '.$password.' at http://canon.ims.co.ke/'
            ];

        Mail::to($request->input('email'))->send(new \App\Mail\canonMail($details));



        return redirect('/users');
    }

    public function userUpgrade(Request $request)
    {
        $id = $request->input('user_id');
        $user = User::findOrFail($id);
        $user->detachRole('administrator');
        $user->attachRole('superadministrator');
        return redirect('/users');
    }

    public function destroy($id)
    {
        $user = User::find($id);

        if(Auth::user()->hasRole('superadministrator')){ 
            $user->delete();  
            return back();
        } else { 
            return back();
        }
       
    }

    public function preset(Request $request)
    {
        $id = $request->input('user_id');
        $password = rand(1000,9999);
        $user = User::find($id);

        if(Auth::user()->hasRole('superadministrator')){

            $user->password = Hash::make($password);
            $user->password_change_at = 1;
            $user->save();


            $details = [
                'title' => 'Hi '.$user->name,
                'body' => 'Welcome to the survey pquestionnaires, your credentials include mobile: '.$user->mobile.' and new password: '.$password
            ];

             Mail::to($user->email)->send(new \App\Mail\canonMail($details));

            return redirect('/users');
        } else { 
            return back();
        }
       
    }


    public function update(Request $request, $id)
    {
        $this->validate($request,
            [
                'name' => ['string', 'max:255'],
                'email' => ['string', 'email', 'max:255'],
                'mobile' => ['numeric'],
            ], 
            [
                'name.max' => 'The character limit is set at 140.',
            ]
        );

        $user = User::find($id);  
        $user->name = $request->input('name');
        $user->email =  $request->input('email');
        $user->mobile = $request->input('mobile');
        $user->save();  // Update the data


        return redirect('/users');
        
    }
}
