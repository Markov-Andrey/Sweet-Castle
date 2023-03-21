<?php

namespace App\Http\Livewire;

use App\Models\CartItem;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class AddToCart extends Component
{
    public int $productId;
    public array $cart = [];

    public function mount($productId)
    {
        $this->productId = $productId;
    }

    public function add($productId, $quantity = 1)
    {
        // Retrieve user ID from authentication
        $userId = Auth::id();

        // Check if product already exists in cart for the user
        $cartItem = CartItem::where('user_id', $userId)
            ->where('product_id', $productId)
            ->first();

        // If product already exists, update quantity
        if ($cartItem) {
            $cartItem->quantity += $quantity;
            $cartItem->save();
        } else {
            // Otherwise, create a new cart item
            CartItem::create([
                'user_id' => $userId,
                'product_id' => $productId,
                'quantity' => $quantity,
            ]);
        }

        // Retrieve updated cart data for the user
        $cart = CartItem::where('user_id', $userId)
            ->pluck('quantity', 'product_id')
            ->toArray();

        session()->flash('message', 'Product added successfully!');
    }

    public function render()
    {
        return view('livewire.add-to-cart');
    }
}
