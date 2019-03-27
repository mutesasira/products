<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\User;
Use App\products;
use Session;
use Illuminate\Support\Facades\Storage;

class homeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('add');
    }

    public function add()
    {
        return view('add');
    }

    public function edit(Request $request)
    {
        $product= products::find($request->id);
        return view('editform',compact('product',$product));
    } 
}
