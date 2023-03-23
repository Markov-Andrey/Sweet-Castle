<?php

namespace App\Http\Livewire;

use App\Models\Order;
use App\Models\Status;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Orders extends Component
{
    public $currentStatus;

    public function sendStatus($orderProducts)
    {
        foreach ($orderProducts as $item) {
            $order = Order::findOrFail($item['id']);
            $order->status = $this->currentStatus;
            $order->save();
        }
    }

    public function render()
    {
        $orders = DB::table('orders')
            ->leftJoin('users', 'orders.user_id', '=', 'users.id')
            ->leftJoin('products', 'orders.product_id', '=', 'products.id')
            ->leftJoin('statuses', 'orders.status', '=', 'statuses.id')
            ->select('orders.*', 'users.name as user_name', 'users.email as user_email', 'products.title as product_title', 'statuses.status_name as status_name')
            ->orderBy('orders.created_at', 'DESC')
            ->paginate(10);
        $statuses = Status::query()->get();

        return view('livewire.orders', [
            'orders' => $orders,
            'statuses' => $statuses,
        ]);
    }
}
