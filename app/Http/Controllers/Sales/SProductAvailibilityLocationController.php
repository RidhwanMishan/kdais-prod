<?php

namespace App\Http\Controllers\Sales;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SProductAvailibilityLocationController extends Controller {

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
            $powerBiEmail = $result[0]['power_bi_email'];
            $landingPage = $result[0]['landing_page'];

            $sales_product_availibility = 4;
            $s_product_availibility = DB::table('role_user')->where('user_id', $userID)->where('role_id', $sales_product_availibility)->first();
            $roles = DB::table('role_user')->where('user_id', $userID)->get()->pluck('role_id');

            $sales_access = ($roles->contains(3)) || ($roles->contains(4)); 

            $dealer_access = false;
            $product_access = false;
            $business_report_access = true;
            $validation_access = true;

            $get_roles = DB::table('role_user')->where('user_id', $userID)->get();
            foreach($get_roles as $role) {

                if ($role->role_id == 3) {
                    $dealer_access = true;
                }

                if ($role->role_id == 4) {
                    $product_access = true;
                }

            }

            $security_roles = DB::connection()->select("SELECT name FROM laravel_khind_production.role_user inner join laravel_khind_production.roles
            on laravel_khind_production.role_user.role_id = laravel_khind_production.roles.id
            where user_id = $userID and is_security = 1;");

            $security_roles_clean = array();
            
            foreach($security_roles as $role) {

                array_push($security_roles_clean,$role->name);

            }

            if(empty($security_roles_clean)){

                $security_roles_clean = array('Johor Security', 'Kedah Security', 'Kelantan Security', 'WP Kuala Lumpur Security', 'WP Labuan Security', 'Melaka Security', 'Negeri Sembilan Security', 'Pahang Security', 'Perak Security', 'Perlis Security', 'Pulau Pinang Security', 'WP Putrajaya Security', 'Sabah Security', 'Sarawak Security', 'Selangor Security', 'Terengganu Security');

            }

            if($s_product_availibility) {
                return view('sales.product_availibility_location', ['sales_access'=>$sales_access, 'business_report_access'=>$business_report_access, 'dealer_access'=>$dealer_access, 'product_access'=>$product_access, 'validation_access'=>$validation_access, 'userName'=>$viewData['userName'], 'userID'=>$userID, 'powerBiEmail'=>$powerBiEmail, 'security_roles_clean'=>$security_roles_clean, 'sales_product'=>true, 'product3'=>true]);
            } else {
                return redirect()->route($landingPage);
            }

        }
        return redirect()->route('main');

    }

}
