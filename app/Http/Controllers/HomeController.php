<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data['user']=new UsersController;  
        $data['insurercompany']=new InsurercompanyController;
        $data['client']=new ClientController;
        $data['product']=new ProductController;
        $data['insurance_policy']=new Insurance_policyController;

        return view('home',$data);
    }
}
