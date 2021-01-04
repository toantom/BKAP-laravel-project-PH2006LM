<?php
    /**
     * 
     */
    namespace App\Helper;
    use Symfony\Component\HttpFoundation\Session\Session;
    class CartHelper
    {
        public $items = [];
        public $total_quantity = 0;
        public $total_price = 0;
        public function __construct()
        {
            
            $this->items = session('cart') ? session('cart') : [];
            $this->total_price = $this->getTotalprice();
            $this->total_quantity = $this->getTotalquantity();
        }

        //addcart
        public function add($product,$qty = 1){
            $item = [
                'id'=> $product->id,
                'image'=>$product->image,
                'name'=>$product->name,
                'price'=>$product->price,
                'quantity'=>$qty
            ];
            if(isset($this->items[$product->id])){
                $this->items[$product->id]['quantity']+=1;
            }else{
            $this->items[$product->id]=$item;
            };
            session(['cart'=>$this->items]);
        }
        //delete item
        public function delete($product){
            unset($this->items[$product->id]);
            session(['cart'=>$this->items]);
        }
        //update cart
        public function update($id,$qty){
            $this->items[$id]['quantity']=$qty;
            session(['cart'=>$this->items]);
        }
        //addCart Detail
        public function addCartD($product,$qty){
            $item = [
                'id'=> $product->id,
                'image'=>$product->image,
                'name'=>$product->name,
                'price'=>$product->price,
                'quantity'=>$qty
            ];
            if(isset($this->items[$product->id])){
                $this->items[$product->id]['quantity']+= $qty;
            }else{
            $this->items[$product->id]=$item;
            };
            session(['cart'=>$this->items]);
        }

        //tinh tien
        public function getTotalprice(){
            $t = 0;
            foreach($this->items as $item){
                $t += $item['price']*$item['quantity'];
            };
            return $t;
        }
        //tinh so luong
        public function getTotalquantity(){
            $q = 0;
            foreach($this->items as $item){
                $q += $item['quantity'];
            };
            return $q;
        }

    
    
    
    }





    







?>