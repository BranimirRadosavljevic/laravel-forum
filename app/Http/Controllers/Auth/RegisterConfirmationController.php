<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class RegisterConfirmationController extends Controller
{
    public function index()
    {
        try{
            User::where('confirmation_token', request('token'))
            ->firstOrFail()
            ->update(['confirmed' => true ]);
            
        } catch(\Exception $e) {
            return redirect('/threads')->with('flash', 'Invalid token.');
        }
            
        return redirect('/threads')->with('flash', 'Your account is now confirmed! You may post to the forum.');
    }
}
