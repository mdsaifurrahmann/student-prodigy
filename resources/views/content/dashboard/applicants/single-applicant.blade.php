@extends('layouts/contentLayoutMaster')

@section('title', 'Applicant Details')

@section('vendor-style')
   {{-- vendor css files --}}

@endsection

@section('content')
   <!-- Basic table -->

   {{ $applicant->student_name_bangla }}

@endsection


@section('vendor-script')
   {{-- vendor files --}}

@endsection
@section('page-script')
   {{-- Page js files --}}

@endsection
