@extends('layouts.app')
@section('content')
<main class="login-form">
    <div class="cotainer">
    
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                   
                        <div class="row">
                            <div class="col-xs-4 col-lg-4">
                                Dashboard
                            </div>
                            <div class="col-xs-4 col-lg-4 text-center">
                                <a href="{{ route('admin.products') }}">Products</a>
                            </div>
                            <div class="col-xs-4  col-lg-4 text-right">
                                <a href="{{ route('logout') }}">Logout</a>
                            </div>
                        </div>                    
                    </div>
                    
                    <div class="card-body">
                        
                    @if(Session::get("success"))
                        <div class="alert alert-success">
                            {{ Session::get("success") }}
                        </div>
                    @endif

                    You are on dashboard page     
                    <div class="row mb-3">
                        <div class="col-xl-3 col-sm-6 py-2">
                            <div class="card bg-success text-white h-100">
                                <div class="card-body bg-success">
                                    <div class="rotate">
                                        <i class="fa fa-user fa-4x"></i>
                                    </div>
                                    <h6 class="text-uppercase">{{$end_point_response['base']}}</h6>
                                    <h1 class="h5">1</h1>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-sm-6 py-2">
                            <div class="card text-white bg-danger h-100">
                                <div class="card-body bg-danger">
                                    <div class="rotate">
                                        <i class="fa fa-list fa-4x"></i>
                                    </div>
                                    <h6 class="text-uppercase">{{ __("USD")}}</h6>
                                    <h1 class="h5">{{$end_point_response['rates']['USD']}}</h1>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-sm-6 py-2">
                            <div class="card text-white bg-info h-100">
                                <div class="card-body bg-info">
                                    <div class="rotate">
                                        <i class="fa fa-twitter fa-4x"></i>
                                    </div>
                                    <h6 class="text-uppercase">{{ __("RON")}}</h6>
                                    <h1 class="h5">{{$end_point_response['rates']['RON']}}</h1>
                                </div>
                            </div>
                        </div>                        
                    </div>
                    
                    <div class="row mb-3">
                        <div class="col-xl-3 col-sm-6 py-2">
                            <div class="card bg-success text-white h-100">
                                <div class="card-body bg-success">
                                    <div class="rotate">
                                        <i class="fa fa-user fa-4x"></i>
                                    </div>
                                    <h6 class="text-uppercase">Verified User</h6>
                                    <h1 class="h5">{{ $get_active_verified_user }}</h1>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-sm-6 py-2">
                            <div class="card text-white bg-danger h-100">
                                <div class="card-body bg-danger">
                                    <div class="rotate">
                                        <i class="fa fa-list fa-4x"></i>
                                    </div>
                                    <h6 class="text-uppercase">Attached Products</h6>
                                    <h1 class="h5">{{$attached_active_products}}</h1>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-sm-6 py-2">
                            <div class="card text-white bg-info h-100">
                                <div class="card-body bg-info">
                                    <div class="rotate">
                                        <i class="fa fa-twitter fa-4x"></i>
                                    </div>
                                    <h6 class="text-uppercase">Active Products</h6>
                                    <h1 class="h5">{{ $products }}</h1>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-sm-6 py-2">
                            <div class="card text-white bg-warning h-100">
                                <div class="card-body">
                                    <div class="rotate">
                                        <i class="fa fa-share fa-4x"></i>
                                    </div>
                                    <h6 class="text-uppercase">Products not belongs to user</h6>
                                    <h1 class="h5">{{ $products_not_belongsto_user }}</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row mb-3">
                        <div class="col-xl-3 col-sm-6 py-2">
                            <div class="card bg-success text-white h-100">
                                <div class="card-body bg-success">
                                    <div class="rotate">
                                        <i class="fa fa-user fa-4x"></i>
                                    </div>
                                    <h6 class="text-uppercase">Get All Active Purchase Products Qty</h6>
                                    <h1 class="h5">{{ $get_all_active_purchase_product_qty }}</h1>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-sm-6 py-2">
                            <div class="card text-white bg-danger h-100">
                                <div class="card-body bg-danger">
                                    <div class="rotate">
                                        <i class="fa fa-list fa-4x"></i>
                                    </div>
                                    <h6 class="text-uppercase">Get All Active Purchase Products Price</h6>
                                    <h1 class="h5">{{$get_all_active_purchase_product_price}}</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <table id="product-list" class="display" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Amount</th>                                                      
                                </tr>
                                <tbody>
                                    @if(!empty($get_all_active_products_per_user))
                                        @foreach($get_all_active_products_per_user as $user)
                                            <tr>
                                                <td>
                                                    {{ $user->name }}
                                                </td>
                                                <td>
                                                    @if($user->user_products_sum_total_amount == "")
                                                        {{ __("0") }}
                                                    @else
                                                        {{ $user->user_products_sum_total_amount }}
                                                    @endif                                                    
                                                </td>                                                
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </thead>
                        </table>                  
                    </div>
                      

                        

                  </div>

              </div>

          </div>

      </div>

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