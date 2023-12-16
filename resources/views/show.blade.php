@extends('layout')
@section('title')

@section('content')
<div class="container py-4">
    <div class="row">
        <div class="col-12 py-4">
            <div class="text-center py-2">
                <h1>โชว์ข้อมูล</h1>
            </div><br>
            

            <table class="table  table-sm" id="myTable">
                <thead class="table-light ">
                    <tr>
                        <th scope="col">ชื่อ</th>
                        <th scope="col">เบอร์โทร</th>
                        <th scope="col">สาขา</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($empolyees as $item)
                        <tr>
                            <th>{{ $item->name }}</th>
                            <td>{{ $item->tel }}</td>
                            <td>{{ $item->branch_id }}</td>
                            <td>
                                <a href="{{route('edit',$item->id)}}" class="btn btn-warning">แก้ไข</a></td>                        
                            </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

{{-- <style>
table#myTable {
    width: 100%;
    border-collapse: collapse;
    border: 1px solid #ccc;
  }
  
  /* thead th {
    background-color: #000;
    color: #fff;
    text-align: center;
  } */
  
  tbody td {
    padding: 5px;
  }
</style> --}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.js"></script>
<script>
    $(document).ready(function() {
        $('#myTable').DataTable();
    });
</script>

@endsection
