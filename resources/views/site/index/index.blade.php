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
        <!-- End Features Section -->

        <!-- ======= Testimonials Section ======= -->
        @include('site.index.includes.testimonials')
        <!-- End testimonials Section -->

        <!-- ======= Facts Section ======= -->
        @include('site.index.includes.facts')    
        <!-- End facts Section -->

        <!-- ======= Contact Section ======= -->
        @include('site.index.includes.contact')
        <!-- End contact Section -->

    </main><!-- End #main -->

@endsection