<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use DB;
use Session;
use App\Models\Product;
use DataTables;

class crudController extends Controller
{
    public function insertData(Request $request){
        $product = new Product;
        $product->product_name = $request->pname;
        $product->prd_qty = $request->quantity;
        $product->prd_category = $request->category;
        $product->prd_image = 'No Image';
        //return json_encode($request->all());
        //\DB::table('products')->insert(['product_name'=>$request->pname,'prd_qty'=>$request->quantity,'prd_category'=>$request->category,'prd_image'=>'no image',
         //'created_at'=>\Carbon\Carbon::now()]);
        
        if($product->save()){
            return back()->with('success', 'Saved successfully!');
         }else{
            return back()->with('error', 'Unable to save');
         }
        $data = Input::except('_token');
    	print_r($data);
    	$data['created_at'] = date('Y-m-d H:i:s');
    	DB::table($tbl)->insert($data);
    	session::flash('message','Data inserted successfully!!!');
        return redirect()->back()->with('message','New data successfully inserted');
    }

    public function getProducts(Request $request){
        return Datatables::of(\DB::table('products')->orderBy('id', 'DESC'))->filter(function($query)use($request){
            $query->where('product_name', 'LIKE', '%'.$request->search.'%');
        })->addColumn('buttons', function(){
            return '<button class="btn btn-primary">Edit</button>';
        })->escapeColumns([])->make();
    }

    public function getSongs(Request $request){
        return Datatables::of(\DB::table('songs')->orderBy('sid', 'DESC'))->filter(function($query)use($request){
            $query->where('sname', 'LIKE', '%'.$request->search.'%')->orWhere('stitle', 'LIKE', '%'.$request->search.'%');
        })->addColumn('buttons', function(){
            return '<button class="btn btn-primary">Edit</button>';
        })->escapeColumns([])->make();
    }
}
 