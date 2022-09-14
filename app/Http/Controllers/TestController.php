<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index()
    {
        $data = Task::first();

        // Uncomment to Test:
        
        // Uji Coba Query dengan UNIX_TIME
        // $q = Task::where('created_at', '>', 1663088400)->get();
        // return response()->json([
        //     'data'  => $q,
        // ]);

        // Uji Coba Query dengan Formatnya Default Carbon DateTimeString
        // $q = Task::where('created_at', '>', '2022-09-14 00:00:00')->get();
        // return response()->json([
        //     'data'  => $q,
        // ]);

        return view('test', [
            'ori'       => $data->created_at,
            'carbon'    => Carbon::parse($data->created_at),
        ]);
    }
}
