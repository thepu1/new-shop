<?php

namespace App\Http\Controllers;

use App\Coustomer;
use App\Order;
use App\OrderDetail;
use App\Payment;
use App\Shipping;
use PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function manageOrder(){
        $orders = DB::table('orders')
                    ->join('coustomers','orders.coustomer_id', '=','coustomers.id')
                    ->join('payments','orders.id', '=', 'payments.order_id')
                    ->select('orders.*','coustomers.first_name','coustomers.last_name','payments.payment_type','payments.payment_status')
                    ->orderBy('id','desc')
                    ->get();
        return view('admin.order.manage-order',[
            'orders'    =>  $orders
        ]);
    }

    public function viewOrderDetails($id){
        $order = Order::find($id);
        $coustomer = Coustomer::find($order->coustomer_id);
        $shipping = Shipping::find($order->shipping_id);
        $payment = Payment::where('order_id',$order->id)->first();
        $orderDetails = OrderDetail::where('order_id',$order->id)->get();

        return view('admin.order.view-order-details',[
            'order'         => $order,
            'coustomer'     => $coustomer,
            'shipping'      => $shipping,
            'payment'       => $payment,
            'orderDetails'  => $orderDetails,
        ]);
    }

    public function viewOrderInvoice($id){
        $order = Order::find($id);
        $coustomer = Coustomer::find($order->coustomer_id);
        $shipping = Shipping::find($order->shipping_id);
        $orderDetails = OrderDetail::where('order_id',$order->id)->get();
       return view('admin.order.view-order-invoice',[
           'order'         => $order,
           'coustomer'     => $coustomer,
           'shipping'      => $shipping,
           'orderDetails'  => $orderDetails,
       ]);
    }

    public function downloadOrderInvoice($id){
        $order = Order::find($id);
        $coustomer = Coustomer::find($order->coustomer_id);
        $shipping = Shipping::find($order->shipping_id);
        $orderDetails = OrderDetail::where('order_id',$order->id)->get();
//        return view('admin.order.download-invoice',[
//            'order'         => $order,
//            'coustomer'     => $coustomer,
//            'shipping'      => $shipping,
//            'orderDetails'  => $orderDetails,
//        ]);
        $pdf = PDF::loadView('admin.order.download-invoice',[
            'order'         => $order,
            'coustomer'     => $coustomer,
            'shipping'      => $shipping,
            'orderDetails'  => $orderDetails,
        ]);
        return $pdf->stream('invoice.pdf');
    }

    public function editOrder($id){
        return view('admin.order.edit-order');
    }
}
