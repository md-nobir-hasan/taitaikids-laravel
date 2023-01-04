<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\PostCategory;
use App\Models\Brand;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products=Product::getAllProduct();

        return view('backend.pages.product.index')->with('products',$products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $product = Product::all();
        $n['brands']=Brand::get();
        $n['category']=Category::all();

        return view('backend.pages.product.create',$n);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data=$request->all();
        $slug=Str::slug($request->title);
        $count=Product::where('slug',$slug)->count();
        if($count>0){
            $slug=$slug.'-'.date('ymdis').'-'.rand(0,999);
        }
        $data['slug']=$slug;
        $data['is_featured']=$request->input('is_featured',0);
        $size=$request->input('size');
        if($size){
            $data['size']=implode(',',$size);
        }
        else{
            $data['size']='';
        }

        //Product gallery code
        $image = array();

        if ($files = $request->file('product_gallery')){
            foreach ($files as $file){
                $image_name = md5(rand(1000, 10000));
                $ext = strtolower($file->getClientOriginalExtension());
                $image_full_name = 'new'.$image_name.'.'.$ext;
                $file->move(public_path('product'), $image_full_name);
                $image[] = 'product/'.$image_full_name;
            }
        }

        $data['product_gallery'] = implode('|', $image);

        if($request->file('photo')){
            $file= $request->file('photo');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('product'), $filename);
            $data['photo']= 'product/'.$filename;
        }

        $status=Product::create($data);

        if($status){
            request()->session()->flash('success','Product Successfully added');
        }
        else{
            request()->session()->flash('error','Please try again!!');
        }
        return redirect()->route('product.index');

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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $brand=Brand::get();
        $product=Product::findOrFail($id);
        $category=Category::all();
        $items=Product::all();
        // return $items;
        return view('backend.pages.product.edit')->with('product',$product)
                    ->with('brands',$brand)
                    ->with('categories',$category)->with('items',$items);
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
        $product=Product::findOrFail($id);
        $this->validate($request,[
            'title'=>'string|required',
            'summary'=>'string|required',
            'description'=>'string|nullable',
            'size'=>'nullable',
            'stock'=>"required|numeric",
            'cat_id'=>'required|exists:categories,id',
            'brand_id'=>'nullable|exists:brands,id',
            'status'=>'required|in:active,inactive',
            'condition'=>'required|in:default,new,hot',
            'price'=>'required|numeric',
            'discount'=>'nullable|numeric'
        ]);

        $data=$request->all();

        $data['is_featured']=$request->input('is_featured',0);
        $size=$request->input('size');
        if($size){
            $data['size']=implode(',',$size);
        }
        else{
            $data['size']='';
        }
        // return $data;
         if($request->file('photo')){
            $file= $request->file('photo');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('product'), $filename);
            $data['photo']= 'product/'.$filename;
        }

        //Product gallery update code
        $image = array();

        if ($files = $request->file('product_gallery')){
            foreach ($files as $file){
                $image_name = md5(rand(1000, 10000));
                $ext = strtolower($file->getClientOriginalExtension());
                $image_full_name = $image_name.'.'.$ext;

                /*$old_images = explode('|', $product->product_gallery);
                foreach ($old_images as $key => $old_image){
                    if (file_exists(public_path('product').$old_image)){
                        unlink(public_path('product').$old_image);
                    }
                }*/

                $file->move(public_path('product'), $image_full_name);
                $image[] = 'product/'.$image_full_name;

            }
            $data['product_gallery'] = implode('|', $image);
        }else{
            $data['product_gallery'] = $product->product_gallery;
        }

        //Product gallery update code end

        $status=$product->fill($data)->save();
        if($status){
            request()->session()->flash('success','Product Successfully updated');
        }
        else{
            request()->session()->flash('error','Please try again!!');
        }
        return redirect()->route('product.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product=Product::findOrFail($id);
        $status=$product->delete();

        if($status){
            request()->session()->flash('success','Product successfully deleted');
        }
        else{
            request()->session()->flash('error','Error while deleting product');
        }
        return redirect()->route('product.index');
    }

    // Product details code
    public function product_details($id){
        $data = Product::find($id);

        return view('frontend.product_details', compact('data'));
    }

    // Show gallery image code
    public function show_gallery($id){
        $data = Product::find($id);

        return view('backend.pages.product.show_gallery', compact('data'));
    }
}
