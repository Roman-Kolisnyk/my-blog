<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TelegramController extends Controller
{
    public function index()
    {
        logger()->info('Here is the webhook', request()->toArray());

        return response()->json('Success!');
    }
}
