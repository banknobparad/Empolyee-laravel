@extends('layout')
@section('title')
@section('content')

    <h2 class="text text-center py-3">แก้ไขข้อมูล</h2>

    <form action="{{ route('update' , $edit->id)}}" method="POST">

        @csrf

        <div class="row g-2 justify-content-center">

            <div class="col-md-2 col-10">
                <label for="title" class="form-label">คำนำหน้า</label>
                <select id="title" class="form-control" onchange="onSelect()">
                    <option value="" selected disabled>กรุณาเลือก</option>
                    <option value="นาย">นาย</option>
                    <option value="นาง">นาง</option>
                    <option value="นางสาว">นางสาว</option>
                </select>
            </div>


            <div class="col-md-8 col-10">
                <label for="name" class="form-label">ชื่อ</label>
               
                <div class="input-group">
                    <input type="text" name="name" id="nameInput"
                    class="form-control @error('name') is-invalid @enderror @if (!empty(old('name'))) is-valid @endif"
                    value="{{ old('name', $edit->name) }}" data-old-value="{{ old('title') }}">
                    <button type="button" onclick="myFunction()" class="btn btn-primary form-control-feedback"><i class="bi bi-clipboard"></i></button>
                </div>
               
                @error('name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>


            <div class="col-10">
                <label for="tel" class="form-label">รหัสพนักงาน</label>
                    <div class="input-group">
                        <input type="text" value="{{ old('user_id', $edit->user_id) }}" name="user_id" class="form-control">
                        <button type="button" onclick="myFunctions()" class="btn btn-primary form-control-feedback"><i class="bi bi-clipboard"></i></button>
                    </div>
            </div>


            <div class="col-10">
                <label for="card_num" class="form-label">เลขบัตรประชาชน</label>
                <input type="text" value="{{ old('card_num', $edit->card_num) }}" name="card_num"
                    class="form-control
                     @if (!$errors->has('card_num') && strlen(old('card_num')) === 13) is-valid @endif @error('card_num') is-invalid @enderror">

                @error('card_num')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>



            <div class="col-10">
                <label for="tel" class="form-label">เบอร์โทร</label>
                <input type="text" value="{{ old('tel', $edit->tel) }}" name="tel"
                    class="form-control @error('tel') is-invalid @enderror @if (!$errors->has('tel') && strlen(old('tel')) === 10 && is_numeric(old('tel'))) is-valid @endif">

                @error('tel')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>


            {{-- <p>{{ $edit->depant_id }}</p> --}}

            <div class="col-10">
                <label for="depant_id" class="form-label">ตำแหน่ง</label>
                <select name="depant_id" class="form-control">
                    <option value="" selected disabled>{{ $edit->depant_id }}</option>
                    @foreach ($depant as $item)
                        <option value="{{ $item->id }}" {{ session('depant_id') == $item->id ? 'selected' : '' }}>
                            {{ $item->name }}
                        </option>
                    @endforeach
                </select>
            </div>


            @error('depant_id')
                <span class="text-danger">{{ $message }}</span>
            @enderror




            <div class="col-10">
                <label for="branch_id" class="form-label">สาขา</label>
                <select name="branch_id" class="form-control">
                    <option value="" selected disabled>เลือกสาขา</option>
                    @foreach ($depant as $item)
                        <option value="{{ $item->name }}" {{ old('branch_id') == $item->id ? 'selected' : '' }}>
                            {{ $item->name }}
                        </option>
                    @endforeach
                </select>
                @error('branch_id')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>


            <div class="col-10">
                <label for="address" class="form-label">ที่อยู่</label>
                <input type="text" value="{{ old('address', $edit->address) }}" name="address" class="form-control">

                @error('address')
                    <span class="text-danger">{{ $message }}</span>
                @enderror

            </div>


            <div class="col-10">
                <label for="start_time" class="form-label">วันที่เริ่มงาน</label>
                <input type="text" name="start_time" class="form-control datepicker" value="{{ old('start_time') }}">

                @error('start_time')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>



            <div class="col-10 py-3 text-end mb-5">
                <button type="submit" class="btn btn-primary pull-right">อัพเดท</button>
            </div>

        </div>
    </form>

    <script>
        function onSelect() {
            var title = document.getElementById('title').value;
            var nameInput = document.getElementById('name');
            var currentName = nameInput.value;

            var regex = /^(นาย|นางสาว|นาง)\s/;
            if (regex.test(currentName)) {
                currentName = currentName.replace(regex, '');
            }

            nameInput.value = title + ' ' + currentName;
        }
    </script>
    <script>
        function myFunction() {
            var copyText = document.getElementById("nameInput");
            copyText.select();
            copyText.setSelectionRange(0, 99999)
            document.execCommand("copy");
            // alert("Copied the text: " + copyText.value);
        }
    </script>
    <script>
        function myFunctions() {
            var copyText = document.getElementById("number");
            copyText.select();
            copyText.setSelectionRange(0, 99999)
            document.execCommand("copy");
        }
    </script>


    @push('scripts')
        <script>
            flatpickr(".datepicker", {
                dateFormat: "d/m/Y",
            });
        </script>
    @endpush
@endsection
