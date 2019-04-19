@extends('layouts.vue')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="col-6">
                <game-board></game-board>
            </div>
            <div class="col-4">
                <counter></counter>
            </div>
        </div>
    </div>
@endsection