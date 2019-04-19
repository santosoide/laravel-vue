@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <sidebar-component></sidebar-component>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <app></app>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
