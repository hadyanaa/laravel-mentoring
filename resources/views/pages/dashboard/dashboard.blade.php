@extends('layout.master')

@section('heading')
Dashboard
@endsection

@section('content')
    @if (Auth::user()->role == "admin")
        @include('pages.dashboard.dashboardAdmin')
    @else
        @include('pages.dashboard.dashboardMentor')
    @endif   
@endsection