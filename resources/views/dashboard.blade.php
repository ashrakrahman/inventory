@extends('layout')

@section('title', 'Home')

@section('content')
    
    <div class="page-title">
        <div class="title_left">
            <h3>Welcome, {{ $email }}</h3>
        </div>
    </div>

@endsection