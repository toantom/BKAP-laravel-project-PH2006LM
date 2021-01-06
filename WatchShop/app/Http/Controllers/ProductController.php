<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Product_img;
use App\Models\Category;
use App\Models\Attribute;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Feedback;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;    
use Illuminate\Support\Str;


class ProductController extends Controller
{
  public function index()
  {
        $prod = Product::paginate(4);
        return view('backend.product.index', compact('prod'));
  }
    public function show_pro($id)
    {
        $pro_fend = Product::find($id);
        $id_cate = $pro_fend->id_cate;
        $pro_related = Product::where('id_cate','=',$id_cate)->limit(4)->get();
        $feedbacks = Feedback::where('id_product','=',$id)->get();
        $pro_img = Product_img::where('id_product','=',$id)->get();
        $pro_upsell = Product::limit(4)->get();
        return view('frontend.product',compact('pro_upsell','pro_fend','pro_img','feedbacks','pro_related'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cate = Category::where('status','=',1)->get();
        return view('backend.product.create', compact('cate'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {
        if($request->hasFile('avatar')){
            $file = $request->file('avatar');
            $file_name = $file->getClientOriginalName();
            $file->move(public_path('be/img/product'),$file_name);
        } 
        $attr = Attribute::create([
            'length_face' => $request->length_face,
            'material_face' => $request->material_face,
            'waterproof' => $request->waterproof,
            'use_energy' => $request->use_energy,
            'material_strap' => $request->material_strap,
            'material_coat' => $request->material_coat,
            'origin' => $request->origin,
            'guarantee' => $request->guarantee,
        ]);
        $request->merge(['image' => $file_name, 'id_attr' => $attr->id]);
        $request['slug'] = Str::slug($request->name);      
        $data = $request->except(['_token','avatar', 'avatars']);
        $product = Product::create($data);
        
        if($request->hasFile('avatars')){
            $files = $request->file('avatars');
            foreach ($files as $value) {
                $file_names = $value->getClientOriginalName();
                $value->move(public_path('be/img/product/imgs'),$file_names);
                Product_img::create([
                    'id_product' => $product->id,
                    'image' => $file_names
                ]);
            }
        }
        if($product){
            return redirect()->route('product.index')->with('addpro-success','Thêm mới thành công');
        }
        else{
            return redirect()->back()->with('addpro-error','Thêm mới không thành công');
        }
        
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
        $pro = Product::find($id);
        $pro_imgs = Product_img::where('id_product',$id)->get();
        $cate = Category::where('status','=',1)->get();
        return view('backend.product.edit',compact('pro','cate','pro_imgs','id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, $id)
    {   
        //cập nhật ảnh đại diện
        $filename = Product::find($id)->image;
        if($request->hasFile('avatar')){
            File::delete('public/be/img/product/'.$filename.'');
            $file = $request->file('avatar');
            $file_name = $file->getClientOriginalName();
            $file->move(public_path('be/img/product'),$file_name);
        }else{
            $file_name = $filename;
        }
        //cập nhập thông tin sản phẩm
        $id_attr = Product::find($id)->id_attr;
        $attr = Attribute::where('id',$id_attr)->update([
            'length_face' => $request->length_face,
            'material_face' => $request->material_face,
            'waterproof' => $request->waterproof,
            'use_energy' => $request->use_energy,
            'material_strap' => $request->material_strap,
            'material_coat' => $request->material_coat,
            'origin' => $request->origin,
            'guarantee' => $request->guarantee,
        ]);
        //merge thêm trường image và id_attr vào request
        $request->merge(['image' => $file_name, 'id_attr' => $id_attr]);
        //trường slug
        $request['slug'] = Str::slug($request->name);      
        $data = $request->except(['_token','_method','avatar', 'avatars','length_face','material_face','waterproof',
                                'use_energy','material_strap','material_coat','origin','guarantee']);
        $product = Product::where('id',$id)->update($data
            // [
            // 'name' => $request->name,
            // 'sku' => $request->sku,
            // 'id_cate' => $request->id_cate,
            // 'type' => $request ->type,
            // 'stock' => $request->stock,
            // 'price' => $request->price,
            // 'discount' => $request->discount,
            // 'slug' => $request->slug,
            // 'image' => $file_name,
            // 'status' => $request->status,
            // 'id_attr' => $id_attr
            // ]
        );

        if($request->hasFile('avatars')){
            $files = $request->file('avatars');
            // $imgs = Product_img::where('id_product',$id);
            // File::delete('public/be/img/product/imgs'.$imgs->image.'');
            Product_img::where('id_product',$id)->delete();
            foreach ($files as $value) {
                $file_names = $value->getClientOriginalName();
                $value->move(public_path('be/img/product/imgs'),$file_names);
                Product_img::create([
                    'id_product' => $id,
                    'image' => $file_names
                ]);
            }
        }
        if($product){
            return redirect()->route('product.index')->with('updatepro-success','sua thanh cong');
        }else{
            return redirect()->back()->with('updatepro-error');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   
        $filename = Product::find($id)->image;
        $id_attr = Product::find($id)->id_attr;
        $filenames = Product_img::where('id_product',$id)->get();
        if($filenames){
            foreach ($filenames as $value) {
                File::delete('public/be/img/product/imgs/'.$value.'');
            }
        }
        if($filename){
            File::delete('public/be/img/product/'.$filename.'');
        }
        Product_img::where('id_product',$id)->delete();
        $pro = Product::find($id)->delete();
        $attr = Attribute::where('id', $id_attr)->delete();
        if($pro){
            return redirect()->back()->with('delpro-success','Xóa sản phẩm thành công');
        }else{
            return redirect()->back()->with('delpro-error','Xóa sản phẩm không thành công');
        }
    }


}
