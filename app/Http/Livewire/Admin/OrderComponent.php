<?php

namespace App\Http\Livewire\Admin;

use App\Models\Customer;
use App\Models\Order;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use Session;

class OrderComponent extends Component
{
    use WithFileUploads;
    use WithPagination;
    public $orderColumn = "id";
    public $sortOrder = "desc";
    public $sortLink = '<i class="sorticon fa-solid fa-caret-up"></i>';
    public $searchTerm = "";
    public $orderss =[], $deliveryStatus, $orderId;

    public function render()
    {
        $title = "Orders";
//        $orders = Order::orderBy('id','desc')->get()
//            ->groupBy('orderId');
        $orders = Order::orderby($this->orderColumn, $this->sortOrder)->select('*');
        if (!empty($this->searchTerm)) {

            $orders->orWhere('orderId', 'like', "%" . $this->searchTerm . "%");
            $orders->orWhere('orderType', 'like', "%" . $this->searchTerm . "%");
            $orders->orWhere('deliveryStatus', 'like', "%" . $this->searchTerm . "%");
            $orders->orWhere('created_at', 'like', "%" . $this->searchTerm . "%");
        }

        $orderList = $orders->get()->groupBy('orderId');
        return view('livewire.admin.order-component',['title'=>$title,'orders'=>$orderList]);
    }

    public function sortOrder($columnName = "")
    {
        $caretOrder = "up";
        if ($this->sortOrder == 'asc') {
            $this->sortOrder = 'desc';
            $caretOrder = "down";
        } else {
            $this->sortOrder = 'asc';
            $caretOrder = "up";
        }
        $this->sortLink = '<i class="sorticon fa-solid fa-caret-' . $caretOrder . '"></i>';
        $this->orderColumn = $columnName;
    }

    public function editCustomer($orderId, $orderType)
    {
        $temp = [];
        if ($orderType =='1'){
            $orders =  getorderDetails($orderId, $orderType);
            if (count($orders)>0){
                foreach ($orders[0]->getPerPageDetails as $order){
                    $arr['image'] =getProductDetailsById($order->productId)->image;
                    $arr['altTag'] =getProductDetailsById($order->productId)->altTag;
                    $arr['titleTag'] =getProductDetailsById($order->productId)->titleTag;
                    $arr['name'] =getProductDetailsById($order->productId)->name;
                    $arr['title'] = getProductDetailsById($order->productId)->product_title;
                    $arr['qty'] =$order->qty;
                    array_push($temp,$arr);
                }
            }
        }else{
            $orders =  getorderDetails($orderId, $orderType);
            if (count($orders)>0){
                foreach($orders as $order){
                    $arr['image'] = $order->getProduct->image;
                    $arr['altTag'] = $order->getProduct->titleTag;
                    $arr['titleTag'] = $order->getProduct->titleTag;
                    $arr['name'] = $order->getProduct->name;
                    $arr['title'] = $order->getProduct->product_title;
                    $arr['qty'] = $order->qty;
                    array_push($temp,$arr);
                }
            }
        }
        $this->orderss = $temp;
        $orderDetails = Order::where('orderId',$orderId)->first();
        $this->deliveryStatus = $orderDetails->deliveryStatus;
        $this->orderId = $orderId;

    }

    public function updateDelivery()
    {
        $validatedData = $this->validate([
            'deliveryStatus' => 'required | min:1',
        ]);
        Order::where(['orderId' => $this->orderId])->update($validatedData);
        session()->flash('success', 'Orders successfully updated.');
        return redirect('/admin/orders');
    }

}
