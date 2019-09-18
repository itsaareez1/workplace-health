<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class AdminController extends Controller
{
    //
    public function login(Request $request)
    {

        $request->validate([
            'email' => 'required|max:191',
            'password' => 'required|min:6'
        ]);

        $results = DB::table('admins')
            ->where('email', $request->email)
            ->where('password', md5($request->password))->first();


        if ($results != null) {
            session(['adminst' => 'logged', 'name' => $results->name, 'admin_id' => $results->id]);

            return redirect('wh-dashboard');
        } else {
            return redirect('wh-admin')->with('status', 'Username or password is wrong.');
        }
    }

    public function addcoupon(Request $request)
    {

        if ($request->session()->has('admin_id')) {
            $request->validate([
                'title' => 'required|max:50',
                'code' => 'required|max:10',
                'state' => 'required',
                'price' => 'required',
                'points' => 'required',
                'product' => 'required'
            ]);

            DB::table('coupons')->insert([
                'title' => $request->title,
                'code' => $request->code,
                'price' => $request->price,
                'state' => $request->state,
                'points' => $request->points,
                'product' => $request->product,
                'admin_id' => session('admin_id')
            ]);

            return redirect('wh-coupon')->with('status', 'Coupon created successfully.');
        } else {

            return redirect('wh-admin');
        }
    }

    public function addDistricts(Request $request)
    {
        if ($request->session()->has('admin_id')) {

            $request->validate([
                'name' => 'required|max:100'
            ]);

            DB::table('districts')->insert([
                'name' => $request->name,
                'admin_id' => session('admin_id')
            ]);

            return redirect('wh-addDistrict')->with('status', 'District added successfully.');

        } else {

            return redirect('wh-admin');
        }

    }

    public function addFaqs(Request $request)
    {
        if ($request->session()->has('admin_id')) {

            $request->validate([
                'question' => 'required|max:300',
                'answer' => 'required|max:1000'
            ]);

            DB::table('faqs')->insert([
                'questions' => $request->question,
                'answer' => $request->answer,
                'admin_id' => session('admin_id')
            ]);

            return redirect('admin/faqs')->with('status', 'FAQ added successfully.');
        } else {

            return redirect('admin-login');
        }


    }

    public function addNews(Request $request)
    {
        if ($request->session()->has('admin_id')) {


            $request->validate([
                'type' => 'required',
                'title' => 'required|max:100',
                'image' => 'required',
                'image.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:10008',
                'description' => 'required|max:1500',
            ]);

            if (isset($_FILES["image"]["name"]) && !empty($_FILES["image"]["name"])) {
                $image = $request->file('image')->store('news', 'public');
            } else {
                return redirect('wh-product')->with('status', 'News Image is required.');
            }

            $type = "";
            if ($request->type == 2) {
                $type = "specific";

                DB::table('news')->insert([
                    'type' => $type,
                    'title' => $request->title,
                    'img' => $image,
                    'company_id' => $request->company,
                    'description' => $request->description,
                    'admin_id' => session('admin_id')
                ]);

            } else {
                $type = "general";
                DB::table('news')->insert([
                    'type' => $type,
                    'title' => $request->title,
                    'img' => $image,
                    'description' => $request->description,
                    'admin_id' => session('admin_id')
                ]);

            }

            return redirect('wh-addNews')->with('status', 'News added successfully.');

        } else {

            return redirect('wh-admin');
        }


    }

    public function addProducts(Request $request)
    {
        if ($request->session()->has('admin_id')) {
            $request->validate([
                'name' => 'required|max:100',
                'image' => 'required',
                'image.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'description' => 'required|max:500',
                'price' => 'max:5',
                'specs' => 'required|max:1500',
                'type' => 'required|max:50',
                'points' => 'max:3'
            ]);


            if (isset($_FILES["image"]["name"]) && !empty($_FILES["image"]["name"])) {
                $image = $request->file('image')->store('products', 'public');
            } else {
                return redirect('wh-product')->with('status', 'Product Image is required.');
            }

            DB::table('products')->insert([
                'name' => $request->name,
                'img' => $image,
                'description' => $request->description,
                'price' => $request->price,
                'specification' => $request->specs,
                'type' => $request->type,
                'points' => $request->points,
                'state' => $request->state,
                'admin_id' => session('admin_id')
            ]);

            return redirect('wh-product')->with('status', 'Product created successfully.');

        } else {

            return redirect('wh-admin');
        }


    }


    public function addPointProducts(Request $request)
    {
        if ($request->session()->has('admin_id')) {
            $request->validate([
                'title' => 'required|max:100',
                'image' => 'required',
                'image.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'type' => 'required|max:50',
                'code' => 'required|max:50',
            ]);


            if (isset($_FILES["image"]["name"]) && !empty($_FILES["image"]["name"])) {
                $image = $request->file('image')->store('pointproducts', 'public');
            } else {
                return redirect('wh-point-product')->with('status', 'Product Image is required.');
            }

            DB::table('pointproducts')->insert([
                'title' => $request->title,
                'code' => $request->code,
                'type' => $request->type,
                'img' => $image,
            ]);

            return redirect('wh-point-product')->with('status', 'Point Product created successfully.');

        } else {

            return redirect('wh-admin');
        }


    }

    public function updateProfile(Request $request)
    {
        if ($request->session()->has('admin_id')) {
            $request->validate([
                'name' => 'required|max:100'
            ]);

            if (!empty($request->password)) {

                if ($request->password == $request->confm_pwd) {
                    DB::table('admins')
                        ->where('id', '=', $request->update_id)
                        ->update(['name' => $request->name, 'password' => md5($request->password)]);
                } else {
                    return redirect('wh-editProfile')->with('status', 'Password do not matched.');
                }

            } else {
                DB::table('admins')
                    ->where('id', '=', $request->update_id)
                    ->update(['name' => $request->name]);
            }

            return redirect('wh-editProfile')->with('status', 'Profile updated successfully.');

        } else {
            return redirect('wh-admin');
        }

    }

    public function updateProduct(Request $request)
    {

        if ($request->session()->has('admin_id')) {
            $request->validate([
                'name' => 'required|max:100',
                'description' => 'required|max:500',
                'price' => 'max:5',
                'specs' => 'required|max:1500',
                'type' => 'required|max:50',
                'points' => 'max:3'
            ]);


            $image = $request->existing_img;
            if (isset($_FILES["image"]["name"]) && !empty($_FILES["image"]["name"])) {
                $image = $request->file('image')->store('products', 'public');
                $target_dir = public_path() . '/storage/';
                unlink($target_dir . $request->existing_img);
            }


            DB::table('products')
                ->where('id', '=', $request->update_id)
                ->update(['name' => $request->name, 'description' => $request->description, 'price' => $request->price, 'img' => $image,
                    'specification' => $request->specs, 'type' => $request->type, 'points' => $request->points,
                    'state' => $request->state, 'admin_id' => session('admin_id')]);

            return redirect('wh-editProduct/' . $request->update_id)->with('status', 'Product updated successfully.');

        } else {

            return redirect('wh-admin');
        }


    }

    public function updateNews(Request $request)
    {
        if ($request->session()->has('admin_id')) {


            $request->validate([
                'type' => 'required',
                'title' => 'required|max:100',
                'description' => 'required|max:1500',
            ]);


            $image = $request->existing_img;
            if (isset($_FILES["image"]["name"]) && !empty($_FILES["image"]["name"])) {
                $image = $request->file('image')->store('news', 'public');
                $target_dir = public_path() . '/storage/';
//                unlink($target_dir . $request->existing_img);
            }

            $type = "general";
            if ($request->type == 2) {
                $type = "specific";
            }

            DB::table('news')
                ->where('id', '=', $request->update_id)
                ->update([
                    'type' => $type,
                    'title' => $request->title,
                    'img' => $image,
                    'company_id' => $request->company,
                    'description' => $request->description,
                    'admin_id' => session('admin_id')
                ]);

            return redirect('wh-editNews/' . $request->update_id)->with('status', 'News updated successfully.');

        } else {

            return redirect('wh-admin');
        }


    }

    public function updateDistrict(Request $request)
    {
        if ($request->session()->has('admin_id')) {

            $request->validate([
                'name' => 'required|max:100'
            ]);

            DB::table('districts')
                ->where('id', '=', $request->update_id)
                ->update([
                    'name' => $request->name,
                    'admin_id' => session('admin_id')
                ]);

            return redirect('wh-editDistricts/' . $request->update_id)->with('status', 'District updated successfully.');

        } else {

            return redirect('wh-admin');
        }

    }

    public function updateCoupon(Request $request)
    {
        if ($request->session()->has('admin_id')) {
            $request->validate([
                'title' => 'required|max:50',
                'code' => 'required|max:10',
                'state' => 'required',
                'price' => 'required',
                'points' => 'required',
                'product' => 'required'
            ]);

            DB::table('coupons')
                ->where('id', '=', $request->update_id)
                ->update([
                    'title' => $request->title,
                    'code' => $request->code,
                    'price' => $request->price,
                    'state' => $request->state,
                    'points' => $request->points,
                    'product' => $request->product,
                    'admin_id' => session('admin_id')
                ]);

            return redirect('wh-editCoupon/' . $request->update_id)->with('status', 'Coupon updated successfully.');
        } else {

            return redirect('wh-admin');
        }
    }

    public function updateVoucher(Request $request)
    {

        if ($request->session()->has('admin_id')) {
            $request->validate([
                'title' => 'required|max:50',
                'description' => 'required|max:500',
                'code' => 'required|max:10',
                'state' => 'required',
                'points' => 'required'
            ]);

            DB::table('vouchers')
                ->where('id', '=', $request->update_id)
                ->update([
                    'title' => $request->title,
                    'code' => $request->code,
                    'points' => $request->points,
                    'description' => $request->description,
                    'state' => $request->state,
                    'admin_id' => session('admin_id')
                ]);

            return redirect('wh-editVoucher/' . $request->update_id)->with('status', 'Voucher updated successfully.');

        } else {

            return redirect('wh-admin');
        }


    }

    public function updateFaqs(Request $request)
    {
        if ($request->session()->has('admin_id')) {

            $request->validate([
                'question' => 'required|max:300',
                'answer' => 'required|max:1000'
            ]);

            DB::table('faqs')
                ->where('id', '=', $request->update_id)
                ->update([
                    'questions' => $request->question,
                    'answer' => $request->answer,
                    'admin_id' => session('admin_id')
                ]);

            return redirect('wh-editFaqs/' . $request->update_id)->with('status', 'FAQ updated successfully.');
        } else {

            return redirect('admin-login');
        }
    }

    public function updateContactinfo(Request $request)
    {

        if ($request->session()->has('admin_id')) {

            $request->validate([
                'email' => 'required',
                'address' => 'required',
                'phone' => 'required',
            ]);

            DB::table('contactinfo')
                ->where('id', '=', $request->update_id)
                ->update([
                    'address' => $request->address,
                    'phone' => $request->phone,
                    'email' => $request->email,
                    'admin_id' => session('admin_id')
                ]);

            return redirect('wh-editContactinfo/' . $request->update_id)->with('status', 'Contact information updated successfully.');
        } else {

            return redirect('admin-login');
        }
    }

    public function addVouchers(Request $request)
    {

        if ($request->session()->has('admin_id')) {
            $request->validate([
                'title' => 'required|max:50',
                'description' => 'required|max:500',
                'code' => 'required|max:10',
                'state' => 'required',
                'points' => 'required'
            ]);

            DB::table('vouchers')->insert([
                'title' => $request->title,
                'code' => $request->code,
                'points' => $request->points,
                'description' => $request->description,
                'state' => $request->state,
                'admin_id' => session('admin_id')
            ]);

            return redirect('wh-voucher')->with('status', 'Voucher created successfully.');

        } else {

            return redirect('wh-admin');
        }


    }

    public function createClass(Request $request)
    {
        if ($request->session()->has('admin_id')) {
            $request->validate([
                'name' => 'required|max:100',
                'image' => 'required',
                'image.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
//                'time' => 'required|max:8',
                'duration' => 'required|max:10',
                'venue' => 'required|max:50',
                'description' => 'required|max:1500',
//                'credits' => 'required|max:11',
                'level' => 'required|max:10',
                'slot' => 'required',
//                'state' => 'required|max:50',
                'category_id' => 'required',
                'program_id' => 'required',
                'loyaltyPoints' => 'required',
            ]);

//            $image = '';
//            if (isset($_FILES["image"]["name"]) && !empty($_FILES["image"]["name"])) {
//                $target_dir = public_path() . '/admin/store_img/';
//                $file = $_FILES['image']['name'];
//                $path = pathinfo($file);
//                $digits = 5;
//                $filename = 'classes/' . rand(pow(10, $digits - 1), pow(10, $digits) - 1);
//                $ext = $path['extension'];
//                $temp_name = $_FILES['image']['tmp_name'];
//
//                $path_filename_ext = $target_dir . $filename . "." . $ext;
//                move_uploaded_file($temp_name, $path_filename_ext);
//                $image = $filename . ('.' . $ext);
//            }


            if (isset($_FILES["image"]["name"]) && !empty($_FILES["image"]["name"])) {
                $image = $request->file('image')->store('classes', 'public');
            } else {
                return redirect('wh-class')->with('status', 'Class Image is required.');
            }
            $state = 2;

            DB::table('classes')->insert([
                'name' => $request->name,
                'img' => $image,
//                'time' => $request->time,
                'duration' => $request->duration,
                'venue' => $request->venue,
                'description' => $request->description,
//                'credits' => $request->credits,
                'level' => $request->level,
                'state' => $state,
                'slot' => $request->slot,
                'status' => " ",
                'category_id' => $request->category_id,
                'loyaltyPoints' => $request->loyaltyPoints,
                'program_id' => $request->program_id,
                'QRpassword' => $request->QRpassword
            ]);

            $last_rec = DB::table('classes')
                ->orderBy('id', 'desc')
                ->first();


            for ($i = 0; $i < count($request->time); $i++) {
                DB::table('sessions')->insert([
                    'class_id' => $last_rec->id,
                    'date' => $request->date[$i],
                    'time' => $request->time[$i]
                ]);
            }


            return redirect('wh-class')->with('status', 'Class created successfully.');

        } else {

            return redirect('wh-admin');
        }

    }

    public function updateClass(Request $request)
    {
        if ($request->session()->has('admin_id')) {
            $request->validate([
                'name' => 'required|max:100',
                'time' => 'required|max:8',
                'duration' => 'required|max:10',
                'venue' => 'required|max:50',
                'description' => 'required|max:1500',
//                'credits' => 'required|max:11',
                'level' => 'required|max:10',
                'slot' => 'required',
//                'state' => 'required|max:50',
                'category_id' => 'required',
                'program_id' => 'required',
                'loyaltyPoints' => 'required',
            ]);


            if (isset($_FILES["image"]["name"]) && !empty($_FILES["image"]["name"])) {

                $image = $request->file('image')->store('classes', 'public');
                $target_dir = public_path() . '/storage/';
                unlink($target_dir . $request->existing_img);

            } else {
                $image = $request->existing_img;
            }

            $state = 2;

            DB::table('classes')
                ->where('id', '=', $request->update_id)
                ->update([
                    'name' => $request->name,
                    'img' => $image,
//                    'time' => $request->time,
                    'duration' => $request->duration,
                    'venue' => $request->venue,
                    'description' => $request->description,
//                    'credits' => $request->credits,
                    'level' => $request->level,
                    'state' => $state,
                    'slot' => $request->slot,
                    'status' => " ",
                    'category_id' => $request->category_id,
                    'program_id' => $request->program_id,
                    'loyaltyPoints' => $request->loyaltyPoints,
                ]);


            $result = DB::table('sessions')->where('class_id', '=', $request->update_id)->delete();

            for ($i = 0; $i < count($request->time); $i++) {
                DB::table('sessions')->insert([
                    'class_id' => $request->update_id,
                    'date' => $request->date[$i],
                    'time' => $request->time[$i]
                ]);
            }


            return redirect('wh-editClass/' . $request->update_id . '')->with('status', 'Class updated successfully.');

        } else {

            return redirect('wh-admin');
        }

    }


    public function addCategories(Request $request)
    {
        if ($request->session()->has('admin_id')) {
            $request->validate([
                'name' => 'required|max:100'
            ]);

            DB::table('categories')->insert([
                'name' => $request->name,
                'admin_id' => session('admin_id')
            ]);

            return redirect('wh-addCategory')->with('status', 'Category created successfully.');

        } else {

            return redirect('wh-admin');
        }

    }


    public function updateCategory(Request $request)
    {
        if ($request->session()->has('admin_id')) {
            $request->validate([
                'name' => 'required|max:100'
            ]);

            DB::table('categories')
                ->where('id', '=', $request->update_id)
                ->update(['name' => $request->name, 'admin_id' => session('admin_id')]);


            return redirect('wh-editCategory/' . $request->update_id . '')->with('status', 'Category updated successfully.');

        } else {

            return redirect('wh-admin');
        }

    }

    public function addCompany(Request $request)
    {
        if ($request->session()->has('admin_id')) {
            $request->validate([
                'name' => 'required|max:100',
                'district_id' => 'required'
            ]);

            DB::table('companies')->insert([
                'name' => $request->name,
                'district_id' => $request->district_id
            ]);

            return redirect('wh-addCompany')->with('status', 'Company created successfully.');

        } else {

            return redirect('wh-admin');
        }

    }

    public function updateCompany(Request $request)
    {
        if ($request->session()->has('admin_id')) {
            $request->validate([
                'name' => 'required|max:100',
                'district_id' => 'required'
            ]);


            DB::table('companies')
                ->where('id', '=', $request->update_id)
                ->update(['name' => $request->name, 'district_id' => $request->district_id]);


            return redirect('wh-editCompany/' . $request->update_id . '')->with('status', 'Company updated successfully.');

        } else {

            return redirect('wh-admin');
        }

    }

    public function updateProgram(Request $request)
    {
        if ($request->session()->has('admin_id')) {

            $request->validate([
                'name' => 'required|max:200',
                'company' => 'required'
            ]);

            DB::table('programs')
                ->where('id', '=', $request->update_id)
                ->update([
                    'name' => $request->name,
                    'company_id' => $request->company
                ]);

            return redirect('wh-editProgram/' . $request->update_id)->with('status', 'Program updated successfully.');

        } else {

            return redirect('wh-admin');
        }

    }

    public function postFAQ(Request $request)
    {
        if ($request->session()->has('admin_id')) {

            $request->validate([
                'question' => 'required|max:300',
                'answer' => 'required|max:1000',
            ]);

            DB::table('faqs')->insert([
                'questions' => $request->question,
                'answer' => $request->answer,
                'state' => 1,
                'admin_id' => session('admin_id')
            ]);

            return redirect('wh-faqs')->with('status', 'FAQ added successfully.');

        } else {

            return redirect('wh-admin');
        }

    }

    public function postContactinfo(Request $request)
    {
        if ($request->session()->has('admin_id')) {

            $request->validate([
                'email' => 'required',
                'address' => 'required',
                'phone' => 'required',
            ]);

            DB::table('contactinfo')->insert([
                'address' => $request->address,
                'phone' => $request->phone,
                'email' => $request->email,
                'admin_id' => session('admin_id')
            ]);

            return redirect('wh-contactinfo')->with('status', 'Contact info added successfully.');

        } else {

            return redirect('wh-admin');
        }

    }

    public function postProgram(Request $request)
    {
        if ($request->session()->has('admin_id')) {

            $request->validate([
                'name' => 'required|max:200',
                'company' => 'required'
            ]);

            DB::table('programs')->insert([
                'name' => $request->name,
                'company_id' => $request->company,
                'admin_id' => session('admin_id')
            ]);

            return redirect('wh-addProgram')->with('status', 'Program created successfully.');

        } else {

            return redirect('wh-admin');
        }

    }

    public function deleteCompany(Request $request)
    {
        $delete_id = $request->delete_id;
        DB::table('companies')
            ->where('id', '=', $delete_id)
            ->update(['status' => 1]);

        return redirect('wh-manageCompany')->with('status', 'Company deleted successfully.');
    }

    public function deleteCategory(Request $request)
    {
        $delete_id = $request->delete_id;
        DB::table('categories')
            ->where('id', '=', $delete_id)
            ->update(['status' => 1]);

        return redirect('wh-manageCategory')->with('status', 'Category deleted successfully.');
    }

    public function deleteProduct(Request $request)
    {
        $delete_id = $request->delete_id;
        DB::table('products')
            ->where('id', '=', $delete_id)
            ->update(['status' => 1]);

        return redirect('wh-manageProduct')->with('status', 'Product deleted successfully.');
    }

    public function deleteClass(Request $request)
    {
        $delete_id = $request->delete_id;
        DB::table('classes')
            ->where('id', '=', $delete_id)
            ->update(['is_delete' => 1]);

        return redirect('wh-manageClass')->with('status', 'Class deleted successfully.');
    }

    public function deleteNews(Request $request)
    {
        $delete_id = $request->delete_id;
        DB::table('news')
            ->where('id', '=', $delete_id)
            ->update(['status' => 1]);

        return redirect('wh-manageNews')->with('status', 'News deleted successfully.');
    }

    public function changeOrderStatus(Request $request)
    {
        DB::table('orders')
            ->where('id', '=', $request->order_id)
            ->update(['status' => $request->status]);

        return redirect('wh-manageOrders')->with('status', 'Status change successfully.');
    }

    public function deleteDistrict(Request $request)
    {
        $delete_id = $request->delete_id;
        DB::table('districts')
            ->where('id', '=', $delete_id)
            ->update(['status' => 1]);

        return redirect('wh-manageDistrict')->with('status', 'Districts deleted successfully.');
    }

    public function deleteCoupon(Request $request)
    {
        $delete_id = $request->delete_id;
        DB::table('coupons')
            ->where('id', '=', $delete_id)
            ->update(['status' => 1]);

        return redirect('wh-manageCoupon')->with('status', 'Coupons deleted successfully.');
    }

    public function deleteVoucher(Request $request)
    {
        $delete_id = $request->delete_id;
        DB::table('vouchers')
            ->where('id', '=', $delete_id)
            ->update(['status' => 1]);

        return redirect('wh-manageVouchers')->with('status', 'Vouchers deleted successfully.');
    }

    public function deleteFaqs(Request $request)
    {
        $delete_id = $request->delete_id;
        DB::table('faqs')
            ->where('id', '=', $delete_id)
            ->update(['status' => 1]);

        return redirect('wh-managefaqs')->with('status', 'Faqs deleted successfully.');
    }

    public function deleteProgram(Request $request)
    {
        $delete_id = $request->delete_id;
        DB::table('programs')
            ->where('id', '=', $delete_id)
            ->update(['status' => 1]);

        return redirect('wh-manageProgram')->with('status', 'Program deleted successfully.');
    }

    public function deleteInboxMessage(Request $request)
    {
        $delete_id = $request->delete_id;
        DB::table('contactus')
            ->where('id', '=', $delete_id)
            ->update(['status' => 1]);

        return redirect('wh-inbox')->with('status', 'Message deleted successfully.');
    }

    public function deleteContactinfo(Request $request)
    {
        $delete_id = $request->delete_id;
        DB::table('contactinfo')
            ->where('id', '=', $delete_id)
            ->update(['status' => 1]);

        return redirect('wh-manageContactinfo')->with('status', 'Message deleted successfully.');
    }


    public function user_order_notification_list()
    {

        $order_records = DB::table('orders')
            ->join('users', 'users.id', '=', 'orders.user_id')
            ->where('status', '!=', 'started')
            ->where('is_read', '=', 0)
            ->select('orders.*', 'users.name as user_name')
            ->get();

        $html = '';
        $url_link = url("wh-manageOrders");


        if (isset($order_records) && count($order_records) > 0) {
            foreach ($order_records as $row) {

                $total = 0;
                if (!empty($row->total)) {
                    $total = $row->total;
                }

                $html .= '<a href="' . $url_link . '"><div class="navbar-dropdown-notification is-new">   
                        <div class="navbar-dropdown-notification__content">
                            <a href="' . $url_link . '" class="navbar-dropdown-notification__action-name">' . $row->user_name . ' </a>
                            <div class="navbar-dropdown-notification__action-desc">Product Type: <strong>' . $row->type . '</strong></div>
                            <div class="navbar-dropdown-notification__action-desc">Order price: <strong>$' . $total . '</strong></div>
                        </div>
                        <span class="navbar-dropdown-notification__date">' . $row->created_at . '</span>
                    </div></a>';
            }
        }

        return ["total_count" => count($order_records), "records_list" => $html];
    }
}
