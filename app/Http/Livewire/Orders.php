<?php

namespace App\Http\Livewire;

use App\Models\Order;
use App\Models\Status;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Orders extends Component
{
    /**
     * Selected status parameter
     * @var array
     */
    public $selectedOption = [];

    /**
     * @param $orderProducts - Order Collection
     */
    public function sendStatus($orderProducts)
    {
        foreach ($orderProducts as $item) {
            $order = Order::findOrFail($item['id']);
            $order->status = $this->selectedOption[$order->order];
            $order->save();
        }
    }

    public function render()
    {
        $orders = DB::table('orders')
            ->leftJoin('users', 'orders.user_id', '=', 'users.id')
            ->leftJoin('products', 'orders.product_id', '=', 'products.id')
            ->leftJoin('statuses', 'orders.status', '=', 'statuses.id')
            ->select(
                'orders.*',
                'users.name as user_name',
                'users.email as user_email',
                'products.title as product_title',
                'products.price as product_price',
                'statuses.status_name as status_name')
            ->orderBy('orders.created_at', 'DESC')
            ->paginate(10);

        //All status table
        $statuses = Status::query()->get();

        //Total Sum
        $total = null;
        foreach ($orders as $item){
            $total += $item->product_price * $item->quantity;
        }

        //Update ticket status
        foreach($orders as $order){
            $this->selectedOption[$order->order] = $order->status;
        }

        return view('livewire.orders', [
            'orders' => $orders,
            'statuses' => $statuses,
            'total' => $total,
        ]);
    }
}
