<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Insurercompany;
use App\Models\Productcategory;
use App\Models\Product;

use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Session;
use Bouncer;
use Datatables;
use Auth;
use PDF;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        
        Controller::has_ability('View_Product');
        $data['products']=Product::select('products.*','ic.name as insurercompany_name','p.name as productcategory_name')         
                                ->Join('insurercompanies as ic','ic.id','=','products.insurercompany_id')
                                ->Join('productcategories as p','p.id','=','products.productcategory_id')
                                ->get();
                               
        return view('products.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        Controller::has_ability('Create_Product');
        $data['productcategories']=Productcategory::all();
        $data['insurercompanies']=Insurercompany::all();

        return view('products.create',$data);
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

        Controller::has_ability('Create_Product');
   
        $this->validate($request,[           
          
            'name' => 'required|string|max:255',
            'productcategory_id' => 'required',
            'insurercompany_id' => 'required',

            
            
        ]);

        $product= Product::create([ 
                'name' => $request->name,
                'productcategory_id' => $request->productcategory_id,
                'insurercompany_id' => $request->insurercompany_id,
                'description' => $request->description
                   
                  
        ]);
       
        return redirect('products'); 
       
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
        $data['products']=Product::select('products.*','ic.name as insurercompany_name','p.name as productcategory_name')         
                                ->Join('insurercompanies as ic','ic.id','=','products.insurercompany_id')
                                ->Join('productcategories as p','p.id','=','products.productcategory_id')
                                ->where('products.id','=',$id)
                                ->first();
        return view('products.show',$data);
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
        Controller::has_ability('Edit_Product');
        $product=Product::find($id);

        $data['productcategories']=Productcategory::all();
        $data['insurercompanies']=Insurercompany::all();

        $data['products']=$product;

        return view('products.edit',$data);
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
         Controller::has_ability('Edit_Product');
        $product=Product::find($id); 

        $this->validate($request,[           
            'name' => 'required|string|max:255',
            'productcategory_id' => 'required',
            'insurercompany_id' => 'required',    
          
        ]);


        $product->update([
                'name' => $request->name,
                'productcategory_id' => $request->productcategory_id,
                'insurercompany_id' => $request->insurercompany_id,
                'description' => $request->description]
         
     );
         return redirect('products'); 
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
        Controller::has_ability('Delete_Product');
         $product=Product::find($id);
         $product->delete();

         return redirect('products'); 
    }

    public function product_filter(Request $request)
    {
      
      $data['products']=Product::select('products.*','ic.name as insurercompany_name','p.name as productcategory_name')         
                                ->Join('insurercompanies as ic','ic.id','=','products.insurercompany_id')
                                ->Join('productcategories as p','p.id','=','products.productcategory_id')
                                ->where('products.'.$request->creteria,'LIKE','%'.$request->str.'%')
                                ->get();
           
      return view('products.search',$data);

    }

    /*TOTAL INSURER COMPANIES*/
        public function products_count()
        {

            return Product::count();

        }
    /*END*/


}
