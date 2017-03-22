@extends('base.base')


@section('content')

    @include('modules.home')
    @include('modules.services')
    @include('modules.referrals')

    @include('modules.drivers')
    @include('modules.routes')
    @include('modules.subsidiaries')
    @include('modules.tabulators')
    @include('modules.geolocation')
    @include('modules.messaging')
    @include('modules.paysheets')

    @include('base.modals')
    @include('base.templates')

@endsection


@section('scripts')

    @include('scripts.javascript')

@endsection