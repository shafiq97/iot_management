<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

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
}
