<?php

namespace App\Http\Controllers;

use App\Models\empolyee;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{

    public function index(){
        return view('home');
    }

    public function create(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'tel' => 'required|numeric',
            'card_num' => 'required|numeric',
            'depant_id' => 'required',
            'branch_id' => 'required',
            'start_time' => 'required|date',
            'address' => 'required',

        ]);
        
        $input = $request->all();
        $input['start_time'] = Carbon::parse($request->start_time)->format('d M Y');
        
        empolyee :: create($input);
        return redirect()->route('home');

    }


    public function showcreate()
    {
        return view('create');
    }


}
