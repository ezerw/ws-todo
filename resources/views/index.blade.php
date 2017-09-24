@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div style="text-align:center;">
                    <h1>
                        Welcome
                        <small>
                            <a href="{{ route('login') }}">Login</a> or <a href="{{ route('register') }}">Register</a> to Start.
                        </small>
                    </h1>
                </div>
            </div>
        </div>
    </div>
@stop