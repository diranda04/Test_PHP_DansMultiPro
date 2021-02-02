@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                <nav class="navbar navbar-light bg-light">

                <form class="form-inline">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="description">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="location">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="customCheck1" name="full_time">
                        <label class="custom-control-label mr-sm-2" for="customCheck1">Full Time</label>
                    </div>
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form>
                </nav>
                </div>

                <div class="card">
                    <h5>
                        <div class="card-header"><i class="fa fa-align-justify"></i>Job List</div>
                    </h5>
                    <div class="card-body">
                    <div class="table">
                        <table class="table" id="tb_job">
                            <tbody>
                            @foreach($datas as $data)
                                <tr>
                                    <th class="text-left ">
                                        <ul><a href="{{ route('detailjob', $data->id) }}">{{$data->title}}</a></ul>
                                        <ul>{{$data->company}} - {{$data->type}}</ul>
                                    </th>
                                    <td class="text-right ">
                                        <ul>{{$data->location}}</ul>
                                        <ul>{{$data->created_at}}</ul>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                    </div>
                    </div>
                </div>
                {{$datas->links()}}
                <!-- <nav aria-label="Page navigation example">
                <ul class="pagination">
                    <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">Next</a></li>
                </ul>
                </nav> -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
    <!-- <script>
        $.ajax({
            type: "GET",
            url: "//jobs.github.com/positions.json",
            // headers: {  'Access-Control-Allow-Origin': "//jobs.github.com/positions.json",  "Access-Control-Allow-Headers" : "Origin, X-Requested-With, Content-Type, Accept"},
            // crossDomain: true,
            dataType: 'jsonp',
            data: {
                format: 'json'
            },
            error: function() {

            },
            success: function(result){
                console.log(result);
            },
            beforeSend: function(xhr) {
                // xhr.setRequestHeader("Access-Control-Allow-Origin", "//jobs.github.com/positions.json");
                xhr.setRequestHeader("Access-Control-Allow-Headers", "Origin, X-Requested-With, Content-Type, Accept");
            }
        });
    </script> -->
    <!-- <script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.5.1.js"></script> -->
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready( function () {
            $('#tb_job').DataTable();
        } );
    </script>
@endsection