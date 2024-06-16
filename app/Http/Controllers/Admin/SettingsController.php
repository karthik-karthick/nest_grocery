<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Business_setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SettingsController extends Controller
{
    public function terms_setting()
    {
        $terms = Business_setting::where('key', 'terms')->first();
        return  view('admin.settings.terms', compact('terms'));
    }
    public function support_policy()
    {
        $support = Business_setting::where('key', 'support_policy')->first();
        return  view('admin.settings.support', compact('support'));
    }
    public function privacy_policy()
    {
        $privacy = Business_setting::where('key', 'privacy_policy')->first();
        return  view('admin.settings.privacy', compact('privacy'));
    }
    public function return_policy()
    {
        $return = Business_setting::where('key', 'return_policy')->first();
        return  view('admin.settings.return_policy', compact('return'));
    }
    public function about_us()
    {
        $about = Business_setting::where('key', 'about_us')->first();
        return view('admin.settings.about_us', compact('about'));
    }

    public function add_terms(Request $request)
    {
        try {

            if ($request->filled('terms_id')) {
                $terms = Business_setting::findOrFail($request->terms_id);
                $terms->value = $request->terms;
                $terms->update();
                return redirect()->back()->with('success', 'Terms And Condition Updated Successfully');
            } else {
                $terms = new Business_setting();
                $terms->key = 'terms';
                $terms->value = $request->terms;
                $terms->save();
                return redirect()->back()->with('success', 'Terms And Condition Added Successfully');
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function add_support(Request $request)
    {
        try {

            if ($request->filled('support_id')) {
                $support = Business_setting::findOrFail($request->support_id);
                $support->value = $request->support_policy;
                $support->update();
                return redirect()->back()->with('success', 'Support Policy Updated Successfully');
            } else {
                $support = new Business_setting();
                $support->key = 'support_policy';
                $support->value = $request->support_policy;
                $support->save();
                return redirect()->back()->with('success', 'Support Policy Added Successfully');
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
    public function add_privacy(Request $request)
    {
        try {

            if ($request->filled('privacy_id')) {
                $terms = Business_setting::findOrFail($request->privacy_id);
                $terms->value = $request->privacy_policy;
                $terms->update();
                return redirect()->back()->with('success', 'Privacy Policy Updated Successfully');
            } else {
                $terms = new Business_setting();
                $terms->key = 'privacy_policy';
                $terms->value = $request->privacy_policy;
                $terms->save();
                return redirect()->back()->with('success', 'Privacy Policy Added Successfully');
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
    public function add_return(Request $request)
    {
        try {
            if ($request->filled('return_id')) {
                $return = Business_setting::findOrFail($request->return_id);
                $return->value = $request->return_policy;
                $return->update();
                return redirect()->back()->with('success', 'Return Policy Updated Successfully');
            } else {
                $return = new Business_setting();
                $return->key = 'return_policy';
                $return->value = $request->return_policy;
                $return->save();
                return redirect()->back()->with('success', 'Return Policy Added Successfully');
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
    public function add_about(Request $request)
    {
        try {

            if ($request->filled('about_id')) {
                $about = Business_setting::findOrFail($request->about_id);
                $about->value = $request->about_us;
                $about->update();
                return redirect()->back()->with('success', 'About Updated Successfully');
            } else {
                $about = new Business_setting();
                $about->key = 'about_us';
                $about->value = $request->about_us;
                $about->save();
                return redirect()->back()->with('success', 'About Added Successfully');
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
    public function app_settings(Request $request)
    {
        $company_name = Business_setting::where('key', 'company_name')->first();
        $phone_number = Business_setting::where('key', 'phone_number')->first();
        $company_address = Business_setting::where('key', 'company_address')->first();
        $business_logo = Business_setting::where('key', 'business_logo')->first();
        $business_favicon = Business_setting::where('key', 'business_favicon')->first();
        $business_footer = Business_setting::where('key', 'footer')->first();
        return view('admin.settings.app_setting', compact('company_name', 'phone_number', 'company_address', 'business_footer', 'business_logo', 'business_favicon'));
    }
    public function business_setup(Request $request)
    {

        try {

            if ($request->filled('company_name_id')) {

                $name = Business_setting::findOrFail($request->company_name_id);
                $name->value = $request->company_name;
                $name->update();
            } else {
                // Company Name
                $name = new Business_setting();
                $name->key = 'company_name';
                $name->value = $request->company_name;
                $name->save();
            }

            if ($request->filled('phone_number_id')) {

                $number = Business_setting::findOrFail($request->phone_number_id);
                $number->value = $request->contact_number;
                $number->update();
            } else {
                // // Phone Number
                $number = new Business_setting();
                $number->key = 'phone_number';
                $number->value = $request->contact_number;
                $number->save();
            }

            if ($request->filled('company_address_id')) {

                $address = Business_setting::findOrFail($request->company_address_id);
                $address->value = $request->company_address;
                $address->update();
            } else {
                // Company Address
                $address = new Business_setting();
                $address->key = 'company_address';
                $address->value = $request->company_address;
                $address->save();
            }

            if ($request->filled('business_logo_id')) {

                $logo = Business_setting::findOrFail($request->business_logo_id);
                if ($request->hasFile('business_logo')) {
                    $existinglogoPath = $logo->value;
                    if (file_exists($existinglogoPath)) {
                        unlink($existinglogoPath);
                    }
                    $image = $request->file('business_logo');
                    $hashedName = $image->hashName();
                    $path = $image->move('admin/assets/images/business/logo', $hashedName);

                    $logo->value = $path;
                    $logo->update();
                }
            } else {
                // Business logo
                if ($request->hasFile('business_logo')) {
                    $validator = Validator::make($request->all(), [
                        'business_logo' => 'required|image|max:2048|mimes:jpeg,png,gif,svg',
                    ]);

                    if ($validator->fails()) {
                        return redirect()->back()->withErrors($validator)->withInput();
                    }
                }
                if ($request->hasFile('business_logo')) {
                    $image = $request->file('business_logo');
                    $hashedName = time() . '.' . $image->getClientOriginalExtension();
                    $path = $image->move('admin/assets/images/business/logo', $hashedName);
                } else {
                    throw new \Exception('No image provided.');
                }
                $business_logo = new Business_setting();
                $business_logo->key = 'business_logo';
                $business_logo->value = $path;
                $business_logo->save();
            }

            if ($request->filled('business_favicon_id')) {

                $favicon = Business_setting::findOrFail($request->business_favicon_id);
                if ($request->hasFile('business_favicon')) {
                    $existingFaviconPath = $favicon->value;
                    if (file_exists($existingFaviconPath)) {
                        unlink($existingFaviconPath);
                    }

                    // Upload the new favicon
                    $image = $request->file('business_favicon');
                    $hashedName = $image->hashName();
                    $newFaviconPath = $image->move('admin/assets/images/business/favicon', $hashedName);
                    // Update the favicon setting with the new path
                    $favicon->value = $newFaviconPath;
                    $favicon->update();
                }
            } else {
                // Business favicon
                if ($request->hasFile('business_favicon')) {
                    $validator = Validator::make($request->all(), [
                        'business_favicon' => 'required|image|max:2048|mimes:jpeg,png,gif,svg',
                    ]);

                    if ($validator->fails()) {
                        return redirect()->back()->withErrors($validator)->withInput();
                    }
                }
                if ($request->hasFile('business_favicon')) {
                    $image = $request->file('business_favicon');
                    $hashedName = time() . '.' . $image->getClientOriginalExtension();
                    $path = $image->move('admin/assets/images/business/favicon', $hashedName);
                } else {
                    throw new \Exception('No image provided.');
                }
                $business_favicon = new Business_setting();
                $business_favicon->key = 'business_favicon';
                $business_favicon->value = $path;
                $business_favicon->save();
            }

            if ($request->filled('business_footer_id')) {


                $footer = Business_setting::findOrFail($request->business_footer_id);
                $footer->value = $request->footer;
                $footer->update();
            } else {
                // Footer
                $footer = new Business_setting();
                $footer->key = 'footer';
                $footer->value = $request->footer;
                $footer->save();
            }

            return redirect()->back()->with('success', 'Business Setup Updated Successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
    public function payment_method()
    {
        $razorpay_status = Business_setting::where('key', 'razorpay_status')->first();
        $secret_key = Business_setting::where('key', 'secret_key')->first();
        $razorpay_id = Business_setting::where('key', 'razorpay_id')->first();

        return view('admin.settings.payment_method', compact('razorpay_status', 'razorpay_id', 'secret_key'));
    }
    public function razorpay_status(Request $request)
    {

        // Create an array to store the data
        if ($request->status == null) {
            $status_val = '0';
        } else {
            $status_val = $request->status;
        }

        if ($request->filled('razorpay_id_id')) {
            $razorpay_id = Business_setting::findOrFail($request->razorpay_id_id);
            $razorpay_id->value = $request->razorpay_id;
            $razorpay_id->update();
        } else {
            $razorpay_id = new Business_setting();
            $razorpay_id->key = 'razorpay_id';
            $razorpay_id->value = $request->razorpay_id;
            $razorpay_id->save();
        }

        if ($request->filled('status_id')) {
            $razorpay_status = Business_setting::findOrFail($request->status_id);
            $razorpay_status->value = $status_val;
            $razorpay_status->update();
        } else {

            $status = new Business_setting();
            $status->key = 'razorpay_status';
            $status->value = $status_val;
            $status->save();
        }
        // Secret  Key update
        if ($request->filled('secret_key_id')) {
            $secret_key = Business_setting::findOrFail($request->secret_key_id);
            $secret_key->value = $request->secret_key;
            $secret_key->update();
        } else {
            $secret_key = new Business_setting();
            $secret_key->key = 'secret_key';
            $secret_key->value = $request->secret_key;
            $secret_key->save();
        }
        return redirect()->back()->with('success', 'Razorpay Status Updated Successfully');
    }
    public function app_main()
    {
        $app_status = Business_setting::where('key', 'app_status')->first();
        return view('admin.settings.app_maintain', compact('app_status'));
    }
    public function app_main_status(Request $request)
    {

        if ($request->app_status == null) {
            $status_val = '0';
        } else {
            $status_val = $request->app_status;
        }
        if ($request->filled('app_status_id')) {
            $app_status = Business_setting::findOrFail($request->app_status_id);
            $app_status->value = $status_val;
            $app_status->update();
        } else {

            $status = new Business_setting();
            $status->key = 'app_status';
            $status->value = $status_val;
            $status->save();
        }
        return redirect()->back()->with('success', 'Maintenance Mode Status Updated');
    }
}
