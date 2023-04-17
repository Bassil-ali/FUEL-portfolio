@extends('site.layouts.app')

@section('content')

  <!-- ======= hero Section ======= -->
  @include('site.index.includes.slide')


  <main id="main">
    
    <!-- ======= About Section ======= -->
    @include('site.index.includes.about')
    <!-- End About Section -->

     <!-- ======= Features Section ======= -->
    @include('site.index.includes.Features')
   

    <!-- ======= Testimonials Section ======= -->
    @include('site.index.includes.testimonials')


    <!-- ======= Facts Section ======= -->
    @include('site.index.includes.facts')    
    <!-- End Facts Section -->

    <!-- ======= Contact Section ======= -->
    @include('site.index.includes.contact')
    

  </main><!-- End #main -->

@endsection