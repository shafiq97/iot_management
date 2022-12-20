<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Kreait\Firebase\Factory;
use GeoIP;

class DevicesController extends Controller
{
    //

    function deviceHealthView()
    {
        $device_healths = DB::select('select * from device_health');
        return view('admin.device_healths')->with('device_healths', $device_healths);
    }



    function addDeviceHealthAction(Request $request)
    {
        $query = DB::table('device_health')->insert([
            "health" => $request->input('device_health'),
        ]);

        if ($query) {
            return back()->with('success', 'Record has been successfully inserted');
        } else {
            return back()->with('fail', 'Something went wrong');
        }
    }

    function addDeviceHealth()
    {
        return view('admin.add_device_health');
    }

    function archiveDeviceAction(Request $request){
        $id = $request->route('id');

        $res=DB::update("UPDATE devices SET archive = '1' WHERE device_id = ?;", [$id]);

        if($res){
            return back()->with('success', 'Device Type ID ' . $request->route('id') . " deleted!");
        }else{
            echo 'haha' . $request->route('id');
        }
    }

    function deleteDeviceType(Request $request){

        $id = $request->route('id');

        $res=DB::delete('delete from device_type where device_type_id = ?', [$id]);

        if($res){
            return back()->with('success', 'Device Type ID ' . $request->route('id') . " deleted!");
        }else{
            echo 'haha' . $request->route('id');
        }
    }

    function deleteDeviceUnit(Request $request){

        $id = $request->route('id');

        $res=DB::delete('delete from device_unit where id = ?', [$id]);

        if($res){
            return back()->with('success', 'Device Unit ID ' . $request->route('id') . " deleted!");
        }else{
            return back()->with('failed', 'something is wrong');
        }
    }

    function deleteDeviceHealth(Request $request){

        $id = $request->route('id');

        $res=DB::delete('delete from device_health where id = ?', [$id]);

        if($res){
            return back()->with('success', 'Device Health ID ' . $request->route('id') . " deleted!");
        }else{
            return back()->with('failed', 'something is wrong');
        }
    }

    function addView()
    {
        $device_types = DB::select('select * from device_type');
        $device_units = DB::select('select * from device_unit');
        $device_healths = DB::select('select * from device_health');
        return view('admin.add_device')
            ->with('device_types', $device_types)
            ->with('device_units', $device_units)
            ->with('device_healths', $device_healths);
    }

    function viewDeviceType()
    {
        $device_types = DB::select('select * from device_type');
        return view('admin.device_type')->with('device_types', $device_types);
    }

    function viewDeviceUnit()
    {
        $device_units = DB::select('select * from device_unit');
        return view('admin.device_units')->with('device_units', $device_units);
    }

    function addDeviceTypeView()
    {
        return view('admin.add_device_type');
    }

    function addDeviceUnit()
    {
        return view('admin.add_device_unit');
    }

    function addDeviceTypeAction(Request $request)
    {
        $query = DB::table('device_type')->insert([
            "device_type" => $request->input('device_type'),
        ]);

        if ($query) {
            return back()->with('success', 'Record has been successfully inserted');
        } else {
            return back()->with('fail', 'Something went wrong');
        }
    }

    function addDeviceUnitAction(Request $request)
    {
        $query = DB::table('device_unit')->insert([
            "device_unit" => $request->input('device_unit'),
        ]);

        if ($query) {
            return back()->with('success', 'Record has been successfully inserted');
        } else {
            return back()->with('fail', 'Something went wrong');
        }
    }

    function view_devices()
    {
        $data = array(
            'list' => DB::select('select * from event inner join devices on event.device_id = devices.device_id where devices.archive = 0')
        );

        // $location = geoip();
        // $country = $location['country'];
        // $city = $location['city'];
        // $state = $location['state'];
        // $lat = $location['lat'];
        // $lng = $location['lon'];

        // return view('admin.view_devices', $data)->with('lat', $lat)->with('lng', $lng);
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

        $device = DB::select('select * from devices where device_id = "' . $id . '"');
        $image = $storage->getBucket()->object("Images/" . $device[0]->image);
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
            // "image" => $request->file('device_image')->getClientOriginalName(),
            // "device_location" => $request->file('location_image')->getClientOriginalName(),
            "created_at" => date('Y-m-d'),
            "updated_at" => date('Y-m-d')
        ]);

        if ($query) {

            $factory = (new Factory)->withServiceAccount('../resources/credentials/iot-management-bfa20-firebase-adminsdk-xoj7c-d1ae8b662b.json');
            $storage = $factory->createStorage();
            $image = $request->file('device_image'); //image file from frontend
            $location_image = $request->file('location_image'); //image file from frontend

            $localfolder = public_path('firebase-temp-uploads') . '/';
            $localfolder2 = public_path('firebase-temp-uploads') . '/location/';
            // $extension = $image->getClientOriginalExtension();
            // $file = $request->file('device_image')->getClientOriginalName();
            // $file2 = $request->file('location_image')->getClientOriginalName();
            // $image->move($localfolder, $file);
            // $location_image->move($localfolder2, $file2);
            // $uploadedfile = fopen($localfolder . $file, 'r');
            // $uploadedfile2 = fopen($localfolder2 . $file2, 'r');
            // $firebase_storage_path = 'Images/';
            // $firebase_storage_path2 = 'Locations/';
            // $storage->getBucket()->upload($uploadedfile, ['name' => $firebase_storage_path . $request->file('device_image')->getClientOriginalName()]);
            // $storage->getBucket()->upload($uploadedfile2, ['name' => $firebase_storage_path2 . $request->file('location_image')->getClientOriginalName()]);
            // unlink($localfolder . $file);
            return back()->with('success', 'Record has been successfully inserted');
        } else {
            return back()->with('fail', 'Something went wrong');
        }
    }
}
