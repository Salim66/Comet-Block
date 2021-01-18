<?php

namespace App\Http\Controllers;

use App\Models\Settings;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function logoIndex(){
        $settings = Settings::find(1);
        return view('admin.settings.logo.index', compact('settings'));
    }

    public function logoUpdate(Request $request){
        $logo_info = Settings::find(1);

        $logo_decode = json_decode($logo_info -> logo);



        //Logo LIght
        $logo = $request -> file('logoLight');

        $logo_name1 = '';
        if($request -> hasFile('logoLight')){
            $logo_name1 = md5(time().rand()) .'.'. $logo -> getClientOriginalExtension();
            $logo -> move(public_path('media/settings/logo'), $logo_name1);
            if(file_exists('media/settings/logo/'.$logo_decode -> logo_light)){
                unlink('media/settings/logo/'.$logo_decode -> logo_light);
            }
        }else {
            $logo_name1 = $logo_decode -> logo_light;
        }

        //Logo Dark
        $logo = $request -> file('logoDark');

        $logo_name2 = '';
        if($request -> hasFile('logoLight')){
            $logo_name2 = md5(time().rand()) .'.'. $logo -> getClientOriginalExtension();
            $logo -> move(public_path('media/settings/logo'), $logo_name2);
            if(file_exists('media/settings/logo/'.$logo_decode -> logo_dark)){
                unlink('media/settings/logo/'.$logo_decode -> logo_dark);
            }
        }else {
            $logo_name2 = $logo_decode -> logo_dark;
        }

        $logo_array_data = [
            'logo_light' => $logo_name1,
            'logo_dark'  => $logo_name2,
            'logo_width' => $request -> logo_width
        ];


        $logo_data = json_encode($logo_array_data);
        $logo_info -> logo = $logo_data;
        $logo_info -> update();
        return redirect() -> route('logo.index') -> with('success', 'Logo Updated Successful !');
    }

    /**
     * Social Index
     */
    public function socialIndex(){
        $settings = Settings::find(1);
        return view('admin.settings.social.index', compact('settings'));
    }

    /**
     * Social Update
     */
    public function socialUpdate(Request $request){

        $social_data = [
          'fb' => $request -> fb,
          'tw' => $request -> tw,
          'lkdn' => $request -> lkdn,
          'itm' => $request -> itm,
          'dbl' => $request -> dbl
        ];

        $social_json = json_encode($social_data);
        $settings = Settings::find(1);
        $settings -> social = $social_json;
        $settings -> update();
        return redirect() -> route('social.index') -> with('success', 'Social Update Successful !');
    }

    /**
     * Clients Index
     */
    public function clientIndex(){
        $settings = Settings::find(1);
        return view('admin.settings.clients.index', compact('settings'));
    }

    /**
     * Clients Update
     */
    public function clientsUpdate(Request $request){
        $settings = Settings::find(1);

        $clients_info = $settings -> clients;
        $clients_data = json_decode($clients_info);


        if($request -> hasFile('clients1')){
            $image = $request -> file('clients1');
            $clients_one = md5(time().rand()).'.'. $image -> getClientOriginalExtension();
            $image -> move(public_path('media/settings/clients'), $clients_one);
            if (file_exists('media/settings/clients/'.$clients_data -> clients_one)){
                unlink('media/settings/clients/'.$clients_data -> clients_one);
            }
        }else{
            $clients_one = $clients_data -> clients_one;
        }

        if($request -> hasFile('clients2')){
            $image = $request -> file('clients2');
            $clients_two = md5(time().rand()).'.'. $image -> getClientOriginalExtension();
            $image -> move(public_path('media/settings/clients'), $clients_two);
            if (file_exists('media/settings/clients/'.$clients_data -> clients_two)){
                unlink('media/settings/clients/'.$clients_data -> clients_two);
            }
        }else{
            $clients_two = $clients_data -> clients_two;
        }

        if($request -> hasFile('clients3')){
            $image = $request -> file('clients3');
            $clients_three = md5(time().rand()).'.'. $image -> getClientOriginalExtension();
            $image -> move(public_path('media/settings/clients'), $clients_three);
            if (file_exists('media/settings/clients/'.$clients_data -> clients_three)){
                unlink('media/settings/clients/'.$clients_data -> clients_three);
            }
        }else{
            $clients_three = $clients_data -> clients_three;
        }

        if($request -> hasFile('clients4')){
            $image = $request -> file('clients4');
            $clients_four = md5(time().rand()).'.'. $image -> getClientOriginalExtension();
            $image -> move(public_path('media/settings/clients'), $clients_four);
            if (file_exists('media/settings/clients/'.$clients_data -> clients_four)){
                unlink('media/settings/clients/'.$clients_data -> clients_four);
            }
        }else{
            $clients_four = $clients_data -> clients_four;
        }

        if($request -> hasFile('clients5')){
            $image = $request -> file('clients5');
            $clients_five = md5(time().rand()).'.'. $image -> getClientOriginalExtension();
            $image -> move(public_path('media/settings/clients'), $clients_five);
            if (file_exists('media/settings/clients/'.$clients_data -> clients_five)){
                unlink('media/settings/clients/'.$clients_data -> clients_five);
            }
        }else{
            $clients_five = $clients_data -> clients_five;
        }

        if($request -> hasFile('clients6')){
            $image = $request -> file('clients6');
            $clients_six = md5(time().rand()).'.'. $image -> getClientOriginalExtension();
            $image -> move(public_path('media/settings/clients'), $clients_six);
            if (file_exists('media/settings/clients/'.$clients_data -> clients_six)){
                unlink('media/settings/clients/'.$clients_data -> clients_six);
            }
        }else{
            $clients_six = $clients_data -> clients_six;
        }

        $client_data = [
            'upper' => $request -> upper,
            'client' => $request -> client,
            'clients_one' => $clients_one,
            'clients_two' => $clients_two,
            'clients_three' => $clients_three,
            'clients_four' => $clients_four,
            'clients_five' => $clients_five,
            'clients_six' => $clients_six
        ];

        $client_json = json_encode($client_data);
        $settings -> clients = $client_json;
        $settings -> update();
        return redirect() -> route('clients.index') -> with('success', 'Clients Updated Successful !');
    }

    //Copy Right Update
    public function copyRightUpdate(Request $request){
        $settings = Settings::find(1);
        $settings -> crt = $request -> crt;
        $settings -> update();
        return redirect() -> route('social.index') -> with('success', 'Copy Right Text Updated Successful !');
    }

    //Favicon Upload
    public function faviconUpdate(Request $request){
        $settings = Settings::find(1);


        //Image Find
        if($request -> hasFile('favicon')){
            $image = $request -> file('favicon');
            $fav_u_img = md5(time().rand()) .'.'. $image -> getClientOriginalExtension();
            $image -> move(public_path('media/settings/favicon'), $fav_u_img);
            if(file_exists('media/settings/favicon/'.$settings -> favicon)){
                unlink('media/settings/favicon/'.$settings -> favicon);
            }
        }else{
            $fav_u_img = $settings -> favicon;
        }

        $settings -> favicon = $fav_u_img;
        $settings -> update();
        return redirect() -> route('logo.index') -> with('success', 'Favicon Updated Successful !');
    }

}
