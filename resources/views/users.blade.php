@extends('adminbase')

@section('title')
Users
@endsection

@section('content')
<div class="hd_dashboard_wrap">

@foreach($meta as $data)
    {{ $data->value }}
@endforeach
</div>
@endsection