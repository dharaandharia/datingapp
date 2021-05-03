@extends('layouts.main')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/subscribtion.css') }}">
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 offset-md-1 offset-lg-0 col-lg-6">
                <div class="sub prem my-4 m-xl-5">
                    <div class="sub-header bg-prem text-center">
                        <div class="h3 m-0"><b>PREMIUM</b></div>
                        <div class="display-4"><b>£ 10.99</b></div>
                        <div class="h4 m-0">per month</div>
                    </div>
                    <div class="sub-body p-4">
                        <div class="d-flex align-items-center my-2"><i class="fas fa-check fa-2x"></i><span class="h5 ml-3 my-0">Unlimited likes.</span></div>
                        <div class="d-flex align-items-center my-2"><i class="fas fa-check fa-2x"></i><span class="h5 ml-3 my-0">Passport all over the world.</span></div>
                        <div class="d-flex align-items-center my-2"><i class="fas fa-check fa-2x"></i><span class="h5 ml-3 my-0">Rewind to give second chance.</span></div>
                        <div class="d-flex align-items-center my-2"><i class="fas fa-check fa-2x"></i><span class="h5 ml-3 my-0">One free Push per month.</span></div>
                        <div class="d-flex align-items-center my-2"><i class="fas fa-check fa-2x"></i><span class="h5 ml-3 my-0">Additional Top Likes to stand out from the crowd.</span></div>
                    </div>
                    <div class="sub-footer text-center pb-4">
                        <a class="btn btn-primary btn-lg">Buy Now</a>
                    </div>
                </div>
            </div>
    
            <div class="col-md-10 offset-md-1 offset-lg-0 col-lg-6">
                <div class="sub gold  my-4 m-xl-5">
                    <div class="sub-header bg-gold text-center">
                        <div class="h3 m-0"><b>GOLD</b></div>
                        <div class="display-4"><b>£ 10.99</b></div>
                        <div class="h4 m-0">per month</div>
                    </div>
                    <div class="sub-body p-4">
                        <div class="d-flex align-items-center my-2"><i class="fas fa-check fa-2x"></i><span class="h5 ml-3 my-0">Unlimited likes.</span></div>
                        <div class="d-flex align-items-center my-2"><i class="fas fa-check fa-2x"></i><span class="h5 ml-3 my-0">Passport all over the world.</span></div>
                        <div class="d-flex align-items-center my-2"><i class="fas fa-check fa-2x"></i><span class="h5 ml-3 my-0">Rewind to give second chance.</span></div>
                        <div class="d-flex align-items-center my-2"><i class="fas fa-check fa-2x"></i><span class="h5 ml-3 my-0">One free Push per month.</span></div>
                        <div class="d-flex align-items-center my-2"><i class="fas fa-check fa-2x"></i><span class="h5 ml-3 my-0">Five Top Likes per day.</span></div>
                        <div class="d-flex align-items-center my-2"><i class="fas fa-check fa-2x"></i><span class="h5 ml-3 my-0">Likes You feature.</span></div>
                        <div class="d-flex align-items-center my-2"><i class="fas fa-check fa-2x"></i><span class="h5 ml-3 my-0">More profile controls.</span></div>
                        <div class="d-flex align-items-center my-2"><i class="fas fa-check fa-2x"></i><span class="h5 ml-3 my-0">Attract attention, stand out and make friends.</span></div>
                    </div>
                    <div class="sub-footer text-center pb-4">
                        <a class="btn btn-danger btn-lg">Buy Now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection