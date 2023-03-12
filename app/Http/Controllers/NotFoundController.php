<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotFoundController extends Controller
{
    public function notFound(Request $request)
    {
        // dd($request);
        $remoteIp = $request->server->get('REMOTE_ADDR');
        return view('notFound', compact('remoteIp'));
    }
}
