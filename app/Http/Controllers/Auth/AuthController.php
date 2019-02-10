<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use App\User;
use App\Http\Requests\ChangePasswordRequest;

class AuthController extends Controller
{

	public function __construct()
	{
		$this->middleware('auth');
	}

    public function changePassword()
    {
        return view('auth.passwords.change')->with(
            ['email' => Auth::user()->email]
        );
    }

    public function postChangePassword(ChangePasswordRequest $request)
    {
    	if(Auth::Check())
  		{
  			if(\Hash::check($request->current_password,Auth::User()->password))
  			{
    			$user = User::find(Auth::user()->id)->update(["password"=> bcrypt($request->password)]);    	
  			}
  			else{
  				return redirect()->back()->with('alert-danger','Incorrect Details !');
  			}
  		}
        return redirect()->to('/')->with('alert-success','Password changed successfully !');
    }
}