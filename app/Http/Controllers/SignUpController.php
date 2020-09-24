<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Visitor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Validator;
class SignUpController extends Controller
{

    public function index(){

        return view('frontend.usersForm.sign-up', [
            'categories'    => Category::where('publication_status', 1)->get()
        ]);

    }

    public function newSignUp(Request $request){
        // Validation
        $roles = [
            'first_name'        => 'required|unique:visitors,first_name',
            'last_name'         => 'required',
            'email_address'     => 'required|unique:visitors,email_address',
            'password'          => 'required',
            'phone_number'      => 'required|unique:visitors,phone_number',
            'address'           => 'required',
        ];

        $validator = Validator::make($request->all(), $roles);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }
        // database Insert
        Visitor::saveVisitorInfo($request);

        session()->flash('type', 'success');
        session()->flash('message', 'Registration successfully');
        return redirect('/user/login');
    }

    public function visitorLogout(Request $request){

        Session::forget('visitorId');
        Session::forget('visitorName');
        return redirect('/');

    }

    public function visitorLogin(){

        return view('frontend.usersForm.login', [
            'categories'    => Category::where('publication_status', 1)->get()
        ]);
    }
public function visitorSignIn(Request $request){
// Validation
    $roles = [
        'email_address'     => 'required',
        'password'          => 'required',
    ];

    $validator = Validator::make($request->all(), $roles);

    if($validator->fails()){
        return redirect()->back()->withErrors($validator)->withInput();
    }

    // Database Insert

    $visitor = Visitor::where('email_address', $request->email_address)->first();
    if ($visitor){
        if (password_verify($request->password, $visitor->password)) {
            session::put('visitorId', $visitor->id);
            session::put('visitorName', $visitor->first_name.' '.$visitor->last_name);
            return redirect('/');
        } else {
            session()->flash('type', 'success');
            session()->flash('message', 'Invalid password');
            return redirect('/user/login');
        }
    } else{
        session()->flash('type', 'success');
        session()->flash('message', 'Invalid email');
        return redirect('/user/login');
    }


}





}
