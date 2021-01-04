<?php

namespace App\Http\Controllers;
use App\Models\Order;
use App\Models\Order_detail;
use App\Helper\CartHelper;
use App\Http\Requests\CheckoutRequest;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Session\Session;

class OrderController extends Controller
{
    public function index()
    {
        //
    }


    //show checkout
    public function showcheckout(){
        return view('frontend.checkout');
    }
    

    //check out
    public function create(CartHelper $cart,CheckoutRequest $request)
    {
        $data = new CartHelper;
        Order::create([
                'name'=>$request->name,
                'email'=>$request->email,
                'phone'=>$request->phone,
                'address_ship'=>$request->address_ship,
                'note'=>$request->note,
                'id_user'=>$request->id_user,
                'total_price'=>$data->total_price,
        ]);
        foreach($data->items as $item){
            $id_order = Order::orderBy('id','DESC')->first()->id;
             Order_detail::create([
                'id_order' => $id_order,
                'id_product'=>$item['id'],
                'price'=>$item['price'],
                'quantity'=>$item['quantity']
            ]);
        };
        session()->forget('cart');
        return redirect()->route('frontend.index')->with('checkout_success',"Đặt hàng thành công, vui lòng chờ xác thực");

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
        //
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
    }
}
