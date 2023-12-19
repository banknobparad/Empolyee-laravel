@extends('layout')
@section('title')

@section('content')
    <div class="container py-4">
        <div class="row">
            <div class="col-12 py-4">
                <div class="text-center py-2">
                    <h1>โชว์ข้อมูล</h1>
                </div>
                <br>

                <table class="display" id="myTable">
                    <thead class="table-light ">
                        <tr>
                            <th scope="col">รหัสพนักงาน</th>
                            <th scope="col">ชื่อ</th>
                            <th scope="col">ตำแหน่ง</th>
                            <th scope="col">สาขา</th>
                            <th scope="col"></th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($empolyees as $item)
                            <tr>
                                <th>{{ $item->user_id }}</th>
                                <th>{{ $item->name }}</th>
                                <td>{{ $item->depant->name }}</td>
                                <td>{{ $item->branch->name }}</td>
                                <td>
                                    <form action="{{ route('delete', $item->id) }}">
                                        <a href="{{ route('edit', $item->id) }}" class="btn btn-warning btn-sm"><i class="bi bi-pencil-square"></i></a>
                                        <input name="_method" type="hidden" value="DELETE">
                                        <button type="submit"
                                            class="btn btn-xs btn-danger btn-flat show-alert-delete-box btn-sm"
                                            data-toggle="tooltip" title='Delete'><i class="bi bi-trash3-fill"></i></button>
                                    </form>
                                   

                                   
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <style>
        table#myTable {
            width: 100%;
            border-collapse: collapse;
            border: 1px solid #564c4c;
        }

        thead th {
            background-color: #291414;
            color: #ffffff;
            text-align: center;
        }

        tbody td {
            padding: 5px;
        }
    </style>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.js"></script>

    <script type="text/javascript">
        $('.show-alert-delete-box').click(function(event) {
            var form = $(this).closest("form");
            var name = $(this).data("name");
            event.preventDefault();
            swal({
                title: "คุณแน่ใจหรือไม่ว่าต้องการลบ ???",
                text: "หากคุณลบสิ่งนี้มันจะหายไปและไม่สามารถกู้กลับมาได้!!!",
                icon: "warning",
                type: "warning",
                buttons: ["Cancel", "Yes!"],
                confirmButtonColor: '#ff0000',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((willDelete) => {
                if (willDelete) {
                    form.submit();
                }
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        });
    </script>

@endsection
