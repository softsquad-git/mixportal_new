<?php

namespace App\Http\Controllers;

use App\PaymentSetting;
use Illuminate\Http\Request;
use LaravelDaily\Invoices\Invoice;
//use LaravelDaily\Invoices\Classes\Buyer;
use LaravelDaily\Invoices\Classes\Buyer;
use LaravelDaily\Invoices\Classes\InvoiceItem;



class InvoiceController extends Controller
{
    public function index($pay){
        $pay = $pay->get()[0];
       // die(var_dump($pay->payable_type));
        $customer = new Buyer([
            'name'          => $pay->company." ".$pay->firstname." ".$pay->surname,
            'address'       => $pay->street,
            'code'          =>$pay->postcode.' '.$pay->city,
            'vat'           =>$pay->nip,
            'custom_fields' => [

            ],
        ]);

        $itemName = PaymentSetting::where('type','=',$pay->payable_type)->get()[0];
        //die(var_dump($itemName));
        $item = (new InvoiceItem())->title($itemName->description)->pricePerUnit($itemName->price);

        $invoice = Invoice::make()
            ->sequence($pay->id)
            ->serialNumberFormat('FS/{SEQUENCE}/'.date('m').'/'.date('Y'))
            ->buyer($customer)
            ->taxRate(0)
            ->addItem($item);

        return $invoice->stream();
    }
}
