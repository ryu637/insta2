<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class ProfileController extends Controller
{

    private $user;

    public function __construct(User $user_model) {
        $this->user = $user_model;
    }


    public function index($id){
        $user = $this->user->findOrFail($id);
        return view('users.profile.show')->with('user', $user);
    }
}
