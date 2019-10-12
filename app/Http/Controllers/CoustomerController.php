<?php

namespace App\Http\Controllers;

use App\Category;
use App\Coustomer;
use App\Order;
use App\OrderDetail;
use App\Payment;
use App\Shipping;
use Mail;
use Session;
use Cart;
use Illuminate\Http\Request;

class CoustomerController extends Controller
{
    public function coustomerSignUp(){
        $categories = Category::where('publication_status',1)->get();
        $cart_count = Cart::count();
        return view('front.coustomer.coustomer-sign-up',[
            'categories'    => $categories,
            'cart_count'     => $cart_count
        ]);
    }
    protected function coustomerValidation($request){
        $this->validate($request,[
            'first_name'    =>  'required',
            'last_name'     =>  'required',
            'email'         =>  'required|email|unique:coustomers',
            'password'      =>  'required|min:6',
            'phone'         =>  'required',
            'address'       =>  'required'
        ]);
    }
    public function newCoustomerSignUp(Request $request){
        $this->coustomerValidation($request);
        $email = Coustomer::where('email',$request->email)->first();
        if($email){
            return redirect('/check-out')->with('message','Email All ready Exist');
        }
        else{
            $coustomer = new Coustomer();
            $coustomer->first_name  =   $request->first_name;
            $coustomer->last_name   =   $request->last_name;
            $coustomer->email       =   $request->email;
            $coustomer->password    =   bcrypt($request->password);
            $coustomer->phone       =   $request->phone;
            $coustomer->address     =   $request->address;
            $coustomer->save();

            Session::put('coustomerId',$coustomer->id);
            Session::put('coustomerEmail',$coustomer->email);
            Session::put('coustomerName',$coustomer->first_name.' '.$coustomer->last_name);
            $data = $coustomer->toArray();
            Mail::send('front.mail.congratulation-mail', $data, function($message) use($data){
                $message->to($data['email']);
                $message->subject('congratulation Mail');
            });

            return redirect('/')->with('message','Successfully Registration');
        }
    }
    public function checkOutCoustomerSignUp(Request $request){
        $this->coustomerValidation($request);
        $email = Coustomer::where('email',$request->email)->first();
        if($email){
            return redirect('/check-out')->with('message','Email All ready Exist');
        }
        else{
            $coustomer = new Coustomer();
            $coustomer->first_name  =   $request->first_name;
            $coustomer->last_name   =   $request->last_name;
            $coustomer->email       =   $request->email;
            $coustomer->password    =   bcrypt($request->password);
            $coustomer->phone       =   $request->phone;
            $coustomer->address     =   $request->address;
            $coustomer->save();

            Session::put('coustomerId',$coustomer->id);
            Session::put('coustomerEmail',$coustomer->email);
            Session::put('coustomerName',$coustomer->first_name.' '.$coustomer->last_name);
            $data = $coustomer->toArray();
            Mail::send('front.mail.congratulation-mail', $data, function($message) use($data){
                $message->to($data['email']);
                $message->subject('congratulation Mail');
            });

           return redirect('/checkout/shipping')->with('message','Successfully Registration');
        }
    }

    public function emailCheck($email){
       $coustomer = Coustomer::where('email',$email)->first();
       if($coustomer){
           return 'Email Allready Exist';
       }
       else{
           return 'Email is Available';
       }
    }


    public function coustomerLogin(){
        $categories = Category::where('publication_status',1)->get();
        $cart_count = Cart::count();
        return view('front.coustomer.coustomer-login',[
            'categories'    => $categories,
            'cart_count'     => $cart_count
        ]);
    }

    public function newCoustomerLogin(Request $request){

        $coustomer = Coustomer::where('email',$request->email)->first();
        if($coustomer){
            if (password_verify($request->password,$coustomer->password)){
                Session::put('coustomerId',$coustomer->id);
                Session::put('coustomerName',$coustomer->first_name.' '.$coustomer->last_name);
                return redirect('/')->with('message','Login Successfully');
            }
            else{
                return redirect('/coustomer-login')->with('message','Password not Valid');
            }
        }
        else{
            return redirect('/coustomer-login')->with('message','Email not Valid');
        }

    }

    public function checkOutCoustomerLogin(Request $request){
        $coustomer = Coustomer::where('email',$request->email)->first();
        if($coustomer){
            if (password_verify($request->password,$coustomer->password)){
                Session::put('coustomerId',$coustomer->id);
                Session::put('coustomerEmail',$coustomer->email);
                Session::put('coustomerName',$coustomer->first_name.' '.$coustomer->last_name);
                return redirect('/checkout/shipping')->with('message','Login Successfully');
            }
            else{
                return redirect('/check-out')->with('message','Password not Valid');
            }
        }
        else{
            return redirect('/check-out')->with('message','Email not Valid');
        }

    }


    public function coustomerLogout(){
        Session::forget('coustomerId');
        Session::forget('coustomerName');
        return redirect('/');
    }

    public function shippingForm(){
        $categories = Category::where('publication_status',1)->get();
        $cart_count = Cart::count();
        $coustomer = Coustomer::find(Session::get('coustomerId'));
        return view('front.checkout.shipping',[
            'categories' => $categories,
            'cart_count' => $cart_count,
            'coustomer'  => $coustomer
        ]);
    }

    public function newShipping(Request $request){
        $shipping = new Shipping();
        $shipping->full_name = $request->full_name;
        $shipping->email = $request->email;
        $shipping->phone = $request->phone;
        $shipping->address = $request->address;
        $shipping->save();
        Session::put('shippingId', $shipping->id);
        Session::put('shippingEmail', $shipping->email);

        return redirect('checkout/payment');
    }

    public function paymentForm(){
        $categories = Category::where('publication_status',1)->get();
        $cart_count = Cart::count();
        return view('front.checkout.payment',[
            'categories' => $categories,
            'cart_count' => $cart_count
        ]);
    }

    public function newOrder(Request $request){
       $paymentType = $request->payment_type;
       if ($paymentType == 'cash'){
           $order = new Order();
           $order->coustomer_id     = Session::get('coustomerId');
           $order->shipping_id      = Session::get('shippingId');
           $order->order_total      = Cart::total('0','0','');
           $order->save();

          $payment = new Payment();
          $payment->order_id = $order->id;
          $payment->payment_type = $paymentType;
          $payment->save();

          $cartProducts = Cart::content();

          foreach ($cartProducts as $cartProduct){
              $orderDetail = new OrderDetail();
              $orderDetail->order_id = $order->id;
              $orderDetail->product_id = $cartProduct->id;
              $orderDetail->product_name = $cartProduct->name;
              $orderDetail->product_price = $cartProduct->price;
              $orderDetail->product_quantity = $cartProduct->qty;
              $orderDetail->save();
           }
//           $shippingId = Session::get('shippingId');
//               $shippingId = Shipping::find($shippingId);
//           $data = $shippingId->toArray();
//           Mail::send('admin.order.view-order-invoice', $data, function($message) use($data){
//               $message->to($data['email']);
//               $message->subject('congratulation Mail');
//           });
           Cart::destroy();

          return redirect('complete/order');

       }
       else if ($paymentType == 'paypal'){

       }
       else if($paymentType == 'bkash'){

       }
    }

    public function completeOrder(){
        return 'success';
    }

//    public function mail(){
//        $cartProducts = Cart::content();
//        return view('front.mail.mail',[
//            'carts' => $cartProducts
//        ]);
//    }
}
