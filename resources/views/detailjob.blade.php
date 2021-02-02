@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <nav class="navbar navbar-light bg-light">
                        <form class="form-inline">
                            <a href="{{ URL::previous() }}"><span class="oi oi-arrow-left"></span>Back</a>
                    </nav>
                </div>
                <div class="card">
                <div class="card-body">

                        <form class="form-inline">
                        <h6>{{$data->type}} / {{$data->company}}</h6>
                        <h5><strong>{{$data->title}}</strong></h5>

                </div>

                </div>
                <div class="row">
                    <div class="col-sm-8">
                        <div class="card">
                            <div class="card-body">
                                <p class="card-text">{!!$data->description!!}</p>

                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title"><strong>{{$data->company}}</strong></h5>
                                <img src="{{$data->company_logo}}"  width="300" height="200" /> </td>
                                <br>
                                <a href="{{$data->company_url}}">{{$data->company_url}}</a>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <h6 class="card-title"><strong>How To Apply</strong></h6>
                                 <hr>
                                    <p>{!!$data->how_to_apply!!}</p>

                            </div>
                        </div>
                    </div>
                </div>


            </div>

            </form>
        </div>
    </div>

</div>
</div>
@endsection
