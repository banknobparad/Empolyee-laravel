@extends('layout')
@section('title')
@section('content')

    <h2 class="text text-center py-3">เพิ่มข้อมูล</h2>
    {{-- @if ($errors->any())
        @foreach ($errors->all() as $error)
            <div>{{ $error }}</div>
        @endforeach
    @endif --}}

    <form action="{{ route('create') }}" method="post">
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
                <input type="text" name="name" id="name"
                    class="form-control @error('name') is-invalid @enderror @if (!empty(old('name'))) is-valid @endif"
                    value="{{ old('name') }}" data-old-value="{{ old('title') }}">

                @error('name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>



            <div class="col-10">
                <label for="card_num" class="form-label">เลขบัตรประชาชน</label>
                <input type="text" value="{{ old('card_num') }}" name="card_num"
                    class="form-control
                    @if (!$errors->has('card_num') && strlen(old('card_num')) === 13) is-valid @endif @error('card_num') is-invalid @enderror">

                @error('card_num')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>


            <div class="col-10">
                <label for="tel" class="form-label">เบอร์โทร</label>
                <input type="text" value="{{ old('tel') }}" name="tel"
                    class="form-control @error('tel') is-invalid @enderror @if (!$errors->has('tel') && strlen(old('tel')) === 10 && is_numeric(old('tel'))) is-valid @endif">

                @error('tel')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>


            <div class="col-10">
                <label for="depant_id" class="form-label">ตำแหน่ง</label>
                <select name="depant_id" class="form-control {{ old('depant_id') && $errors->has('depant_id') ? 'is-invalid' : (old('depant_id') ? 'is-valid' : '') }}">
                    <option value="" selected disabled>เลือกตำแหน่ง</option>
                    @foreach ($depant as $item)
                        <option value="{{ $item->name }}" {{ old('depant_id') == $item->id ? 'selected' : '' }}>
                            {{ $item->name }}
                        </option>
                    @endforeach
                </select>
            
                @error('depant_id')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            






            <div class="col-10">
                <label for="branch_id" class="form-label">สาขา</label>
                <select name="branch_id" class="form-control {{ old('branch_id') && $errors->has('branch_id') ? 'is-invalid' : (old('branch_id') ? 'is-valid' : '') }}">
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
                <input type="text" value="{{ old('address') }}" name="address" class="form-control {{ $errors->has('address') ? 'is-invalid' : ($errors->any() ? 'is-valid' : '') }}">
            
                @error('address')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>


            <div class="col-10">
                <label for="start_time" class="form-label">วันที่เริ่มงาน</label>
                <input type="text" name="start_time" class="form-control datepicker {{ $errors->has('start_time') ? 'is-invalid' : (old('start_time') ? 'is-valid' : '') }}" value="{{ old('start_time') }}">
            
                @error('start_time')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            



            <div class="col-10 py-3 text-end mb-5">
                <button type="submit" class="btn btn-primary pull-right">บันทึก</button>
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


    @push('scripts')
        <script>
            flatpickr(".datepicker", {
                dateFormat: "d/m/Y",
            });
        </script>
    @endpush
@endsection
