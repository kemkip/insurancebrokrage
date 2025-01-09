<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Policytype;
use App\Models\Status;
use App\Models\Product;
use App\Models\Client;
use App\Models\Insurance_policy;

use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Session;
use Bouncer;
use Datatables;
use Auth;
use PDF;
class Insurance_policyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        
        Controller::has_ability('View_Insurance_policy');
        $data['insurance_policies']=Insurance_policy::select('insurance_policies.*','c.name as client_name','s.name as status_name' ,'p.name as product_name' ,'pt.name as policytype_name')         
                                ->Join('clients as c','c.id','=','insurance_policies.client_id')
                                ->Join('statuses as s','s.id','=','insurance_policies.status_id')
                                ->Join('products as p','p.id','=','insurance_policies.product_id')
                                ->Join('policytypes as pt','pt.id','=','insurance_policies.policytype_id')
                                ->get();
                               
        return view('insurance_policies.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        Controller::has_ability('Create_Insurance_policy');
        $data['statuses']=Status::all();
        $data['clients']=Client::all();
        $data['policytypes']=Policytype::all();
        $data['products']=Product::all();

        return view('insurance_policies.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
public function store(Request $request)
{
    // Check permission
    Controller::has_ability('Create_Insurance_policy');
   
    // Validate the input
    $this->validate($request, [           
        'status_id' => 'required',
        'policytype_id' => 'required', 
        'premium' => 'required',
        'client_id' => 'required',
        'product_id' => 'required',
        'start_date' => 'required',
        'end_date' => 'required',
    ]);

    // Get the last PO number
    $lastPo = Insurance_policy::latest('id')->first();
    $lastNumber = $lastPo ? intval(str_replace('PO-', '', $lastPo->po_number)) : 9;

    // Increment the number
    $po_number = 'PO-' . ($lastNumber + 1); // Correctly assign the incremented number

    // Create the insurance policy
    $insurance_policy = Insurance_policy::create([ 
        'po_number' => $po_number, // Use the auto-generated PO number
        'status_id' => $request->status_id,
        'premium' => $request->premium,
        'policytype_id' => $request->policytype_id,
        'client_id' => $request->client_id,
        'product_id' => $request->product_id,
        'start_date' => $request->start_date,
        'end_date' => $request->end_date 
    ]);
   
    // Redirect to insurance policies page
    return redirect('insurance_policies'); 
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
        $data['insurance_policies']=Insurance_policy::select('insurance_policies.*','c.name as client_name','s.name as status_name' ,'p.name as product_name' ,'pt.name as policytype_name')         
                                ->Join('clients as c','c.id','=','insurance_policies.client_id')
                                ->Join('statuses as s','s.id','=','insurance_policies.status_id')
                                ->Join('products as p','p.id','=','insurance_policies.product_id')
                                ->Join('policytypes as pt','pt.id','=','insurance_policies.policytype_id')
                                ->where('insurance_policies.id','=',$id)
                                ->first();
        return view('insurance_policies.show',$data);
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
        Controller::has_ability('Edit_Insurance_policy');
        $insurance_policy=Insurance_policy::find($id);

        $data['statuses']=Status::all();
        $data['clients']=Client::all();
        $data['policytypes']=Policytype::all();
        $data['products']=Product::all();
        $data['insurance_policy']=$insurance_policy;

        return view('insurance_policies.edit',$data);
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
         Controller::has_ability('Edit_Insurance_policy');
        $insurance_policy=Insurance_policy::find($id); 

        $this->validate($request,[           
            //'po_number' => 'required|string|max:255',
            'status_id' => 'required',
            'policytype_id' => 'required', 
            'premium'    => 'required',
            'client_id' => 'required',
            'product_id' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',

          
        ]);

         $insurance_policy->update([
               // 'po_number' => $request->po_number,
                'status_id' => $request->status_id,
                'premium' => $request->premium,
                'policytype_id'=>$request->policytype_id,
                'client_id'=>$request->client_id,
                'product_id'=>$request->product_id,
                'start_date'=>$request->start_date,
                'end_date'=>$request->end_date]
         
     );
         return redirect('insurance_policies'); 
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
        Controller::has_ability('Delete_Insurance_policy');
         $insurance_policy=Insurance_policy::find($id);
         $insurance_policy->delete();

         return redirect('insurance_policies'); 
    }

    public function client_filter(Request $request)
    {
      
      $data['insurance_policies']=Insurance_policy::select('insurance_policies.*','c.name as client_name','s.name as status_name' ,'p.name as product_name' ,'pt.name as policytype_name')         
                                ->Join('clients as c','c.id','=','insurance_policies.client_id')
                                ->Join('statuses as s','s.id','=','insurance_policies.status_id')
                                ->Join('products as p','p.id','=','insurance_policies.product_id')
                                ->Join('policytypes as pt','pt.id','=','insurance_policies.policytype_id')
                                ->where('insurance_policies.'.$request->creteria,'LIKE','%'.$request->str.'%')
                                ->get();
           
      return view('insurance_policies.search',$data);

    }

    /*TOTAL insurance_policies*/
        public function insurance_policies_count()
        {

            return Insurance_policy::count();

        }
    /*END*/

     /*TOTAL ACTIVE insurance_policies*/
     public function active_insurance_policies(){
      
      return Insurance_policy::where('status_id','=','3')
                       
                       ->count();      
    }

     /*TOTAL INACTIVE insurance_policies*/

         public function inactive_insurance_policies(){
      
      return Insurance_policy::where('status_id','=','4')
                       
                       ->count();      
    }

     /*TOTAL EXPIRED insurance_policies*/

         public function expired_insurance_policies(){
      
      return Insurance_policy::where('status_id','=','5')
                       
                       ->count();      
    }

     /*TOTAL Active insurance_policies*/

      public function activeinsurance_policies(){

              if(Bouncer::cannot('View_Insurance_policy')){    
           Session::flash('alert-danger', 'You are not allowed');
           return redirect()->back();           
        } 
        $data['controller']=New Controller;
       

         $data['insurance_policies']=Insurance_policy::select('insurance_policies.*','c.name as client_name','s.name as status_name' ,'p.name as product_name' ,'pt.name as policytype_name')         
                                ->Join('clients as c','c.id','=','insurance_policies.client_id')
                                ->Join('statuses as s','s.id','=','insurance_policies.status_id')
                                ->Join('products as p','p.id','=','insurance_policies.product_id')
                                ->Join('policytypes as pt','pt.id','=','insurance_policies.policytype_id')
                                ->where('insurance_policies.status_id','=','3')
                                ->get();
        return view('insurance_policies.activeinsurance_policies',$data);

    }

     /*TOTAL Inactive insurance_policies*/

    public function inactiveinsurance_policies(){

              if(Bouncer::cannot('View_Insurance_policy')){    
           Session::flash('alert-danger', 'You are not allowed');
           return redirect()->back();           
        } 
        $data['controller']=New Controller;
       

         $data['insurance_policies']=Insurance_policy::select('insurance_policies.*','c.name as client_name','s.name as status_name' ,'p.name as product_name' ,'pt.name as policytype_name')         
                                ->Join('clients as c','c.id','=','insurance_policies.client_id')
                                ->Join('statuses as s','s.id','=','insurance_policies.status_id')
                                ->Join('products as p','p.id','=','insurance_policies.product_id')
                                ->Join('policytypes as pt','pt.id','=','insurance_policies.policytype_id')
                                ->where('insurance_policies.status_id','=','4')
                                ->get();
        return view('insurance_policies.inactiveinsurance_policies',$data);

    }

     /*TOTAL Inactive insurance_policies*/

    public function expiredinsurance_policies(){

              if(Bouncer::cannot('View_Insurance_policy')){    
           Session::flash('alert-danger', 'You are not allowed');
           return redirect()->back();           
        } 
        $data['controller']=New Controller;
       

         $data['insurance_policies']=Insurance_policy::select('insurance_policies.*','c.name as client_name','s.name as status_name' ,'p.name as product_name' ,'pt.name as policytype_name')         
                                ->Join('clients as c','c.id','=','insurance_policies.client_id')
                                ->Join('statuses as s','s.id','=','insurance_policies.status_id')
                                ->Join('products as p','p.id','=','insurance_policies.product_id')
                                ->Join('policytypes as pt','pt.id','=','insurance_policies.policytype_id')
                                ->where('insurance_policies.status_id','=','5')
                                ->get();
        return view('insurance_policies.expiredinsurance_policies',$data);

    }


}
