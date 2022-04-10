<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use Illuminate\Support\Facades\DB;

class EventController extends Controller
{
    //
    public function autocompleteSearch(Request $request)
    {
        $query = $request->get('query');
        print_r($query);
        $filterResult = Event::where('device_id', 'LIKE', '%' . $query . '%')->get();
        return response()->json($filterResult);
    }

    public function add_event(Request $request)
    {
        $query = DB::table('event')->insert([
            "install_date" => $request->input('install_date'),
            "install_time" => $request->input('install_time'),
            "pic_id" => $request->input('pic_id'),
            "pic_name" => $request->input('pic_name'),
            "device_id" => $request->input('device_id'),
            "location_id" => $request->input('location_id'),
            "reading_id" => $request->input('reading_id'),
            "status_id" => $request->input('status_id')
        ]);

        if ($query) {
            // $factory = (new Factory)->withServiceAccount('../resources/credentials/iot-management-bfa20-firebase-adminsdk-xoj7c-d1ae8b662b.json');
            // $storage = $factory->createStorage();
            // $image = $request->file('device_image'); //image file from frontend

            // $localfolder = public_path('firebase-temp-uploads') . '/';
            // $extension = $image->getClientOriginalExtension();
            // $file = $request->file('device_image')->getClientOriginalName();
            // $image->move($localfolder, $file);
            // $uploadedfile = fopen($localfolder . $file, 'r');
            // $firebase_storage_path = 'Images/';
            // $storage->getBucket()->upload($uploadedfile, ['name' => $firebase_storage_path . $request->file('device_image')->getClientOriginalName()]);
            // unlink($localfolder . $file);
            return back()->with('success', 'Record has been successfully inserted');
        } else {
            return back()->with('fail', 'Something went wrong');
        }
    }

    function edit_events(Request $request){
        $id = $request->route('id');

        // $factory = (new Factory)->withServiceAccount('../resources/credentials/iot-management-bfa20-firebase-adminsdk-xoj7c-d1ae8b662b.json');
        // $storage = $factory->createStorage();

        $event = DB::select('select * from event where event_id = "' . $id . '"');
        // $image = $storage->getBucket()->object("Images/".$device[0]->image);
        return view('admin.view_event')->with('event', $event);
    }

    function edit_event(Request $request)
    {
        $query = DB::table('event')
            ->where(
                'event_id',
                $request->input('id')
            )
            ->update([
                "install_date" => $request->input('install_date'),
                "install_time" => $request->input('install_time'),
                "pic_id" => $request->input('pic_id'),
                "pic_name" => $request->input('pic_name'),
                "device_id" => $request->input('device_id'),
                "location_id" => $request->input('location_id'),
                "reading_id" => $request->input('reading_id'),
                "status_id" => $request->input('status_id')
            ]);



        if ($query) {
            return back()->with('success', 'Record has been successfully updated');
        } else {
            // return $query;
            return back()->with('fail', 'Something went wrong');
        }
    }

    function view_events()
    {
        $data = array(
            'list' => DB::table('event')->get()
        );

        return view('admin.view_events', $data);
    }
}
