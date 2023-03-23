<?php

namespace App\Http\Livewire;

use App\Models\CartItem;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use App\Services\RandomCode;

class Cart extends Component
{
    /**
     * @param $id
     */
    public function add($id)
    {
        $item = CartItem::find($id);
        $item->quantity += 1;
        $item->save();
    }

    /**
     * @param $id
     */
    public function removeOne($id)
    {
        $item = CartItem::find($id);

        if($item->quantity > 0){
            $item->quantity -= 1;
        }

        if($item->quantity == 0){
            $this->delete($id);
        }

        $item->save();
    }

    /**
     * @param $id
     */
    public function delete($id)
    {
        CartItem::destroy($id);
    }

    /**
     * Create an order for the administrator
     */
    public function order()
    {
        $code = RandomCode::generate(7);
        $user = Auth::id();
        $cart = CartItem::where('user_id', Auth::id())->get();

        foreach ($cart as $item) {
            $order = new Order();
            $order->order = $user.$code;
            $order->user_id = $item->user_id;
            $order->product_id = $item->product_id;
            $order->quantity = $item->quantity;
            $order->status = 1;
            $order->save();
            $item->delete();
        }
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function render()
    {
        $total = 0;

        $cartItems = CartItem::where('user_id', Auth::id())->with('product')->orderBy("created_at", "DESC")->get();

        foreach ($cartItems as $item){
            $total += $item->product->price * $item->quantity;
        }

        return view('livewire.cart', [
            "cartItems" => $cartItems,
            "total" => $total,
        ]);
    }
}
