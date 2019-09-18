<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Mailer;

class RouteController extends Controller
{
    //
    public function test()
    {
        return view('web.test');
    }

    public function welcome(Request $request)
    {

        $classes = DB::table('classes')
            ->select('classes.*')
            ->orderBy(DB::raw('RAND()'))
            ->take(10)
            ->get();

        $products = DB::table('products')
            ->select('products.*')
            ->where('type', '=', '1')
            ->orderBy(DB::raw('RAND()'))
            ->take(9)
            ->get();


        if ($request->session()->has('usr_id')) {

            $news = DB::table('news')
                ->select('news.*')
                ->orderBy(DB::raw('RAND()'))
                ->take(9)
                ->get();
        } else {
            $news = DB::table('news')
                ->select('news.*')
                ->where('type', '=', 'general')
                ->orderBy(DB::raw('RAND()'))
                ->take(9)
                ->get();
        }

        return view('welcome', ['products' => $products, 'classes' => $classes, 'news' => $news]);
    }

    public function index(Request $request)
    {
        if ($request->session()->has('userst')) {
            $products = DB::table('products')
                ->select('products.*')
                ->where('type', '=', '1')
                ->orderBy(DB::raw('RAND()'))
                ->take(9)
                ->get();

            $user = DB::table('users')->where('id', '=', $request->session()->get('usr_id'))->first();

            $news = DB::table('news')
                ->where('news.type', '=', 'specific')
                ->where('news.company_id', '=', $user->company_id)
                ->orderBy(DB::raw('RAND()'))
                ->take(9)
                ->get();


            /* $programs = DB::table('programs')
                      ->join('companies','companies.id','=','programs.company_id')
                      ->select('programs.name','programs.id')
                      ->where('programs.company_id','=', $user->company_id)->get(); */

            $programs = DB::table('programs')
                ->join('classes', 'programs.id', '=', 'classes.program_id')
                ->select('classes.*')->get();


            return view('web.index', [
                'products' => $products,
                'news' => $news,
                'programs' => $programs,
                'name' => cookie('name')
            ]);
        } else {
            return redirect('login');
        }

    }

    public function login()
    {
        return view('web.login');
    }

    public function signup()
    {
        $companies = DB::table('companies')->get();
        return view('web.signup', ['companies' => $companies]);
    }

    public function forgetpassword()
    {
        return view('web.forgetpassword');
    }

    public function loyaltyPoints(Request $request)
    {
        $user = DB::table('users')->where('id', '=', session('usr_id'))->first();

        $classes = DB::table('reserve_classes')
            ->join('classes', 'reserve_classes.class_id', '=', 'classes.id')
            ->where('reserve_classes.user_id', '=', session('usr_id'))
            ->select('classes.*')->get();

        return view('web.loyaltyPoints', [
            'user' => $user,
            'classes' => $classes
        ]);
    }

    public function program()
    {
        $user = DB::table('users')->where('id', '=', session('usr_id'))->first();

        /* $programs = DB::table('programs')->get(); */
        $programs = DB::table('programs')
            ->join('classes', 'programs.id', '=', 'classes.program_id')
            ->select('programs.name', 'programs.id');

        if ($user) {
            $programs = $programs->where('programs.company_id', '=', $user->company_id);
        }
        $programs = $programs->distinct()->get();

        $classes = DB::table('programs')
            ->join('classes', 'programs.id', '=', 'classes.program_id')
            ->select('programs.name', 'classes.*')->get();

        return view('web.program', ['programs' => $programs, 'classes' => $classes]);
    }

    public function store()
    {
        $products = DB::table('products')->where('type', '=', '1')->paginate(9);
        return view('web.store', ['products' => $products]);

    }

    public function contact()
    {
        $results = DB::table('contactinfo')->where('status', '=', '0')->first();
//        return ['result' => $results];

        return view('web.contact', ['result' => $results]);
    }

    public function singleprogram(Request $request)
    {
        $class = DB::table('classes')
            ->join('categories', 'categories.id', '=', 'classes.category_id')
            ->select('classes.*', 'categories.name as category')
            ->where('classes.id', '=', $request->id)->first();


        $class_session_deatil = DB::table('sessions')
            ->where('class_id', '=', $request->id)
            ->get();

//        return ['class' => $class];

        $is_class_reserve = '';
        if ($request->session()->has('usr_id')) {
            $is_class_reserve = DB::table('users')
                ->join('reserve_classes', 'users.id', '=', 'reserve_classes.user_id')
                ->where('reserve_classes.class_id', '=', $class->id)
                ->first();
        }
//        return ['is_class_reserve' => $is_class_reserve];

//        return ['class_session_deatil' => $class_session_deatil];

        return view('web.singleprogram', ['class' => $class], ['is_class_reserve' => $is_class_reserve])->with(['class_session_deatil' => $class_session_deatil]);
    }

    public function singleclass()
    {
        return view('web.singleclass');
    }

    public function viewItem(Request $request)
    {
        $product = DB::table('products')
            ->where('id', '=', $request->id)->first();

        return view('web.viewItem', ['product' => $product, 'id' => $request->id]);

    }

    public function viewGift(Request $request)
    {
        $product = DB::table('products')
            ->where('id', '=', $request->id)->first();

        return view('web.viewGift', ['product' => $product, 'id' => $request->id]);
    }

    public function loyalty()
    {
        $products = DB::table('products')->where('type', '=', '0')->paginate(9);
        $coupons = DB::table('coupons')
            ->join('products', 'products.id', '=', 'coupons.product')
            ->where('coupons.product', '>', '0')
            ->where('coupons.state', '=', '1')
            ->select('coupons.*', 'products.name as product_name', 'products.img as img')
            ->get();


        $vouchers = DB::table('vouchers')
            ->where('state', '=', '1')
            ->get();

//        return ['vouchers' => $vouchers];
        return view('web.loyalty', [
            'products' => $products,
            'coupons' => $coupons,
            'vouchers' => $vouchers
        ]);

    }

    public function gifts()
    {
        $products = DB::table('products')->where('type', '=', '0')->paginate(9);
        return view('web.gifts', ['products' => $products]);
    }

    public function terms()
    {
        return view('web.terms');
    }

    public function myOrder()
    {

        $results = DB::table('orders')
            ->join('users', 'users.id', '=', 'orders.user_id')
            ->where('orders.user_id', '=', session('usr_id'))
            ->where('orders.status', '!=', 'started')
            ->select('orders.*', 'users.name as user_name')
            ->get();

        return view('web.myOrder', ['results' => $results]);

    }

    public function history()
    {
        $classes = DB::table('reserve_classes')
            ->join('classes', 'classes.id', '=', 'reserve_classes.class_id')
            ->where('reserve_classes.user_id', '=', session('usr_id'))
            ->select('classes.*', 'reserve_classes.created_at as reserve_time')
            ->get();

//        $classes = DB::table('reserve_classes')
//            ->join('classes', 'classes.id', '=', 'reserve_classes.class_id')
//            ->where('reserve_classes.user_id', '=', session('usr_id'))
//            ->select('classes.*', 'reserve_classes.created_at as reserve_time', 'reserve_classes.QRpassword')
//            ->get();

        $results = DB::table('orders')
//            ->join('products', 'products.id', '=', 'reserve_classes.class_id')
            ->where('user_id', '=', session('usr_id'))
            ->get();

        return view('web.history', [
            'classes' => $classes,
            'results' => $results
        ]);

    }

    public function help()
    {

        $results = DB::table('faqs')->get();

        return view('web.help', ['results' => $results]);

    }

    public function changepass()
    {
        return view('web.changepass');

    }

    public function buyCredits()
    {
        return view('web.buyCredits');

    }

    public function accountDetails()
    {
        return view('web.accountDetails');

    }

    public function editProfile()
    {
        $user = DB::table('users')->where('id', '=', session('usr_id'))->first();
//        return $user;

        return view('web.editProfile', ['user' => $user]);

    }

    public function resetpassword()
    {
        $chk_user = DB::table('users')
            ->where('otp_code', '=', $_GET['OTP'])
            ->where('email', '=', $_GET['email'])
            ->first();
        if ($chk_user) {
            return view('web.resetpassword');
        }

        return redirect()->back()->with('error', 'Sorry: Your OTP code is not correct.!');
    }

    public function verifyAccount1()
    {
        return view('web.verifyAccount1');
    }

    public function verifyPass()
    {
        $chk_user = DB::table('users')->where('email', '=', $_GET['email'])->first();

        if ($chk_user) {
            $digits = 7;
            $otp_code = rand(pow(10, $digits - 1), pow(10, $digits) - 1);
            $to_mail = $_GET['email'];
            $subject = 'Forgot password';
            $body = 'Your OTP Code is ' . $otp_code;
            $mailer_obj = new  Mailer();

            $result = $mailer_obj->SEND_MAIL($to_mail, $subject, $body);
            if ($result) {

                DB::table('users')->where('id', '=', $chk_user->id)->update([
                    'otp_code' => $otp_code
                ]);

                return view('web.verifyPass');
            }
        }
        return redirect()->back()->with('error', 'Sorry: Your information is not correct.!');

    }

    public function attendance_calendar()
    {

//        $results = DB::table('attendance')
//            ->join('classes', 'classes.id', '=', 'attendance.class_id')
//            ->where('user_id', '=', session('usr_id'))
//            ->select('classes.*', 'attendance.user_id', 'attendance.current_date', 'attendance.loyalty_points')
//            ->get();


        $results = DB::table('reserve_classes')
            ->join('classes', 'classes.id', '=', 'reserve_classes.class_id')
            ->join('sessions', 'sessions.class_id', '=', 'reserve_classes.class_id')
//            ->join('attendance', 'attendance.class_id', '=', 'reserve_classes.class_id')
            ->leftjoin('attendance', 'attendance.current_date', '=', 'sessions.date')
            ->where('reserve_classes.user_id', '=', session('usr_id'))
            ->select('classes.*', 'attendance.user_id', 'attendance.current_date', 'attendance.loyalty_points', 'sessions.date')
//            ->select('sessions.*','attendance.current_date')
            ->get();

//        return ['$sessions_results' => $sessions_results];
//        return ['results' => $results];

        return view('web.calendar', [
            'results' => $results
        ]);
    }

    public function verifyAccount2()
    {
        return view('web.verifyAccount2');
    }

    public function paymentMethod()
    {
        return view('web.paymentMethod');
    }

    public function adminLogin()
    {
        return view('web.admin.login');
    }

    public function adminForgetPassword()
    {
        return view('web.admin.forgetpassword');
    }

    public function adminDashboard()
    {
        return view('web.admin.dashboard');
    }

    public function addCompany()
    {
        $results = DB::table('districts')->get();

        return view('web.admin.addCompany', ['results' => $results]);
    }

    public function addDistrict()
    {
        return view('web.admin.addDistrict');
    }

    public function addCategory()
    {
        return view('web.admin.addCategory');
    }

    public function addcoupon()
    {
        $products = DB::table('products')->get();

        return view('web.admin.addCoupon', [
            'products' => $products
        ]);

    }

    public function addVoucher()
    {
        return view('web.admin.addVoucher');
    }

    public function addProduct()
    {
        return view('web.admin.addProduct');
    }

    public function addPointProduct()
    {
        return view('web.admin.addPointProduct');
    }

    public function addClass()
    {
        $companies = DB::table('companies')->get();
        $results = DB::table('categories')->get();
        $programs = DB::table('programs')->get();

        return view('web.admin.addClass', [
            'results' => $results,
            'companies' => $companies,
            'programs' => $programs
        ]);
    }


    public function program_thgh_companies(Request $request)
    {
//        return $request->company_id;
        $programs = DB::table('programs')->get();
        $company_id = $request->company_id;

        $html = '<option disabled selected>Select One!</option>';

        foreach ($programs as $program) {
            if ($program->company_id == $company_id) {
                $html .= '<option value="' . $program->id . '">' . $program->name . '</option>';
            }
        }

        return response()->json(array('CODE' => '1', 'html' => $html), 200);
//        return $html;
//        return view('web.admin.addClass', [
//            'programs' => $programs
//        ]);
    }

    public function addFAQ()
    {
        return view('web.admin.addFAQ');
    }

    public function addContactinfo()
    {
        return view('web.admin.addContactinfo');
    }

    public function addProgram()
    {
        $companies = DB::table('companies')->get();
        return view('web.admin.addProgram', ['companies' => $companies]);
    }

    public function manageCompany()
    {
        $results = DB::table('companies')
            ->join('districts', 'companies.district_id', '=', 'districts.id')
            ->select('companies.*', 'districts.name as district')
            ->where('companies.status', '!=', 1)
            ->paginate(10);

        return view('web.admin.manageCompany', ['results' => $results]);
    }

    public function manageOrders()
    {
        $results = DB::table('orders')
            ->join('users', 'users.id', '=', 'orders.user_id')
            ->where('orders.status', '!=', 'started')
            ->select('orders.*', 'users.name as user_name')
            ->paginate(10);

        DB::table('orders')
            ->update(['is_read' => 1]);

        return view('web.admin.manageOrders', ['results' => $results]);
    }

    public function manageUsers()
    {
        $results = DB::table('users')
            ->orderBy('id', 'desc')
            ->paginate(10);

        return view('web.admin.manageUsers', ['results' => $results]);
    }

    public function detailUsers($id)
    {
        $results = DB::table('users')
            ->join('companies', 'companies.id', '=', 'users.company_id')
            ->where('users.id', '=', $id)
            ->select('users.*', 'companies.name as company_name')
            ->first();

//        return ['results' => $results];

        return view('web.admin.detailUser', ['results' => $results]);
    }


    public function detailOrders($id)
    {
        $results = DB::table('orders')
            ->where('id', '=', $id)
            ->first();

        $product_ids = explode(",", $results->product_id);
        $products = DB::table('products')
            ->whereIn('id', $product_ids)
            ->get();
//        return $product_ids ;
//        return ['results' => $results];

//        return ['products' => $products];

        return view('web.admin.detailOrders', [
            'results' => $results,
            'products' => $products
        ]);
    }


    public function detailSession($id)
    {
        $results = DB::table('sessions')
            ->join('classes', 'classes.id', '=', 'sessions.class_id')
            ->where('sessions.class_id', '=', $id)
            ->select('sessions.*')
            ->get();

//        return ['results' => $results];

        return view('web.admin.detailSessions', ['results' => $results]);
    }


    public function manageReservedClasses($id)
    {
        $results = DB::table('reserve_classes')
            ->join('classes', 'classes.id', '=', 'reserve_classes.class_id')
            ->join('users', 'users.id', '=', 'reserve_classes.user_id')
            ->select('classes.name as class_name', 'users.name as user_name', 'users.email as user_email', 'reserve_classes.*')
            ->where('reserve_classes.user_id', '=', $id)
            ->orderBy('reserve_classes.id', 'desc')
            ->paginate(10);

//        return ['results' => $results];


        return view('web.admin.manageReservedClasses', ['results' => $results]);
    }

    public function manageCategory()
    {
        $results = DB::table('categories')
            ->where('categories.status', '!=', 1)
            ->paginate(10);

        return view('web.admin.manageCategories', ['results' => $results]);
    }

    public function manageClass()
    {
        $results = DB::table('classes')
            ->where('classes.is_delete', '!=', 1)
            ->paginate(10);

        return view('web.admin.manageClasses', ['results' => $results]);
    }

    public function manageProduct()
    {
        $results = DB::table('products')
            ->where('products.status', '!=', 1)
            ->paginate(10);

        return view('web.admin.manageProducts', ['results' => $results]);
    }

    public function manageNews()
    {
        $results = DB::table('news')
            ->leftjoin('companies', 'companies.id', '=', 'news.company_id')
            ->where('news.status', '!=', 1)
            ->select('news.*', 'companies.name as company_name')
            ->paginate(10);

        return view('web.admin.manageNews', ['results' => $results]);
    }

    public function manageProgram()
    {
        $results = DB::table('programs')
            ->join('companies', 'companies.id', '=', 'programs.company_id')
            ->where('programs.status', '!=', 1)
            ->select('programs.*', 'companies.name as company_name')
            ->paginate(10);

        return view('web.admin.manageProgram', ['results' => $results]);
    }

    public function manageDistricts()
    {
        $results = DB::table('districts')
            ->where('status', '!=', 1)
            ->paginate(10);
        return view('web.admin.manageDistricts', ['results' => $results]);
    }

    public function manageCoupons()
    {
        $results = DB::table('coupons')
            ->where('status', '!=', 1)
            ->paginate(10);

        return view('web.admin.manageCoupons', ['results' => $results]);
    }

    public function manageVouchers()
    {
        $results = DB::table('vouchers')
            ->where('status', '!=', 1)
            ->paginate(10);

        return view('web.admin.manageVouchers', ['results' => $results]);
    }

    public function manageFAQs()
    {
        $results = DB::table('faqs')
            ->where('status', '!=', 1)
            ->paginate(10);

        return view('web.admin.manageFAQS', ['results' => $results]);
    }

    public function manageContactinfo()
    {
        $results = DB::table('contactinfo')
            ->where('status', '!=', 1)
            ->paginate(10);

        return view('web.admin.manageContactinfo', ['results' => $results]);
    }

    public function addNews()
    {
        $companies = DB::table('companies')->get();
        return view('web.admin.addNews', ['companies' => $companies]);
    }

    public function inbox()
    {
        $messages = DB::table('contactus')
            ->orderBy('id', 'asc')
            ->where('status', '!=', 1)
            ->paginate(10);
        return view('web.admin.manageInbox', ['results' => $messages]);
    }

    public function checkCoupon(Request $request)
    {
        $check = DB::table('coupons')->where('code', '=', $request->code)
            ->where('state', '=', 1)
            ->whereIn('product', $request->product_ids)
            ->first();

//        foreach ($request->product_ids as $product_ids) {
//            return $product_ids;
//        }
//        return $check->id;

        if (!empty($check)) {
            DB::table('orders')
                ->where('user_id', '=', session('usr_id'))
                ->where('status', '=', 'started')->update(['discount' => $check->price]);
            return redirect('cart/' . $check->id)->with('status', 'verified');

        }
        return redirect('cart')->with('status', 'unverified');

    }

    public function cart(Request $request)
    {
        $products = DB::table('orders')
            ->join('carts', 'orders.id', '=', 'carts.order_id')
            ->join('products', 'products.id', '=', 'carts.product_id')
            ->where('orders.user_id', '=', session('usr_id'))
            ->select('carts.*', 'orders.*', 'products.*', 'carts.id as cart_id')
            ->get();
//        return $products;


        $order = DB::table('orders')->where('user_id', '=', session('usr_id'))->where('status', '=', 'started')->first();
        $subtotal = 0;
        $product_ids = '';
        if ($products) {
            foreach ($products as $product) {
                if (empty($product_ids)) {
                    $product_ids = $product->id;
                } else {
                    $product_ids = $product_ids . ',' . $product->id;
                }
                $subtotal += $product->price;
                $subtotal *= $product->quantity;
            }
        }
        $total = $subtotal;
        if (!empty($order->discount)) {
            if ($order->discount > $total) {
                $total = 0;
            } else {
                $total = $total - $order->discount;
            }
        }


        $shipping = 5;

        if ($total >= 120) {
            $shipping = 0;
        }

        $total = $total + $shipping;

        if (!empty($request->id)) {

            $coup = DB::table('coupons')->where('id', '=', $request->id)->first();


            return view('web.cart', [
                'product_ids' => $product_ids,
                'products' => $products,
                'subtotal' => $subtotal,
                'total' => $total,
                'coup' => $coup,
                'order' => $order,
                'shipping' => $shipping
            ]);

        }
        return view('web.cart', [
            'product_ids' => $product_ids,
            'products' => $products,
            'subtotal' => $subtotal,
            'total' => $total,
            'order' => $order,
            'shipping' => $shipping
        ]);
    }

    public function adminEditProfile()
    {
        $id = session()->get('admin_id');
        $results = DB::table('admins')
            ->where('id', '=', $id)
            ->first();

        return view('web.admin.editProfile', ['results' => $results]);
    }

    public function editProgram($id)
    {
        $companies = DB::table('companies')->get();
        $program_detail = DB::table('programs')
            ->where('id', '=', $id)
            ->first();

        return view('web.admin.editProgram', [
            'program_detail' => $program_detail,
            'companies' => $companies
        ]);
    }

    public function editCategory($id)
    {
        $category_detail = DB::table('categories')
            ->where('id', '=', $id)
            ->first();

        return view('web.admin.editCategory', ['category_detail' => $category_detail]);
    }

    public function editCompany($id)
    {
        $results = DB::table('districts')->get();

        $company_detail = DB::table('companies')
            ->where('id', '=', $id)
            ->first();

        return view('web.admin.editCompany', ['results' => $results], ['company_detail' => $company_detail]);
    }

    public function editProduct($id)
    {
        $product_detail = DB::table('products')
            ->where('id', '=', $id)
            ->first();
//        return ['product_detail' => $product_detail];

        return view('web.admin.editProduct', ['product_detail' => $product_detail]);
    }

    public function editClass($id)
    {

        $companies = DB::table('companies')->get();

        $class_detail = DB::table('classes')
            ->where('id', '=', $id)
            ->first();

        $class_session_deatil = DB::table('sessions')
            ->where('class_id', '=', $id)
            ->get();

        $results = DB::table('categories')->get();
        $programs = DB::table('programs')->get();

        return view('web.admin.editClass', [
            'results' => $results,
            'programs' => $programs,
            'companies' => $companies,
            'class_detail' => $class_detail,
            'class_session_deatil' => $class_session_deatil
        ]);

    }

    public function editNews($id)
    {
        $news_detail = DB::table('news')
            ->where('id', '=', $id)
            ->first();

        $companies = DB::table('companies')->get();

        return view('web.admin.editNews', [
            'companies' => $companies,
            'news_detail' => $news_detail
        ]);

    }

    public function editDistrict($id)
    {
        $district_detail = DB::table('districts')
            ->where('id', '=', $id)
            ->first();

        return view('web.admin.editDistrict', [
            'district_detail' => $district_detail
        ]);

    }

    public function editCoupon($id)
    {
        $products = DB::table('products')->get();

        $coupons_detail = DB::table('coupons')
            ->where('id', '=', $id)
            ->first();

        return view('web.admin.editCoupon', [
            'coupons_detail' => $coupons_detail,
            'products' => $products
        ]);

    }

    public function editVoucher($id)
    {
        $vouchers_detail = DB::table('vouchers')
            ->where('id', '=', $id)
            ->first();

        return view('web.admin.editVoucher', [
            'vouchers_detail' => $vouchers_detail
        ]);

    }

    public function editFaqs($id)
    {
        $faqs_detail = DB::table('faqs')
            ->where('id', '=', $id)
            ->first();

        return view('web.admin.editFAQ', [
            'faqs_detail' => $faqs_detail
        ]);

    }

    public function editContactinfo($id)
    {
        $contactinfo_detail = DB::table('contactinfo')
            ->where('id', '=', $id)
            ->first();

        return view('web.admin.editContactinfo', [
            'contactinfo_detail' => $contactinfo_detail
        ]);

    }

    public function paymentForm()
    {
        return view('payment');
    }
}
