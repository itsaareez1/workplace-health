<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Braintree_ClientToken;
use Braintree_Configuration;
use Braintree_Transaction;

class PaymentsController extends Controller
{

    public function pay_now(Request $request)
    {

//        return $request->qty;

        try {
            if ($request->order_id == 0 || $request->cart_id == 0) {
                return redirect()->back()->with('error', 'You dont have more products for order first you must add product to cart.!');
            }
            $product_ids = '';
            $product_qty = '';
            if (isset($request->product_ids)) {

                for ($i = 0; $i < count($request->product_ids); $i++) {

                    if (empty($product_ids)) {
                        $product_ids = $request->product_ids[$i];
                        $product_qty = $request->qty[$i];
                    } else {
                        $product_ids = $product_ids . ',' . $request->product_ids[$i];
                        $product_qty = $product_qty . ',' . $request->qty[$i];
                    }
                }
            }

            $result = DB::table('orders')
                ->where('id', '=', $request->order_id)
                ->update([
                    'sub_total' => $request->sub_total,
                    'shipping_charges' => $request->shipping_charges,
                    'discount' => $request->discount,
                    'total' => $request->total,
                    'cart_id' => $request->cart_id,
                    'status' => 'Pending',
                    'name' => $request->name,
                    'contact' => $request->contact,
                    'address' => $request->address,
                    'product_id' => $product_ids,
                    'product_qty' => $product_qty,
                    'cc_name' => $request->firstName . ' ' . $request->lastName
                ]);

            DB::table('carts')->delete();


            if ($result) {

                error_reporting(0);
                Braintree_Configuration::environment('sandbox');
                Braintree_Configuration::merchantId('csys8wbds84q872h');
                Braintree_Configuration::publicKey('8by7zvn7dm223xkg');
                Braintree_Configuration::privateKey('1c5f27e19d1534e3b6401c5e137037b2');

                if (empty($_POST['payment_method_nonce'])) {
                    header('location: index.php');
                }

                $result = Braintree_Transaction::sale([
                    'amount' => $_POST['amount'],
                    'paymentMethodNonce' => $_POST['payment_method_nonce'],
                    'customer' => [
                        'firstName' => $_POST['firstName'],
                        'lastName' => $_POST['lastName'],
                    ],
                    'options' => [
                        'submitForSettlement' => true
                    ]
                ]);

                if ($result->success === true) {

                    DB::table('orders')
                        ->where('id', '=', $request->order_id)
                        ->update([
                            'is_payment' => 1,
                        ]);
                    return redirect()->back()->with('status', 'You have successfully orderd your product.!');

                } else {
                    return redirect()->back()->with('error', 'Something went wrong please check your giving information!');
                }

            } else {
                return redirect()->back()->with('error', 'something went wrong please try again later.');
            }

        } catch (Exception $ex) {
            return redirect()->back()->with('error', $ex->getMessage());
        }
    }

    public function token(Request $request)
    {
        Braintree_Configuration::environment('sandbox');
        Braintree_Configuration::merchantId('csys8wbds84q872h');
        Braintree_Configuration::publicKey('8by7zvn7dm223xkg');
        Braintree_Configuration::privateKey('1c5f27e19d1534e3b6401c5e137037b2');

        echo json_encode(Braintree_ClientToken::generate());
    }

    public function process(Request $request)
    {

        $payload = $request->input('payload', false);
        $nonce = $payload['nonce'];

        $status = Braintree_Transaction::sale([
            'amount' => '10.00',
            'paymentMethodNonce' => $nonce,
            'options' => [
                'submitForSettlement' => True
            ]
        ]);

        return response()->json($status);
    }
}