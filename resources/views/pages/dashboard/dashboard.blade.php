@extends('layout.master')

@section('heading')
Dashboard
@endsection

@section('content')
    @if (Auth::user()->email === "admin@bkpk.com")
        <!-- Sidebar -->
        @include('pages.dashboard.dashboardAdmin')
    @else
        @include('pages.dashboard.dashboardMentor')
        <!-- End of Sidebar -->
    @endif   
@endsection