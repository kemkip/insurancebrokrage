<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Status;
use App\Models\Country;
use App\Models\Client;

use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Session;
use Bouncer;
use Datatables;
use Auth;
use PDF;
class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        
        Controller::has_ability('View_Client');
        $data['clients']=Client::select('clients.*','c.name as country_name','s.name as status_name')         
                                ->Join('countries as c','c.id','=','clients.country_id')
                                ->Join('statuses as s','s.id','=','clients.status_id')
                                ->get();
                               
        return view('clients.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        Controller::has_ability('Create_Client');
        $data['statuses']=Status::all();
        $data['countries']=Country::all();

        return view('clients.create',$data);
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

        Controller::has_ability('Create_Client');
   
        $this->validate($request,[           
          
            'name' => 'required|string|max:255',
            'status_id' => 'required',
            'country_id' => 'required',
            'primary_phone' => 'required',
            'id_number' => 'required',

            
            
        ]);
        $file = $request->file('photo');

        $path=Controller::upload_img($file);

        $client= Client::create([ 
                'name' => $request->name,
                'status_id' => $request->status_id,
                'country_id' => $request->country_id,
                'primary_phone'=>$request->primary_phone,
                'id_number'=>$request->id_number,
                'alternative_phone'=>$request->alternative_phone,
                'postal_code'=>$request->postal_code,
                'postal_address'=>$request->postal_address,
                'email_address'=>$request->email_address,
                'pin_no'=>$request->pin_no,
                'description' => $request->description,
                'photo'=>$path  
                   
                  
        ]);
       
        return redirect('clients'); 
       
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
        $data['clients']=Client::select('clients.*','c.name as country_name','s.name as status_name')         
                                ->Join('countries as c','c.id','=','clients.country_id')
                                ->Join('statuses as s','s.id','=','clients.status_id')
                                ->where('clients.id','=',$id)
                                ->first();
        return view('clients.show',$data);
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
        Controller::has_ability('Edit_Client');
        $client=Client::find($id);

        $data['statuses']=Status::all();
        $data['countries']=Country::all();

        $data['client']=$client;

        return view('clients.edit',$data);
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
         Controller::has_ability('Edit_Client');
        $client=Client::find($id); 

        $this->validate($request,[           
            'name' => 'required|string|max:255',
            'status_id' => 'required',
            'country_id' => 'required',    
          
        ]);

         $file = $request->file('photo');
        if(!is_null($file)){
        $path=Controller::upload_img($file);
        }else{
            $path=$client->photo;
        }


        $client->update([
                'name' => $request->name,
                'status_id' => $request->status_id,
                'country_id' => $request->country_id,
                'primary_phone'=>$request->primary_phone,
                'id_number'=>$request->id_number,
                'alternative_phone'=>$request->alternative_phone,
                'postal_code'=>$request->postal_code,
                'postal_address'=>$request->postal_address,
                'email_address'=>$request->email_address,
                'pin_no'=>$request->pin_no,
                'description' => $request->description,
                'photo'=>$path]
         
     );
         return redirect('clients'); 
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
        Controller::has_ability('Delete_Client');
         $client=Client::find($id);
         $client->delete();

         return redirect('clients'); 
    }

    public function client_filter(Request $request)
    {
      
      $data['clients']=Client::select('clients.*','c.name as country_name','s.name as status_name')         
                                ->Join('countries as c','c.id','=','clients.country_id')
                                ->Join('statuses as s','s.id','=','clients.status_id')
                                ->where('clients.'.$request->creteria,'LIKE','%'.$request->str.'%')
                                ->get();
           
      return view('clients.search',$data);

    }

    /*TOTAL CLIENTS*/
        public function clients_count()
        {

            return Client::count();

        }
    /*END*/

     /*TOTAL ACTIVE CLIENTS*/
     public function active_clients(){
      
      return Client::where('status_id','=','1')
                       
                       ->count();      
    }

     /*TOTAL INACTIVE CLIENTS*/

         public function inactive_clients(){
      
      return Client::where('status_id','=','2')
                       
                       ->count();      
    }

     /*TOTAL OPEN CLIENTS*/

      public function open_clients(){

              if(Bouncer::cannot('View_Client')){    
           Session::flash('alert-danger', 'You are not allowed');
           return redirect()->back();           
        } 
        $data['controller']=New Controller;
       

         $data['clients']=Client::select('clients.*','c.name as country_name','st.name as status_name')
                                ->join('statuses as st', 'st.id','=','clients.status_id')
                                ->join('countries as c', 'c.id','=','clients.country_id')
                                ->where('clients.status_id','=','1')
                                ->get();
        return view('clients.openclients',$data);

    }

     /*TOTAL CLOSED CLIENTS*/

    public function closed_clients(){

              if(Bouncer::cannot('View_Client')){    
           Session::flash('alert-danger', 'You are not allowed');
           return redirect()->back();           
        } 
        $data['controller']=New Controller;
       

         $data['clients']=Client::select('clients.*','c.name as country_name','st.name as status_name')
                                ->join('statuses as st', 'st.id','=','clients.status_id')
                                ->join('countries as c', 'c.id','=','clients.country_id')
                                ->where('clients.status_id','=','2')
                                ->get();
        return view('clients.closedclients',$data);

    }


}
