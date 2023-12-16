<?php

namespace App\Http\Controllers;

use App\Models\empolyee;
use App\Models\branch;
use App\Models\depant;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{

    public function index()
    {
        return view('home');
    }



    public function create(Request $request)
    {
        $request->validate(
            [
                'name' => 'required',
                'card_num' => 'required|numeric|regex:/^\d{13}$/',
                'tel' => 'required|numeric|regex:/^\d{10}$/|',
                'depant_id' => 'required',
                'branch_id' => 'required',
                'start_time' => 'required',
                'address' => 'required',
            ],

            [
                'name.required' => 'กรุณาป้อนชื่อ',

                'card_num.required' => 'กรุณาป้อนเลขบัตรประชาชน',
                'card_num.numeric' => 'กรุณาป้อนเลขบัตรประชาชนเป็นตัวเลขเท่านั้น',
                'card_num.regex' => 'กรุณาป้อนเลขบัตรประชาชนเป็น 13 ตัวอักษร',


                'tel.required' => 'กรุณาป้อนเบอร์โทร',
                'tel.numeric' => 'กรุณาป้อนเบอร์โทรเป็นตัวเลขเท่านั้น',
                'tel.regex' => 'กรุณาป้อนเบอร์โทรเป็น 10 ตัวอักษร',

                'depant_id.required' => 'กรุณาป้อนตำแหน่ง',

                'branch_id.required' => 'กรุณาป้อนสาขา',

                'start_time.required' => 'กรุณาป้อนเวลาเริ่มงาน',

                'address.required' => 'กรุณาป้อนที่อยู่',


            ]
        );

        $input = $request->all();

        $input['start_time'] = Carbon::createFromFormat('d/m/Y', $request->start_time)->format('Y-m-d');

        empolyee::create($input);

        return redirect()->route('home');
    }


    public function showcreate()
    {

        $depant = Depant::all();
        $branches = Branch::all();

        return view('create', compact('branches', 'depant'));
    }

    public function show()
    {
        $empolyees = empolyee::all();
        return view('show', compact('empolyees'));
    }

    public function edit($id)
    {
        $depant = Depant::all();
        $branches = Branch::all();
        $edit = empolyee::with('branch', 'depant')->findOrFail($id);
        // dd($edit);
        return view('edit', compact('edit','branches', 'depant'));
    }


    
}
