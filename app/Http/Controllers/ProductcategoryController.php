<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Productcategory;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Session;
use Bouncer;
use Datatables;
use Auth;
use PDF;
class ProductcategoryController extends Controller
{
     //
/**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        Controller::has_ability('View_Productcategory');
      $data['productcategories']=Productcategory::all();
    
      return view('productcategories.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        Controller::has_ability('Create_Productcategory');
        return view('productcategories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
          $this->validate($request,[           
         
         'name' => 'required|string|max:255|unique:productcategories',
            
        ]);

        Productcategory::create($request->all());
        Session::flash('alert-success', 'Productcategory has been Created');
        return redirect('productcategories');  
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
       /*   Controller::has_ability('View_Productcategory');
  

        $data['productcategory']=$productcategory;

        return view('productcategories.show',$data);*/
    }

    /**
     * Show the form for editing the specified resource.
     */
     public function edit($id)
    {
        
        Controller::has_ability('Edit_Productcategory');
        $productcategory=Productcategory::find($id);

        
        $data['productcategory']=$productcategory;

        return view('productcategories.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       Controller::has_ability('Edit_Productcategory');
        $productcategory=Productcategory::find($id); 

        $this->validate($request,[           
            'name' => 'required|string|max:255',
            
            
            
        ]);

        $productcategory->update($request->all());
        Session::flash('alert-success', 'Productcategory has been updated');

        return redirect('productcategories'); 

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Controller::has_ability('Delete_Productcategory');
         $productcategory=Productcategory::find($id);
         $productcategory->delete();

        Session::flash('alert-danger', 'User has been deleted');

         return redirect('productcategories');
   
    }



}
