<?php

namespace App\Http\Controllers\auth;

use App\helper\HttpResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    use HttpResponse;
    //

    public function register(UserRequest $req){
        $req->validated($req->all());
        $user=User::create([
            'name'=>$req->name,
            'email'=>strtolower($req->email),
            'password'=>Hash::make($req->password),
        ]);
        return $this->success([
            'user'=>$user,
            'token'=>$user->createToken('API Token of' .$user->name)->plainTextToken
        ]);
    }

// api login
    public function login(LoginRequest $req){
        $req->validated($req->all());
        if(!Auth::attempt($req->only(['email','password']))){
            return $this->error('','Credential do not match',401);
        }
        $user=User::where("email",$req->email)->first();
        return $this->success([
            'user'=>$user,
            'token'=>$user->createToken('API Token of'.$user->name)->plainTextToken
        ]);

    }


 // web login
 public function weblogin(Request $req){

    $vadilate=$req->validate([
        'email'=>'required|email',
        'password'=>"required",
    ]);

    $user=User::where("email",$req->email)->first();
    $user = Auth::attempt(['email' => strtolower($req->email), 'password' => $req->password]);
    if(!$user) return redirect()->back();
    if ($user) {
        $req->session()->put('user', $user);
        $req->session()->regenerateToken();
        return redirect('/');

        // The user is active, not suspended, and exists.
    }
}
}
