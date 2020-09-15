<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Xendit\Balance;
use Xendit\Cards;
use Xendit\Xendit;

class XenditController extends Controller
{
    private $initXendit;

    public function __construct()
    {
        $this->initXendit = $this->initXenditPaymentGateway();
    }

    public function getBalance(){
        return response()->json([
            'data' => Balance::getBalance('CASH')
        ], 200);
    }

    public function createCharge(){
        $params = [
            'token_id' => '5e2e8231d97c174c58bcf644',
            'external_id' => 'card_' . time(),
            'authentication_id' => '5e2e8658bae82e4d54d764c0',
            'amount' => 100000,
            'card_cvn' => '123',
            'capture' => false
        ];

        return response()->json([
            'data' => Cards::create($params)
        ]);
    }
}
