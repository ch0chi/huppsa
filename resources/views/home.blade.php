@extends('layouts.app')

@section('content')
{{--<div class="container">--}}
    {{--<div class="row">--}}
        {{--<div class="col-md-8 col-md-offset-2">--}}
            {{--<div class="panel panel-default">--}}
                {{--<div class="panel-heading">Dashboard</div>--}}

                {{--<div class="panel-body">--}}
                    {{--@if (session('status'))--}}
                        {{--<div class="alert alert-success">--}}
                            {{--{{ session('status') }}--}}
                        {{--</div>--}}
                    {{--@endif--}}

                    {{--You are logged in!--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
{{--</div>--}}

<div class="content">
    <div class="inner card-wrap">
        <div class="list-cards">
            @foreach($cards as $card)
                <div class="card" style='background-image:url("{{url('/storage/'.$card->image)}}")'>
                    <h1>{{$card->name}}</h1>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
