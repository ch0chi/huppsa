@extends('layouts.app')

@section('content')

    <div class="content">
        <div class="inner flx-column">
            <h1>Manage Cards</h1>
            <div class="list-cards">

            </div>

            <div class="add-card">
                <form role="form" method="POST" action="{{url('admin/manageCards')}}" enctype="multipart/form-data" autocomplete="off">
                    {{ csrf_field() }}
                    <div class="" {{{$errors->has('card_name') ? 'has-error' : ''}}}>
                        <label for="card_name">Card Name</label>
                        <input type="text" id="card_name" name="card_name">
                        @if($errors->has('card_name'))
                            <span class="help-block"><strong>{{$errors->first('card_name')}}</strong></span>
                        @endif
                    </div>

                    <div class="" {{$errors->has('card_info') ? 'has-error' : ''}}>

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
    </div>

@endsection