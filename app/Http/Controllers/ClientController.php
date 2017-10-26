<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClientController extends Controller
{
    public function index()
    {
    	$clients = \App\Client::where('user_id', Auth::user()->id)->get();
    	return view('client', compact('clients'));
    }
}
