<?php
namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use App\Http\Controllers\Controller;
use Auth;
use Session;
use App\Models\User;
use App\Models\Product;
use App\Models\UserProduct;
use Hash;

class AuthController extends Controller{

    public function index(){
        return view("auth.login");
    }

    public function registation(){
        return view("auth.register");
    }

    public function login_action(Request $request){
        $request->validate([
            "email" => 'required',
            "password" => 'required'
        ]);
        
        $credentials = $request->only("email","password");
        if(Auth::attempt($credentials)){
            if(Auth::user()->role == 1){
                return redirect()->intended('/admin/dashboard')->withSuccess("Logged in successfully");
            }else{
                return redirect()->intended('dashboard')->withSuccess("Logged in successfully");
            }
            
        }else{
            return redirect("/email/verify-note")->withError("Please verify email");
        }
    }

    public function logout(){
        Session::flush();
        Auth::logout();
        return Redirect("login");
    }

    public function registation_create(Request $request){
        $request->validate([
            "name" => 'required',
            "email" => 'required|email|unique:users',
            "password" => 'required|min:8'
        ]);
        $request->merge([
            "password" => Hash::make($request->password)
        ]);
        $user = User::create($request->all());
        event(new Registered($user));
        auth()->login($user);
        return redirect("dashboard")->withSuccess("Register Success!");
    }
    
    public function dashboard(){
        return view("dashboard");
    }

    public function admin_dashboard(){
        $get_active_verified_user = User::whereNotNull("email_verified_at")->where("role",0)->count();
        $attached_active_products = User::whereNotNull("email_verified_at")->where("role",0)
        ->whereHas("user_products")->count();
        $products = Product::where("status",0)->count();
        $products_not_belongsto_user = Product::whereDoesntHave("user_products")->where("status",0)->count();
        $get_all_active_purchase_product_qty = UserProduct::with("product")->whereRelation("product","status",0)->sum('purchase_qty');
        $get_all_active_purchase_product_price = UserProduct::with("product")->whereRelation("product","status",0)->sum('total_amount');
        $get_all_active_products_per_user = User::withSum("user_products","total_amount")->whereNotNull("email_verified_at")->where("role",0)->get();
        $end_point_response = $this->api();
        
        return view("admin.dashboard",[
            "get_active_verified_user"=>$get_active_verified_user,
            "attached_active_products"=>$attached_active_products,
            "products" => $products,
            "products_not_belongsto_user" => $products_not_belongsto_user,
            "get_all_active_purchase_product_qty" => $get_all_active_purchase_product_qty,
            "get_all_active_purchase_product_price" => $get_all_active_purchase_product_price,
            "get_all_active_products_per_user" => $get_all_active_products_per_user,
            "end_point_response" => (array) json_decode($end_point_response,true)
        ]);
    }

    public function api(){
        //Get API ENDPOINT response 
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "http://api.exchangeratesapi.io/v1/latest?access_key=74c9efaa2fc2b417e2dd153bcc82ae97&format=1&symbols=USD,RON",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_TIMEOUT => 30000,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                // Set Here Your Requesred Headers
                'Content-Type: application/json',
            ),
        ));
        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);
        return $response;
    }
}
?>