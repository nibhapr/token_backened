<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DisplayController extends Controller
{
    
    public function showDisplayUrl()
    {
        return view('display.index1', ['date' => Carbon::now()->toDateString(), 'settings' => Setting::first(),'file'=>'storage/tokens_for_display.json']);
    }
}
