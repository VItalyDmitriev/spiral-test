<?php
namespace App\Http\Controllers\Api\v1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Events\Api\v1\DataEvent;

class RealTimeController extends Controller
{
    public function postNicknamesEvent(Request $request)
    {
        if($request->has('data')){
            event(new DataEvent($request['data']));
        }
    }
}