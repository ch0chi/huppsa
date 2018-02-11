@extends('layouts.app')

@section('content')

    <div class="content">
        <h1>Administrator View</h1>
        <div class="inner flx-column">
            <div class="manage_cards">
                <a href="{{url('admin/manageCards')}}">Manage Cards</a>
            </div>
        </div>
    </div>

@endsection