<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Insurercompany;
use App\Models\Status;

use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Session;
use Bouncer;
use Datatables;
use Auth;
use PDF;
class InsurercompanyController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        
        Controller::has_ability('View_Insurercompany');
        $data['insurercompanies']=Insurercompany::select('insurercompanies.*','s.name as status_name')         
                                ->Join('statuses as s','s.id','=','insurercompanies.status_id')
                                ->get();
                               
        return view('insurercompanies.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        Controller::has_ability('Create_Insurercompany');
        $data['statuses']=Status::all();

        return view('insurercompanies.create',$data);
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

        Controller::has_ability('Create_Insurercompany');
   
        $this->validate($request,[           
          
            'name' => 'required|string|max:255',
            'contact_name' => 'required|string|max:255',
            'email' => 'required|string',
            'primary_phone' => 'required',
            'company_address' => 'required',
            'status_id' => 'required',

            
            
        ]);

        $insurercompany= Insurercompany::create([ 
                'name' => $request->name,
                'contact_name' => $request->contact_name,
                'email' => $request->email,
                'primary_phone' => $request->primary_phone,
                'alternative_phone' => $request->alternative_phone,
                'company_address' => $request->company_address,
                'contact_email' => $request->contact_email,
                'status_id' => $request->status_id
                   
                  
        ]);
       
        return redirect('insurercompanies'); 
       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $data['insurercompanies']=Insurercompany::select('insurercompanies.*','s.name as status_name')         
                                ->Join('statuses as s','s.id','=','insurercompanies.status_id')
                                ->where('insurercompanies.id','=',$id)
                                ->first();
        return view('insurercompanies.show',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        Controller::has_ability('Edit_Insurercompany');
        $insurercompany=Insurercompany::find($id);

        $data['statuses']=Status::all();

        $data['insurercompany']=$insurercompany;

        return view('insurercompanies.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
         Controller::has_ability('Edit_Insurercompany');
        $insurercompany=Insurercompany::find($id); 

        $this->validate($request,[           
            'name' => 'required|string|max:255',
            'contact_name' => 'required|string|max:255',
            'email' => 'required|string',
            'primary_phone' => 'required',
            'company_address' => 'required',
            'status_id' => 'required',     
          
        ]);


        $insurercompany->update([
                'name' => $request->name,
                'contact_name' => $request->contact_name,
                'email' => $request->email,
                'primary_phone' => $request->primary_phone,
                'alternative_phone' => $request->alternative_phone,
                'company_address' => $request->company_address,
                'contact_email' => $request->contact_email,
                'status_id' => $request->status_id]
         
     );
         return redirect('insurercompanies'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Controller::has_ability('Delete_Insurercompany');
         $insurercompany=Insurercompany::find($id);
         $insurercompany->delete();

         return redirect('insurercompanies'); 
    }

    public function insurercompany_filter(Request $request)
    {
      
      $data['insurercompanies']=Insurercompany::select('insurercompanies.*','s.name as status_name')         
                                ->Join('statuses as s','s.id','=','insurercompanies.status_id')
                                ->where('insurercompanies.'.$request->creteria,'LIKE','%'.$request->str.'%')
                                ->get();
           
      return view('insurercompanies.search',$data);

    }

    /*TOTAL INSURER COMPANIES*/
        public function insurercompanies_count()
        {

            return Insurercompany::count();

        }
    /*END*/


}
