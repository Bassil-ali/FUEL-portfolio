@extends('site.layouts.app')

@section('content')

    <!-- ======= hero Section ======= -->
    @include('site.index.includes.slide')

    <main id="main">

        <!-- ======= About Section ======= -->
        @include('site.index.includes.about')
        <!-- End About Section -->

         <!-- ======= Features Section ======= -->
        @include('site.index.includes.features')
        <!-- End Features Section -->

        <!-- ======= Testimonials Section ======= -->
        @include('site.index.includes.testimonials')
        <!-- End testimonials Section -->

         <!-- ======= Contact Section ======= -->
        @include('site.index.includes.branches')
        <!-- End contact Section -->

        <!-- ======= Facts Section ======= -->
        @include('site.index.includes.facts')    
        <!-- End facts Section -->

         <!-- ======= Testimonials Section ======= -->
        @include('site.index.includes.success_partners')
        <!-- End testimonials Section -->

        <!-- ======= Contact Section ======= -->
        @include('site.index.includes.contact')
        <!-- End contact Section -->

    </main><!-- End #main -->

@endsection