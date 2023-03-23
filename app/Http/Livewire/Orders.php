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

        //Grouping by identical orders
        $groupOrders = $orders->groupBy('order');

        //Total amount for orders
        $totals = $groupOrders->map(function ($group) {
            $total = 0;
            foreach ($group as $order) {
                $total += $order->product_price * $order->quantity;
            }
            return $total;
        });

        //All status table
        $statuses = Status::query()->get();

        //Update ticket status
        foreach($orders as $order){
            $this->selectedOption[$order->order] = $order->status;
        }

        return view('livewire.orders', [
            'orders' => $orders,
            'groupOrders' => $groupOrders,
            'statuses' => $statuses,
            'totals' => $totals,
        ]);
    }
}
