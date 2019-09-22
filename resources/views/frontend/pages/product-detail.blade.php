@extends('frontend.layouts.master')

@section('title')
    Chi tiết thú cưng - PETSHOP
@endsection

@section('custom-css')
@endsection
@section('main-content')
    @include('frontend.widgets.product-info', ['tc' => $tc, 'hinhanhlienquan' => $danhsachhinhanhlienquan])
@endsection
@section('custom-scripts')
@endsection