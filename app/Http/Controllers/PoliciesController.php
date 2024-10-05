<?php

namespace App\Http\Controllers;

use App\Models\SiteSttings;
use Illuminate\Http\Request;

class PoliciesController extends Controller
{
    public function privacy_policy()
    {
        $settings =  SiteSttings::select('privacy_policy')->where('id', 1)->get()->first();
        $privacy_policy = $settings->privacy_policy;
        return view('privacy-policy', compact('privacy_policy'));
    }


    public function terms_and_conditions()
    {
        $settings =  SiteSttings::select('terms_and_conditions')->where('id', 1)->get()->first();
        $terms_and_conditions = $settings->terms_and_conditions;

        return view('terms-and-conditions', compact('terms_and_conditions'));
    }


    public function delivery_policy()
    {
        $settings =  SiteSttings::select('delivery_policy')->where('id', 1)->get()->first();
        $delivery_policy = $settings->delivery_policy;
        return view('delivery-policy', compact('delivery_policy'));
    }



    public function return_policy()
    {
        $settings =  SiteSttings::select('return_policy')->where('id', 1)->get()->first();
        $return_policy = $settings->return_policy;
        return view('return-policy', compact('return_policy'));
    }


    public function cookies_policy()
    {
        $settings =  SiteSttings::select('cookies_policy')->where('id', 1)->get()->first();
        $cookies_policy = $settings->cookies_policy;
        return view('cookie-policy', compact('cookies_policy'));
    }
}
