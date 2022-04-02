<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Kreait\Firebase\Auth as FirebaseAuth;
use Kreait\Firebase\Auth\SignInResult\SignInResult;
use Kreait\Firebase\Exception\FirebaseException;
use Google\Cloud\Firestore\FirestoreClient;
use Kreait\Firebase\Factory;
use Session;

class DevicesController extends Controller
{
    //
    function view_devices()
    {
        $data = array(
            'list' => DB::table('devices')->get()
        );

        return view('admin.view_devices', $data);
    }

    function edit_device(Request $request)
    {
        $query = DB::table('devices')
            ->where(
                'id',
                $request->input('id')
            )
            ->update([
                "device_id" => $request->input('device_id'),
                "device_type" => $request->input('device_type'),
                "device_unit" => $request->input('device_unit'),
                "device_reading" => $request->input('device_reading'),
                "device_location" => $request->input('device_location'),
                "floor_level" => $request->input('floor_level'),
                "window_id" => $request->input('window_id'),
                "door_id" => $request->input('door_id'),
                "device_status" => $request->input('device_status'),
                "device_health" => $request->input('device_health'),
                "device_uptime" => $request->input('device_uptime'),
                "device_ip" => $request->input('device_ip'),
                "device_subnet" => $request->input('device_subnet'),
                "user_id" => $request->input('user_id'),
                "device_name" => $request->input('device_name'),
                "updated_at" => date('Y-m-d')
            ]);

        if ($query) {
            return back()->with('success', 'Record has been successfully updated');
        } else {
            return back()->with('fail', 'Something went wrong');
        }
    }

    function edit_devices(Request $request)
    {
        $id = $request->route('id');

        $factory = (new Factory)->withServiceAccount('../resources/credentials/iot-management-bfa20-firebase-adminsdk-xoj7c-d1ae8b662b.json');
        $storage = $factory->createStorage();

        $device = DB::select('select * from devices where id = "' . $id . '"');
        $image = $storage->getBucket()->object("Images/".$device[0]->image);
        return view('admin.view_device')->with('device', $device)->with('image', $image);
    }

    function add(Request $request)
    {
        $query = DB::table('devices')->insert([
            "device_id" => $request->input('device_id'),
            "device_type" => $request->input('device_type'),
            "device_unit" => $request->input('device_unit'),
            "device_reading" => $request->input('device_reading'),
            "device_location" => $request->input('device_location'),
            "floor_level" => $request->input('floor_level'),
            "window_id" => $request->input('window_id'),
            "door_id" => $request->input('door_id'),
            "device_status" => $request->input('device_status'),
            "device_health" => $request->input('device_health'),
            "device_uptime" => $request->input('device_uptime'),
            "device_ip" => $request->input('device_ip'),
            "device_subnet" => $request->input('device_subnet'),
            "user_id" => $request->input('user_id'),
            "device_name" => $request->input('device_name'),
            "image" => $request->file('device_image')->getClientOriginalName(),
            "created_at" => date('Y-m-d'),
            "updated_at" => date('Y-m-d')
        ]);

        if ($query) {

            $factory = (new Factory)->withServiceAccount('../resources/credentials/iot-management-bfa20-firebase-adminsdk-xoj7c-d1ae8b662b.json');
            $storage = $factory->createStorage();
            $image = $request->file('device_image'); //image file from frontend

            $localfolder = public_path('firebase-temp-uploads') .'/';
            $extension = $image->getClientOriginalExtension();
            $file = $request->file('device_image')->getClientOriginalName();
            $image->move($localfolder, $file);
            $uploadedfile = fopen($localfolder.$file, 'r');
            $firebase_storage_path = 'Images/';
            $storage->getBucket()->upload($uploadedfile, ['name' => $firebase_storage_path . $request->file('device_image')->getClientOriginalName()]);
            // unlink($localfolder . $file);
            return back()->with('success', 'Record has been successfully inserted');
        } else {
            return back()->with('fail', 'Something went wrong');
        }
    }
}
