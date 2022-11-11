<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\country;
use App\Models\city;

class userController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'gender' => 'required',
            'mobile' =>'required|unique:users'
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->gender = $request->gender;
        $user->mobile = $request->mobile;
        $user->password = Hash::make($request->password) ;
        $user->country_id = $request->country_id;
        $user->city_id = $request->city_id;
        $user->languages = \json_encode($request->languages);
        $user->certs = json_encode($request->certs);
        $user->save();

        $token = Auth::login($user);

        return \response()->json([
            'success'=> 1,
            'msg'=>'user created successfully',
            'user'=>$user,
            'token'=>$token,
        ]);
    }
    public function users( )
    {
        $user = auth('api')->user()->with('countries');
        return \response()->json([
            'success'=>'1',
            'user'=>$user
        ],200);
    }
    // public function userCountry($id )
    // {
    //     $country = country::where('id',$id)->get();
    //     return \response()->json(
    //         $country
    //     );
    // }
    // public function userCity($id )
    // {
    //     $city = city::where('id',$id)->get();
    //     return \response()->json(
    //         $city
    //     );
    // }
}
