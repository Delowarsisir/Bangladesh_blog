<?php

namespace App\Models;

use \Validator;
use Illuminate\Database\Eloquent\Model;
use \Session;

class Visitor extends Model
{
    protected $fillable = ['first_name', 'last_name', 'email_address', 'password', 'phone_number', 'address'];

    public static function saveVisitorInfo($request){


        // Database insert
        $visitor = new Visitor();

        $visitor->first_name    = trim($request->first_name);
        $visitor->last_name     = trim($request->last_name);
        $visitor->email_address = trim($request->email_address);
        $visitor->password      = bcrypt($request->password);
        $visitor->phone_number  = trim($request->phone_number);
        $visitor->address       = $request->address;
        $visitor->save();

        Session::put('visitorId', $visitor->id);
        Session::put('visitorName', $visitor->first_name.' '.$visitor->last_name);

    }



}
