<?php

namespace App\Http\Livewire\Frontend;

use App\Models\Order;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;
use Session;

class UserOrdersComponent extends Component
{
    use WithPagination;
    
    public $orderColumn = "id";
    public $sortOrder = "desc";
    public $sortLink = '<i class="sorticon fa-solid fa-caret-up"></i>';
    public $searchTerm = "";
    public $orderss = [];
    public $deliveryStatus, $orderId;

    public function render()
    {
        // Vérifier si l'utilisateur est connecté
        $customer = \Session::get('Customer');
        if (!$customer) {
            return redirect()->route('userLogin')->with('error', 'Veuillez vous connecter pour voir vos commandes.');
        }
        
        $customerId = $customer->id;
        
        $orders = Order::where('customerId', $customerId)
            ->orderBy($this->orderColumn, $this->sortOrder);
            
        if (!empty($this->searchTerm)) {
            $orders->where(function($query) {
                $query->where('orderId', 'like', "%" . $this->searchTerm . "%")
                      ->orWhere('orderType', 'like', "%" . $this->searchTerm . "%")
                      ->orWhere('deliveryStatus', 'like', "%" . $this->searchTerm . "%")
                      ->orWhere('created_at', 'like', "%" . $this->searchTerm . "%");
            });
        }

        $orderList = $orders->get()->groupBy('orderId');
        
        return view('livewire.frontend.user-orders-component', [
            'orders' => $orderList
        ]);
    }

    public function sortOrder($columnName = "")
    {
        if ($this->orderColumn == $columnName) {
            $this->sortOrder = ($this->sortOrder == 'asc') ? 'desc' : 'asc';
        } else {
            $this->orderColumn = $columnName;
            $this->sortOrder = 'asc';
        }
        $this->sortLink = '<i class="sorticon fa-solid fa-caret-up"></i>';
    }

    public function editOrder($orderId, $orderType)
    {
        \Log::info('=== EDIT ORDER DEBUG ===');
        \Log::info('Order ID: ' . $orderId);
        \Log::info('Order Type: ' . $orderType);
        
        $this->orderId = $orderId;
        $temp = [];
        
        if ($orderType == '1') {
            // Pour les packages
            $orders = Order::with('getPerPageDetails')->where('orderId', $orderId)->where('orderType', '1')->get();
            \Log::info('Package orders found: ' . count($orders));
            
            if (count($orders) > 0) {
                foreach ($orders[0]->getPerPageDetails as $order) {
                    $product = Product::find($order->productId);
                    if ($product) {
                        $arr['image'] = $product->image;
                        $arr['altTag'] = $product->altTag;
                        $arr['titleTag'] = $product->titleTag;
                        $arr['name'] = $product->name;
                        $arr['title'] = $product->product_title;
                        $arr['qty'] = $order->qty;
                        $arr['price'] = $order->price ?? '0';
                        array_push($temp, $arr);
                    }
                }
            }
        } else {
            // Pour les produits individuels
            $orders = Order::with('getProduct')->where('orderId', $orderId)->where('orderType', '0')->get();
            \Log::info('Product orders found: ' . count($orders));
            
            if (count($orders) > 0) {
                foreach($orders as $order) {
                    if ($order->getProduct) {
                        $arr['image'] = $order->getProduct->image;
                        $arr['altTag'] = $order->getProduct->altTag;
                        $arr['titleTag'] = $order->getProduct->titleTag;
                        $arr['name'] = $order->getProduct->name;
                        $arr['title'] = $order->getProduct->product_title;
                        $arr['qty'] = $order->qty;
                        $arr['price'] = $order->price ?? '0';
                        array_push($temp, $arr);
                    }
                }
            }
        }
        
        \Log::info('Final orderss count: ' . count($temp));
        \Log::info('Orderss data: ' . json_encode($temp));
        \Log::info('=== END EDIT ORDER DEBUG ===');
        
        $this->orderss = $temp;
        
        // Émettre un événement pour ouvrir la modal
        $this->dispatchBrowserEvent('orderUpdated');
    }

    public function updateDelivery()
    {
        $this->validate([
            'deliveryStatus' => 'required',
        ]);

        Order::where('orderId', $this->orderId)
            ->update(['deliveryStatus' => $this->deliveryStatus]);

        session()->flash('success', 'Delivery status updated successfully');
        $this->reset(['deliveryStatus', 'orderId']);
    }
}
