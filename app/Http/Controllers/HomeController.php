<?php

namespace App\Http\Controllers;

use App\Product;
use App\Purchase;
use App\PurchaseStatus;
use App\Sale;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index()
    {

        $statusreceived_id = PurchaseStatus::where('purchaseStatusName','=','RECIBIDA')->first()->id;
        $purchasequantity = count(Purchase::all());
        $purchasereceived = count(Purchase::where('purchaseStatus_id','=',$statusreceived_id)->get());

        if($purchasequantity>0)
        {
            $purchasepercent = round(($purchasereceived/$purchasequantity) * 100,0);
        }
        else{
            $purchasepercent = 0;
        }


        $productlowquantity = count(Product::where('productQuantity','<',10)->get());
        $productquantity = count(Product::all());

        if($productlowquantity>0)
        {
            $productpercent = round(($productlowquantity/$productquantity)*100,0);
        }
        else
        {
            $productpercent=0;
        }


        $mostrecentsales = Sale::latest()->paginate(5);


        return view('index',[

                'purchasequantity' => $purchasequantity,

                'purchasereceived' => $purchasereceived,

                'purchasepercent' => $purchasepercent,

                'productlowquantity' => $productlowquantity,

                'productquantity' => $productquantity,

                'productpercent' => $productpercent,

                'mostrecentsales' => $mostrecentsales

            ]);
    }
}
