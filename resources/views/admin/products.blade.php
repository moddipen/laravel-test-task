@extends('layouts.app')
@section('content')
<main class="login-form">
    <div class="cotainer">
        <table id="product-list" class="display" style="width:100%">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Stock</th>
                    <th>Price</th>
                    <th>Image</th>
                    <th>Description</th>
                    <th>Status</th>                    
                </tr>
                <tbody>
                    @if(!empty($products))
                        @foreach($products as $product)
                            <tr>
                                <td>
                                    {{ $product->name }}
                                </td>
                                <td>
                                    {{ $product->stock }}
                                </td>
                                <td>
                                    {{ $product->price }}
                                </td>
                                <td>
                                    {{ $product->description }}
                                </td>
                                <td>
                                    <img height="50" width="50" src="{{ $product->image }}">                                    
                                </td>
                                <td>
                                    @if($product->status == 0)
                                        {{ __("Active") }}
                                    @else
                                        {{ __("In Active") }}
                                    @endif                                    
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </thead>
        </table>
    </div>
</main>
@endsection
@push('css')
    <link rel="stylesheet" href="{{ asset('assets') }}/js/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/js/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/js/datatables.net-select-bs4/css/select.bootstrap4.min.css">
@endpush
@push('js')
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="{{ asset('assets') }}/js/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="{{ asset('assets') }}/js/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="{{ asset('assets') }}/js/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="{{ asset('assets') }}/js/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
    <script src="{{ asset('assets') }}/js/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="{{ asset('assets') }}/js/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="{{ asset('assets') }}/js/datatables.net-buttons/js/buttons.print.min.js"></script>    
    <script src="{{ asset('assets') }}/js/product-list.js"></script>   
@endpush