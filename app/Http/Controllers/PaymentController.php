<?php

namespace App\Http\Controllers;


use App\Mail\OrderMail;
use App\PaymentSetting;
use App\PayuPayments;
use App\User;
use http\Client\Response;
use http\Env\Url;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use OpenPayU_Configuration;
use OpenPayU_Order;
use phpDocumentor\Reflection\DocBlock\Tags\Var_;

class PaymentController extends Controller
{
    public function payment(Request $request){
        $typeOfAdvert = $request->get('type');
        $user = Auth::user();
        $paymentSetting = PaymentSetting::where('type',$typeOfAdvert)->get();


        $result = PayuPayments::create([
            'user_id'=>$user->id,
            'id_advert'=>$request->get('id'),
            'payable_type'=>$typeOfAdvert,
            'firstname'=>$user->firstname,
            'surname'=>$user->surname,
            'company'=>$user->company,
            'nip'=>$user->nip,
            'street'=>$user->street,
            'postcode'=>$user->postcode,
            'city'=>$user->city,
            'state'=>$user->state,
            'email'=>$user->email,
            'amount'=>$paymentSetting[0]['price'],
            'status'=> 0 , // rozpoczęte
        ]);

        $order['continueUrl'] = url('/success'); //customer will be redirected to this page after successfull payment
        $order['notifyUrl'] = url('/');
        $order['customerIp'] = $_SERVER['REMOTE_ADDR'];
        $order['merchantPosId'] = OpenPayU_Configuration::getMerchantPosId();
        $order['description'] = $paymentSetting[0]['description'];
        $order['currencyCode'] = 'PLN';
        $order['totalAmount'] = $paymentSetting[0]['price']*100;
        $order['extOrderId'] = $result->id.time().time(); //must be unique!

        $order['products'][0]['name'] = $paymentSetting[0]['description'];
        $order['products'][0]['unitPrice'] = $paymentSetting[0]['price']*100;
        $order['products'][0]['quantity'] = 1;


        $response = OpenPayU_Order::create($order);


        $result->payable_id = $response->getResponse()->orderId;
       // $result->status = $response->getResponse()->status->statusCode;
        $result->save();

        $request->session()->put('key', $response->getResponse()->orderId);;

        header('Location:'.$response->getResponse()->redirectUri); //You must redirect your client to PayU payment summary page.
        return Redirect::to($response->getResponse()->redirectUri);

    }

    public function paymentResponse(Request $request){
        if(isset($request->all()['error'])){
            PayuPayments::where('payable_id','=',$request->session()->get('key'))->update(['status'=>'uncomplete']);
            return view('success')->with(['error'=>$request->all()['error']]);
        }
        else {
            if($request->user()->admin != 1){
            PayuPayments::where('payable_id', '=', $request->session()->get('key'))->update(['status' => 'SUCCESS']);
            $payuSetting = PayuPayments::where('payable_id', '=', $request->session()->get('key'));
            $invoice = new InvoiceController();
            $invoiceStream = $invoice->index($payuSetting);

            $adminEmail = User::where('admin','=',"1") -> first()->email;
            Mail::to($payuSetting->get()[0]->email)->send(new OrderMail($invoiceStream));

            Mail::to( $adminEmail)->send(new OrderMail($invoiceStream));

            return view('success')->with(['error' => 0]);
            }else {
                return view('success')->with(['error' => 0]);
            }

        }
    }
}
