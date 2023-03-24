<?php

namespace App\Http\Livewire;

use App\Models\CartItem;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ButtonCart extends Component
{
    public $totalItems;
    public $itemsCollection;
    public $total;

    protected $listeners = ['productAdd' => 'render'];

    public function render()
    {
        $cartItems = CartItem::where('user_id', Auth::id())->with('product');

        $this->itemsCollection = $cartItems->get();
        $this->totalItems = $cartItems->sum('cart_items.quantity');

        foreach ($this->itemsCollection as $item){
            $this->total += $item->product->price * $item->quantity;
        }

        $this->total = number_format($this->total, 2);

        return view('livewire.button-cart');
    }
}
