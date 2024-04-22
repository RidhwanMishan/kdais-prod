<?php

namespace App\Http\Controllers\Sales;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\TokenStore\TokenCache;

class SDealerController extends Controller {

    public function __construct() { }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __invoke() {

        $viewData = $this->loadViewData();

        if ($viewData) {

            $users = DB::table('users')->where('power_bi_email', $viewData['userEmail'])->get();
            $result = json_decode($users, true);
            $userID = $result[0]['id'];
            $landingPage = $result[0]['landing_page'];

            $sales_dealer = 3;
            $s_dealer = DB::table('role_user')->where('user_id', $userID)->where('role_id', $sales_dealer)->first();
            $roles = DB::table('role_user')->where('user_id', $userID)->get()->pluck('role_id');

            $sales_access = ($roles->contains(3)) || ($roles->contains(4));

            $dealer_access = false;
            $product_access = false;
            $business_report_access = true;

            $get_roles = DB::table('role_user')->where('user_id', $userID)->get();
            foreach($get_roles as $role) {

                if ($role->role_id == 3) {
                    $dealer_access = true;
                }

                if ($role->role_id == 4) {
                    $product_access = true;
                }

            }
            
            if($s_dealer) {
                return view('sales.dealer', ['sales_access'=>$sales_access, 'business_report_access'=>$business_report_access, 'dealer_access'=>$dealer_access, 'product_access'=>$product_access, 'userName'=>$viewData['userName'], 'userID'=>$userID, 'sales'=>true, 'dealer'=>true]);
            } else {
                return redirect()->route($landingPage);
            }

        }
        return redirect()->route('main');

    }

}
