@extends('frontend.layouts.master')

@section('title')
    Chi tiết đơn hàng
@endsection

@section('custom-css')
@endsection
@section('main-content')
    @include('frontend.widgets.order-info',[$data = $chitiet, $tam=$tamtinh,$dh=$donhang])
@endsection
@section('custom-scripts')

@endsection