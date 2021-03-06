@extends('layouts.app')

@section('content')

    <div class="content admin-manage-cards">

        <div class="inner flx-column">
            <h1>Manage Cards</h1>
            <div class="list-cards">
                @foreach($cards as $card)
                    <div class="card" style='background-image:url("{{url('/storage/'.$card->image)}}")'>
                        <div id="card-functions">
                            <a href="#">Edit Card</a>
                        </div>
                        <h1>{{$card->name}}</h1>
                        <div class="card-body">
                            <p>{{$card->info}}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="add-card">
            <form role="form" method="POST" action="{{url('admin/manageCards')}}" enctype="multipart/form-data" autocomplete="off">
                {{ csrf_field() }}

                <div class="form-group {{$errors->has('card_image') ? 'has-error' : ''}}">

                    <label for="card_image">Card Image</label>
                    <input type="file" id="card_image" name="card_image">

                    @if ($errors->has('card_image'))
                        <span class="help-block"><strong>{{ $errors->first('card_image') }}</strong></span>
                    @endif

                </div>

                <div class=" {{{$errors->has('card_name') ? 'has-error' : ''}}}">

                    <label for="card_name">Card Name</label>
                    <input type="text" id="card_name" name="card_name">

                    @if($errors->has('card_name'))
                        <span class="help-block"><strong>{{$errors->first('card_name')}}</strong></span>
                    @endif

                </div>

                <div class=" {{$errors->has('card_info') ? 'has-error' : ''}}">

                    <label for="card_info">Card Info</label>
                    <input type="text" id="card_info" name="card_info">

                    @if($errors->has('card_info'))
                        <span class="help-block"><strong>{{$errors->first('card_info')}}</strong></span>
                    @endif

                </div>

                <button id="add_card" type="submit" class="btn btn-default">Add</button>
            </form>
        </div>
    </div>

@endsection