<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rent;
use Illuminate\Support\Facades\Log;

class RentController extends Controller
{
    public function get_all_rent(Request $request)
    {
        $rent = Rent::orderBy('created_at', 'desc')->get();
        return $rent;
    }

    public function get_detail(Request $request)
    {
        $id = $request->input('id');
        $rent = Rent::find($id);
        return $rent;
    }

    public function register_rent(Request $request)
    {
        $rent = new Rent;
        $rent->name = $request->input('name');
        $rent->score = $request->input('score');
        $rent->station = $request->input('station');
        $rent->memo = $request->input('memo');
        $rent->save();
        return $rent->id;
    }

    public function delete_rent(Request $request)
    {
        $id = $request->input('id');
        $des = Rent::destroy($id);
        Log::debug($des);
    }

    public function edit_rent(Request $request)
    {
        $id = $request->input('id');
        $rent = Rent::find($id);
        $rent->name = $request->input('name');
        $rent->score = $request->input('score');
        $rent->station = $request->input('station');
        $rent->memo = $request->input('memo');
        $rent->save();
    }
}
