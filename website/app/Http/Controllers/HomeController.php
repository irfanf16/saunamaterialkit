<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Workshop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use RealRashid\SweetAlert\Facades\Alert;
use Spatie\Permission\Models\Role;

class HomeController extends Controller
{
    public function home(){

        try {
            $token = session()->get('token');
            $headers = array('Accept' => 'application/json', 'Authorization' => $token);
            $body = NULL;
            $url = config('app.url') . 'api/home';
            $response = Http::get( config('app.url') . 'api/home');
//            $response = \Unirest\Request::get($url, $headers, $body);

            $response  =$response->json();
            if ($response['status'] == 200) {
                $banners = $response['data'];
                $banners = $response['data'];
                return view('website.pages.home',get_defined_vars());

            }
        } catch (\Throwable $th) {
            throw $th;
        }


    }
    public function contractors(Request $request){


        try {
            $token = session()->get('token');
            $headers = array('Accept' => 'application/json', 'Authorization' => $token);
            $body = NULL;
            $url = config('app.url') . 'api/contractors?search='.$request->search.'&location_id='.$request->location_id;
            $response = Http::get( $url);

//            $response = \Unirest\Request::get($url, $headers, $body);

            $response  =$response->json();
//            dd($response);
            if ($response['status'] == 200) {
                $contractors = $response['data'];
                $locations = $response['locations'];
                return view('website.pages.contractors',get_defined_vars());

            }
        } catch (\Throwable $th) {
            throw $th;
        }

    }
    public function BecomeContractorFrom(){
        return view('website.pages.becomeContractor');

    }
    public function BecomeContractor(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'workshop_name' => 'required',
            'contact_person' => 'required',
            'phone_no' => 'required',
            'workshop_address' => 'required',
            'zipcode' => 'required',
            'password' => 'required|min:8',
//            'locations' => 'required',
//            'services' => 'required',
        ]);
//        $workshop_logo = base64_encode(file_get_contents($request->file('workshop_logo')->path()));

        try {
            $token = session()->get('token');
            $headers = array('Accept' => 'application/json', 'Authorization' => $token);
            $body = NULL;
            $url = config('app.url') . 'api/become-contractors';
            $response = Http::post( $url,[
                'name'=>$request->name,
                'email' => $request->email,
                'workshop_name' => $request->workshop_name,
                'contact_person' => $request->contact_person,
                'phone_no' =>$request->phone_no,
                'workshop_address' =>$request->workshop_address,
                'zipcode' => $request->zipcode,
                'password' =>$request->password,
//                 'workshop_logo'=>$workshop_logo
            ]);

//            $response=Http::withHeaders([
//                'X-MBX-APIKEY' => 'API_KEY_PUBLIC',
//                'Content-Type' => 'application/x-www-form-urlencoded',
//            ])->post(
//                $url,
//                [
//                   'name'=>$request->name,
//                ]
//            )->collect()->toArray();


            $response  =$response->json();

            if ($response['status'] == 100) {
                   $errorMessages=$response['errors'];
//                   dd($errorMessages);
                Session::flash('errorMessages',$errorMessages);
                return back();
            }
            if ($response['status'] == 200) {
                Alert::success('Congrats', 'Your Request is submit Successfully. Our team will contact you soon');
                return back();
            }
        } catch (\Throwable $th) {
            throw $th;
        }



    }
}
