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

    protected $listeners = ['productAdd' => 'prodAdd'];

    public function __construct()
    {
        $this->total = 0;
    }

    public function calculateTotalCost()
    {
        $cartItems = CartItem::where('user_id', Auth::id())->with('product');
        $this->itemsCollection = $cartItems->get();
        $this->totalItems = $cartItems->sum('cart_items.quantity');
        $this->total = 0;

        foreach ($this->itemsCollection as $item) {
            if (is_numeric($item->product->price) && is_numeric($item->quantity)) {
                $this->total += $item->product->price * $item->quantity;
            } else {
                error_log('Non-numeric value in cart: price=' . $item->product->price . ', quantity=' . $item->quantity);
            }
        }

        $this->total = number_format($this->total, 2);
    }

    public function prodAdd()
    {
        $this->calculateTotalCost();
    }

    public function render()
    {
        return view('livewire.button-cart');
    }
}
