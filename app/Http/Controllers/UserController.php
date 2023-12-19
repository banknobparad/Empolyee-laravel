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
                'name' => 'required|regex:/^[a-zA-Zก-๏\s]+$/u',
                'card_num' => 'required|numeric|regex:/^\d{13}$/',
                'tel' => 'required|numeric|regex:/^\d{10}$/|',
                'depant_id' => 'required|exists:branches,id',
                'branch_id' => 'required',
                'start_time' => 'required',
                'address' => 'required',
            ],

            [
                'name.required' => 'กรุณาป้อนชื่อ',
                'name.regex' => 'กรุณาป้อนชื่อเป็นตัวหนังสือเท่านั้น',

                'card_num.required' => 'กรุณาป้อนเลขบัตรประชาชน',
                'card_num.numeric' => 'กรุณาป้อนเลขบัตรประชาชนเป็นตัวเลขเท่านั้น',
                'card_num.regex' => 'กรุณาป้อนเลขบัตรประชาชนเป็น 13 ตัวอักษร',


                'tel.required' => 'กรุณาป้อนเบอร์โทร',
                'tel.numeric' => 'กรุณาป้อนเบอร์โทรเป็นตัวเลขเท่านั้น',
                'tel.regex' => 'กรุณาป้อนเบอร์โทรเป็น 10 ตัวอักษร',

                'depant_id.required' => 'กรุณาป้อนตำแหน่ง',
                'depant_id.exists' => 'ข้อมูลไม่ถูกต้อง',

                'branch_id.required' => 'กรุณาป้อนสาขา',

                'start_time.required' => 'กรุณาป้อนเวลาเริ่มงาน',

                'address.required' => 'กรุณาป้อนที่อยู่',
            ]
        );

        $input = [
            'name' => $request->name,
            'card_num' => $request->card_num,
            'user_id' => $request->user_id,
            'tel' => $request->tel,
            'depant_id' => $request->depant_id,
            'branch_id' => $request->branch_id,
            'start_time' => $request->start_time,
            'address' => $request->address,

        ];

        $input['start_time'] = Carbon::createFromFormat('d/m/Y', $request->start_time)->format('Y-m-d');

        empolyee::create($input);
        
        notify()->success('แจ้งเตือน ⚡️', 'เพิ่มข้อมูลสำเร็จ');

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
        
        $empolyees = empolyee::with('branch', 'depant')->get();

        // dd($empolyees->toArray());
        return view('show', compact('empolyees')); //oder by 
    }

    public function edit($id)
    {
        $depant_edit = Depant::all();
        $branches_edit = Branch::all();

        $edit = empolyee::with('branch', 'depant')->findOrFail($id);

        // dd($edit->toArray());
        return view('edit', compact('edit', 'depant_edit', 'branches_edit'));
    }

    public function update(Request $request, $id)
    {
        $request->validate(
            [
                'name' => 'required|regex:/^[a-zA-Zก-๏\s]+$/u',
                'card_num' => 'required|numeric|regex:/^\d{13}$/',
                'tel' => 'required|numeric|regex:/^\d{10}$/|',
                'depant_id' => 'required|exists:branches,id',
                'branch_id' => 'required',
                'start_time' => 'required',
                'address' => 'required',
            ],

            [
                'name.required' => 'กรุณาป้อนชื่อ',
                'name.regex' => 'กรุณาป้อนชื่อเป็นตัวหนังสือเท่านั้น',

                'card_num.required' => 'กรุณาป้อนเลขบัตรประชาชน',
                'card_num.numeric' => 'กรุณาป้อนเลขบัตรประชาชนเป็นตัวเลขเท่านั้น',
                'card_num.regex' => 'กรุณาป้อนเลขบัตรประชาชนเป็น 13 ตัวอักษร',


                'tel.required' => 'กรุณาป้อนเบอร์โทร',
                'tel.numeric' => 'กรุณาป้อนเบอร์โทรเป็นตัวเลขเท่านั้น',
                'tel.regex' => 'กรุณาป้อนเบอร์โทรเป็น 10 ตัวอักษร',

                'depant_id.required' => 'กรุณาป้อนตำแหน่ง',
                'depant_id.exists' => 'ข้อมูลไม่ถูกต้อง',


                'branch_id.required' => 'กรุณาป้อนสาขา',

                'start_time.required' => 'กรุณาป้อนเวลาเริ่มงาน',

                'address.required' => 'กรุณาป้อนที่อยู่',


            ]
        );

        $input = [
            'name' => $request->name,
            'card_num' => $request->card_num,
            'user_id' => $request->user_id,
            'tel' => $request->tel,
            'depant_id' => $request->depant_id,
            'branch_id' => $request->branch_id,
            'start_time' => $request->start_time,
            'address' => $request->address,

        ];
        // dd($input);

        $input['start_time'] = Carbon::createFromFormat('d/m/Y', $request->start_time)->format('Y-m-d');
    
        DB::table('empolyees')->where('id', $id)->update($input);
    
        return redirect()->route('home');
    }

    public function delete($id)
        {
            DB::table('empolyees')->where('id',$id)->delete();
            return redirect()->route('home');
        }

}