@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <todos></todos>
            </div>
            <div class="col-md-6">
                <burndown></burndown>
            </div>
        </div>
    </div>
@stop