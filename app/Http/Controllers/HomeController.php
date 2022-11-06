<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Location;
use App\Models\User;
use App\Models\Workshop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class HomeController extends Controller
{
    public function home()
    {

        try {
            $banners = Banner::where('status', 1)->get();
            return response()->json([
                'status' => 200,
                'data' => $banners,
            ]);
        } catch (\Throwable $th) {

            ///throw $th;
            return response()->json([
                "status" => 100,
                "message" => "Sorry! Something Went Wrong.",
                "exceptions" => $th
            ]);
        }
    }

    public function contractors(Request $request)
    {

//        try {
            $contractors = Workshop::with('locations')
                ->when($request->has('search') && $request->filled('search'), function ($query) use ($request) {
                    $query->where('zipcode', $request->search)
                        ->orwhere('name', 'like', '%' . $request->search . '%');
                })
                ->when($request->has('location_id') && $request->filled('location_id'), function ($query) use ($request) {
                    $query->whereHas('locations', function ($qu) use ($request) {
                        $qu->where('id', $request->location_id);
                    });
                })
                ->get();
            $locations = Location::all();
            return response()->json([
                'status' => 200,
                'data' => $contractors,
                'locations' => $locations
            ]);
//        } catch (\Throwable $th) {
//
//            ///throw $th;
//            return response()->json([
//                "status" => 100,
//                "message" => "Sorry! Something Went Wrong.",
//                "exceptions" => $th
//            ]);
//        }
    }

    public function becomeContractors(Request $request)
    {

        $validator = \Validator::make( $request->all(), [
            'name' => 'required',
            'email' => 'required|unique:users,email',
            'workshop_name' => 'required',
            'contact_person' => 'required',
            'phone_no' => 'required',
            'workshop_address' => 'required',
            'zipcode' => 'required',
            'password' => 'required|min:8',
        ]);

        if($validator->fails()){
            return response()->json([
                'status' => 100,
                'errors' => $validator->messages()->all()
            ]);
        }

        try {

            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->user_type = 2;
            $user->password = Hash::make($request->password);
            $user->save();
            if ($user) {
//                $primary_image =$this->base64_to_file($request->workshop_logo);
//                $file =base64_decode($primary_image->file);
//                $filename = date('YmdHi') . $file->getClientOriginalName();
//                $file->move(public_path('workshop/Image'), $filename);
                $workshop = new Workshop();
                $workshop->name = $request->workshop_name;
//                $workshop->logo = $filename;
                $workshop->logo = 'logo.png';
                $workshop->address = $request->workshop_address;
                $workshop->zipcode = $request->zipcode;
                $workshop->contact_person = $request->contact_person;
                $workshop->phone_no = $request->phone_no;
                $workshop->save();
//                $workshop->locations()->attach($request->locations);
//                $workshop->services()->attach($request->services);
                $user->workshops()->attach($workshop);
                $role = Role::where('name', 'Workshop')->first()->id;
                $user->assignRole($role);
                return response()->json([
                    'status' => 200,
                    'data' => 'Shop created successfully'
                ]);

            }
        } catch (\Throwable $th) {

            ///throw $th;
            return response()->json([
                "status" => 100,
                "message" => "Sorry! Something Went Wrong.",
                "exceptions" => $th
            ]);
        }
    }

    public function base64_to_file($image_64)
    {
        $extension = explode('/', explode(':', substr($image_64, 0, strpos($image_64, ';')))[1])[1];   // .jpg .png .pdf

        $replace = substr($image_64, 0, strpos($image_64, ',') + 1);

        // find substring fro replace here eg: data:image/png;base64,

        $image = str_replace($replace, '', $image_64);
        $image = str_replace(' ', '+', $image);

        $imageName = Str::random(10) . '.' . $extension;

        return json_decode(json_encode([
            "name" => $imageName,
            "file" => $image,
        ]));
    }
}
