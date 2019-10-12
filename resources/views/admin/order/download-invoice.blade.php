<!DOCTYPE html>
<html>
<head>
    <title>Page Title</title>
    <link href="{{asset('/')}}admin/assets/css/invoice.css" rel="stylesheet">

</head>
<body>

<div class="top-invoice">
    <h6>I N V O I C E</h6>
</div>


<div class="new-shop">
    <h1><span>New</span> Shop</h1>
    <h5>Address: Bashundhara <br/>G-Block, 15-Road Dhaka Bangladesh</h5>
    <h5>TL: 02 3330444</h5>
</div>
<div class="invoice">
    <table class="table">
        <tr>
            <th>Invoice No #</th>
            <td>0000{{$order->id}}</td>
        </tr>
        <tr>
            <th>Date</th>
            <td>{{date('d-M-Y',strtotime($order->created_at))}}</td>
        </tr>
        <tr>
            <th>Amount due</th>
            <td>TK. {{$order->order_total}}</td>
        </tr>
    </table>
</div>

<div class="shipping">
    <h4>Shipping Info</h4>
    <table class="shipping-table">
        <tr>
            <th>Name</th>
            <td>{{$shipping->full_name}}</td>
        </tr>
        <tr>
            <th>Phone</th>
            <td>{{$shipping->phone}}</td>
        </tr>
        <tr>
            <th>Address</th>
            <td>{{$shipping->address}}</td>
        </tr>
    </table>
</div>

<div class="billing">
    <h4>Billing Info</h4>
    <table class="billing-table">
        <tr>
            <th>Name</th>
            <td>{{$coustomer->first_name.' '.$coustomer->last_name}}</td>
        </tr>
        <tr>
            <th>Phone</th>
            <td>{{$coustomer->phone}}</td>
        </tr>
        <tr>
            <th>Address</th>
            <td>{{$coustomer->address}}</td>
        </tr>
    </table>
</div>

<div class="product">
    <table class="product-table">
        <tr>
            <th>Product Name</th>
            <th>Product Price</th>
            <th>Product Quantity</th>
            <th>Sub Total</th>
        </tr>
        @php($sum=0)
        @foreach($orderDetails as $orderDetail)
            <tr>
                <td>{{$orderDetail->product_name}}</td>
                <td>{{$orderDetail->product_price}}</td>
                <td>{{$orderDetail->product_quantity}}</td>
                <td>{{$subtotal=$orderDetail->product_price * $orderDetail->product_quantity}}</td>
                <?php
                $sum=$sum+$subtotal;
                $tax=$sum*5/100;
                $total = $sum+ $tax;
                ?>
            </tr>
        @endforeach
    </table>
</div>

<div class="total">
    <table class="total-table">
        <tr>
            <th>Total</th>
            <td>{{$sum}}</td>
        </tr>
        <tr>
            <th>Tax 5%</th>
            <td>{{$tax}}</td>
        </tr>
        <tr>
            <th>Grand Total</th>
            <td>{{$total}}</td>
        </tr>
    </table>
</div>



</body>
</html>



