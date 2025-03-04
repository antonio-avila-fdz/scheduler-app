@extends('layouts.app')

@section('title', 'Scheduler App')

@section('content')
    <x-users-table :users="$users" />
    <x-next-timezones />
@endsection

@section('footer')
    <x-footer />
@endsection