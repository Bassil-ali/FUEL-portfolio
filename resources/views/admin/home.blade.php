@extends('admin.layouts.app')

@section('content')

    <h2>{{ getTransSetting('system_name', app()->getLocale()) }}</h2>

@endsection