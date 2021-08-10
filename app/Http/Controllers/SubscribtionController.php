<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Square\SquareClient;
use Square\LocationsApi;
use Square\Exceptions\ApiException;
use Square\Http\ApiResponse;
use Square\Models\ListLocationsResponse;
use Square\Environment;
use Illuminate\Support\Str;
use App\Models\Payment;
use App\Models\ProfileInformation;

class SubscribtionController extends Controller
{
    public function index(){
        $user = Auth::user()->information;
        $userInfo = ProfileInformation::where('user_id',Auth::user()->id)->first();
        return view('subscribtion.index')->with(['user' => $user,'userInfo'=>$userInfo]);
    }
    public function test(){
		
        $user = Auth::user()->information;
        
        
	
        return view('subscribtion.test')->with(['user'=>$user]);
    }
    
    public function paymentForm($type,$month){
		$amt = 0;
		if($type == 'premium'){
				if($month=='1')
				{
					$amt = 6.99;
					$subscription = 2;
				}
				else if($month=='6')
				{
					$amt=29.99;
					$subscription=2;
				}
				else if($month=='12')
				{
					$amt=54.99;
					$subscription=2;
				}

		}
		else if($type == 'gold'){
			if($month=='1')
				{
					$amt = 10.99;
					$subscription = 3;
				}
				else if($month=='6')
				{
					$amt=54.99;
					$subscription=3;
				}
				else if($month=='12')
				{
					$amt=99.99;
					$subscription=3;
				}

			
		}
		else if($type == 'mizar'){
			$amt = 1.99;
			$subscription = 1;
		}
		
		$user = Auth::user()->information;
        return view('subscribtion.test')->with(['user'=>$user,'amount'=>$amt,'subscription'=>$subscription]);
	}
    
    public function process($amt,$type){
		
	if($amt=='1.99')
		return redirect('https://checkout.square.site/merchant/AZWXBTNH2ABAM/checkout/5ZMBMNOXC3TLYGPUJ6TDPDJZ');
		else if($amt=='6.99')
		return redirect('https://checkout.square.site/merchant/AZWXBTNH2ABAM/checkout/5UC3GCA23WEOYMOYULXEE7XI');
		else if($amt=='29.99')
		return redirect('https://checkout.square.site/merchant/AZWXBTNH2ABAM/checkout/B55CET4ZU6KZMEV5ZZ65OXYV');
		else if($amt=='54.99'&& $type=2)
		return redirect('https://checkout.square.site/merchant/AZWXBTNH2ABAM/checkout/YW53ITUACMI3WHX7NWEDAK7L');
		else if($amt=='10.99')
		return redirect('https://checkout.square.site/merchant/AZWXBTNH2ABAM/checkout/X77QNW53QYTOKLBGZ7GHT5WD');
		else if($amt=='54.99' && $type==3)
		return redirect('https://checkout.square.site/merchant/AZWXBTNH2ABAM/checkout/JROYSM7UM2HTB7S434YQNDNE');
		else if($amt=='99.99')
		return redirect('https://checkout.square.site/merchant/AZWXBTNH2ABAM/checkout/V3HQFXEFWVC4EWY2KRJSFD2O');

	}
    
    public function savePaymentDetails(Request $request){
		//~ $res = Array ( 'response' => '{"payment":{"id":"H5784DWxqo3IPi3y10hd6V7NGsYZY","created_at":"2021-06-02T13:10:43.670Z","updated_at":"2021-06-02T13:10:43.859Z","amount_money":{"amount":100,"currency":"GBP"},"total_money":{"amount":100,"currency":"GBP"},"approved_money":{"amount":100,"currency":"GBP"},"status":"COMPLETED","delay_duration":"PT168H","delay_action":"CANCEL","delayed_until":"2021-06-09T13:10:43.670Z","source_type":"CARD","card_details":{"status":"CAPTURED","card":{"card_brand":"VISA","last_4":"1111","exp_month":12,"exp_year":2025,"fingerprint":"sq-1-b_hCN3NEIVfmJHXrSxYHTBv_KgEfM33lUFz9nbz2Z-vFELB3hGmGDzQejXACyNau3g","card_type":"CREDIT","bin":"411111"},"entry_method":"KEYED","cvv_status":"CVV_ACCEPTED","avs_status":"AVS_ACCEPTED","statement_description":"SQ *DEFAULT TEST ACCOUNT","card_payment_timeline":{"authorized_at":"2021-06-02T13:10:43.781Z","captured_at":"2021-06-02T13:10:43.859Z"}},"location_id":"WDX1WFYN7TBWD","order_id":"iNLaq2Qf4JiAy72IDL45UBZ1PA7YY","risk_evaluation":{"created_at":"2021-06-02T13:10:43.781Z","risk_level":"NORMAL"},"receipt_number":"H578","receipt_url":"https://squareupsandbox.com/receipt/preview/H5784DWxqo3IPi3y10hd6V7NGsYZY","version_token":"Qx7fIxPJTUJ0K0etevzmOtl7ejiISaYULzWxiMGfA3D6o"}}');
		//~ print_r(json_decode($res['response']));die;
		if(!empty($request->all())){
			
			$data = $request->all();
			$res = json_decode($data['response']);
			//~ print_r($res);die;
			$payment = new Payment;
			$payment->user_id = Auth::user()->id;
			$payment->payment_id = $res->payment->id;
			$payment->amount_money = $res->payment->amount_money->amount;
			$payment->subscription = $data['subscription'];
			$payment->currency = $res->payment->amount_money->currency;
			$payment->status = $res->payment->status;
			$payment->order_id = $res->payment->order_id;
			$payment->receipt_number = $res->payment->receipt_number;
			$payment->receipt_url = $res->payment->receipt_url;
			$payment->entry_method = $res->payment->card_details->entry_method;
			$payment->payment_created_at = $res->payment->created_at;
			$payment->payment_updated_at = $res->payment->updated_at;
			
			if($payment->save()){
				$updateSub = ProfileInformation::where('user_id',Auth::user()->id)->first();
				if(!empty($updateSub)){
					$updateSub->subscribtion = $data['subscription'];
					if($updateSub->save()){
						echo '1';
						die("error by me");
					}
				}
			}
			else{
				echo '0';
				die("error by me");
			}
		}
		else{
			echo '0';
			die("error by me");
		}
	}
    
}
