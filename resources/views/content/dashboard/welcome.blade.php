@extends('layouts/detachedLayoutMaster')

@section('title', 'Prodigy Dashboard')

@section('vendor-style')
   <!-- vendor css files -->

@endsection

@section('page-style')

@endsection

@section('content')

   <section id="dashboard-analytics">
      <div class="row">
         <!-- Greetings Card starts -->
         <div class="col-12">
            <div class="card card-congratulations">
               <div class="card-body text-center">
                  <img src="{{ asset('images/elements/decore-left.png') }}" class="congratulations-img-left" alt="card-img-left" />
                  <img src="{{ asset('images/elements/decore-right.png') }}" class="congratulations-img-right" alt="card-img-right" />
                  <div class="avatar avatar-xl bg-primary shadow">
                     <div class="avatar-content">
                        <img class="round" style="object-fit: cover;"
                           src="{{ Auth::user()->profile_photo_url ? Auth::user()->profile_photo_url : asset('images/portrait/small/avatar-s-11.jpg') }}"
                           height="30" width="30" alt="avatar">
                     </div>
                  </div>
                  <div class="text-center">
                     <h1 class="mb-1 text-white">Welcome Back, {{ ucfirst(Auth::user()->name) }}</h1>
                     <p class="card-text w-75 m-auto">
                        I hope you're doing well today. I'm sure you've been busy. Let's get started with some quick stats.
                     </p>
                  </div>
               </div>
            </div>
         </div>
         <!-- Greetings Card ends -->
      </div>
   </section>

@endsection

@section('vendor-script')
   <!-- vendor files -->
@endsection

@section('page-script')
   <!-- Page js files -->
@endsection
