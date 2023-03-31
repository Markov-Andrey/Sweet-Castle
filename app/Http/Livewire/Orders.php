<?php

namespace App\Http\Livewire;

use App\Models\Order;
use App\Models\Status;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Orders extends Component
{
    /**
     * Selected status parameter
     * @var array
     */
    public $selectedOption = [];
    public $selectedStatus = null;

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
        $query = DB::table('orders')
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
            ->orderBy('orders.created_at', 'DESC');

        if ($this->selectedStatus) {
            $query->where('orders.status', $this->selectedStatus);
        }

        $orders = $query->get();


        //Custom pagination
        $currentPage = request()->page ?? 1;
        $perPage = 5;
        $groupOrders = $orders->groupBy('order'); //Grouping by order number

        $currentPageItems = $groupOrders->slice(($currentPage - 1) * $perPage, $perPage)->all();
        $groupedOrdersPaginated = new LengthAwarePaginator($currentPageItems, $groupOrders->count(), $perPage, $currentPage);

        $groupedOrdersPaginated->setPath(request()->url());
        //

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
            'groupOrders' => $groupedOrdersPaginated,
            'statuses' => $statuses,
            'totals' => $totals,
        ]);
    }
}
