<?php

namespace App\Http\Livewire;

use App\Models\CartItem;
use App\Models\Order;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use App\Services\RandomCode;
use App\Actions\OrderTelegramAction;

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
        $this->emit('productAdd');
    }

    /**
     * @param $id
     */
    public function removeOne($id)
    {
        $item = CartItem::find($id);

        if(($item->quantity > 0) && (is_numeric($item->quantity))){
            $item->quantity -= 1;
        } else {
            $this->delete($id);
        }

        $item->save();
        $this->emit('productAdd'); //Send event to listener
    }

    /**
     * @param $id
     */
    public function delete($id)
    {
        CartItem::destroy($id);
        $this->emit('productAdd'); //Send event to listener
    }

    /**
     * Create an new order for the administrator
     */
    public function order(OrderTelegramAction $orderTelegramAction)
    {
        $code = RandomCode::generate(7);
        $user = Auth::id();
        $cart = CartItem::where('user_id', Auth::id())->get();

        foreach ($cart as $item) {
            if($item->quantity > 0){
                $order = new Order();
                $order->order = $user.$code;
                $order->user_id = $item->user_id;
                $order->product_id = $item->product_id;
                $order->quantity = $item->quantity;
                $order->status = 1;
                $order->save();

                //add in order
                $orderTelegramAction->add($order);
            }
            $item->delete();
        }

        //send order to Telegram notification
        $orderTelegramAction->send();



        $this->emit('productAdd'); //Send event to listener
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
        $total = number_format($total, 2);

        return view('livewire.cart', [
            "cartItems" => $cartItems,
            "total" => $total,
        ]);
    }
}
