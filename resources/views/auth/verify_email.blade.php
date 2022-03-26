@extends('layouts.app')
@section('content')
<main class="login-form">

<div class="cotainer">

    <div class="row justify-content-center">

        <div class="col-md-8">

            <div class="card">

                <div class="card-header">Email Verification</div>

                <div class="card-body">

                    @if(Session::get("resent"))
                        <div class="alert alert-success">
                            Email verification link has been sent for verification!
                        </div>
                    @endif
                    Please check your inbox for email verification link
                    <form action="{{ route('verification.message') }}" method="POST">
                        @csrf         
                        <button type="submit" class="btn btn-primary">
                            Click here to request again
                        </button>
                    </form>                     

                </div>

            </div>

        </div>

    </div>

</div>

</main>
@endsection