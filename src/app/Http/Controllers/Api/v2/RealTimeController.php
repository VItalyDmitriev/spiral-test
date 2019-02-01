<?php
namespace App\Http\Controllers\Api\v2;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Events\Api\v2\DataEvent;

class RealTimeController extends Controller
{
    public function postNicknamesEvent(Request $request)
    {
        if($request['data'][0] || $request['data'][1]){
            event(new DataEvent($request['data']));
        }
    }
}