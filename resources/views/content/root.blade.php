@extends('layouts/fullLayoutMaster')

@section('title', 'Student Database - Textile Institute Dinajpur')

@section('content')
    <div class="row vh-100">
        <div class="col-12 col-md-6 p-4 py-2 d-flex align-items-md-center align-items-end justify-content-md-end justify-content-center">
            <div class="d-flex justify-content-center align-items-center w-lg-50 w-100">
                <a href="{{route('form')}}" class="">
                    <div class="card">
                        <img src="" alt="" class="card-img-top">
                        <div class="card-body">
                            <h4 class="card-title text-center">Student Form</h4>
                            <p class="card-text text-white-50">
                                If you're a student, you can fill out this form to submit your educational information to your institute.
                            </p>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-12 col-md-6 p-4 py-2 d-flex align-items-md-center align-items-start justify-content-md-start justify-content-center">
            <div class="d-flex justify-content-center align-items-center w-lg-50 w-100">
                <a href="{{route('login')}}" class="">
                    <div class="card">
                        <img src="" alt="" class="card-img-top">
                        <div class="card-body">
                            <h4 class="card-title text-center">Teachers</h4>
                            <p class="card-text text-white-50">
                                If you're a student, you can fill out this form to submit your educational information to your institute.
                            </p>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
@endsection
