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
                                   

                          
                      

                        

                  </div>

              </div>

          </div>

      </div>

  </div>

</main>
@endsection