<?php

namespace App\Http\Controllers;

use App\Models\Policytype;
use Illuminate\Http\Request;
use Bouncer;
use Session;
use Auth;
use DB;

class PolicytypeController extends Controller
{/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        if(Bouncer::cannot('View_Policytype')){    
           Session::flash('alert-danger', 'You are not allowed');
           return redirect()->back();           
        } 

        $data['policytypes']=Policytype::all();
        return view('policytypes.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        if(Bouncer::cannot('Create_Policytype')){    
           Session::flash('alert-danger', 'You are not allowed');
           return redirect()->back();           
        } 
        return view('policytypes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
             if(Bouncer::cannot('Create_Policytype')){    
           Session::flash('alert-danger', 'You are not allowed');
           return redirect()->back();           
        }
         $this->validate($request,[           
            'name' => 'required',
            'description' => 'required',
            
                        
        ]);

         $policytype=Policytype::create([
                                'name'=>$request->name,
                                'description'=>$request->description,
                                
                            ]); 

       
        return redirect('policytypes');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\policytype  $policytype
     * @return \Illuminate\Http\Response
     */
    public function show(Policytype $policytype)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\policytype  $policytype
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
         if(Bouncer::cannot('Edit_Policytype')){    
           Session::flash('alert-danger', 'You are not allowed');
           return redirect()->back();           
        } 

        $data['policytype']=Policytype::find($id);

        return view('policytypes.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\policytype  $policytype
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
           if(Bouncer::cannot('Edit_Policytype')){    
           Session::flash('alert-danger', 'You are not allowed');
           return redirect()->back();           
        }

            $policytype=Policytype::find($id);
            $this->validate($request,[           
                'name' => 'required',
                'description' => 'required',
               
            ]);


        $policytype->update($request->all());
        return redirect('policytypes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\policytype  $policytype
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
           if(Bouncer::cannot('Delete_Policytype')){    
           Session::flash('alert-danger', 'You are not allowed');
           return redirect()->back();           
        } 
        Policytype::find($id)->delete();

        return redirect('policytypes');
    }
}
