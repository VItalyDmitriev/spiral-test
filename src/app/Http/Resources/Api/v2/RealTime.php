<?php

namespace App\Http\Resources\Api\v2;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Events\NicknamesEvent;

class RealTimeController extends JsonResource
{
    public function postNicknamesEvent(Request $request)
    {
        if($request->has('data')){
            event(new NicknamesEvent($request['data']));
        }
    }
    public function toArray($request)
    {
        if($request->has('data')){
            event(new NicknamesEvent($request['data']));
        }
        return parent::toArray($request);
    }
}