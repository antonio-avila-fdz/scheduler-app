@extends('layouts.app')

@section('title', 'Scheduler App')

@section('content')
    <x-users-table :users="$users" />
@endsection

@section('footer')
    <x-footer />
@endsection