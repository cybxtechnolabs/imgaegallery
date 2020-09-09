@extends('layouts.app')

@section('content')
<!-- 1. Add latest jQuery and fancybox files -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.min.js"></script>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css" />
<script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>

    <section class="ftco-section-2">
 
    @if(count($galleryimages) > 0)
    <h3 class="alert alert-info">{{$gallery->name}}</h3>
        <div class="photograhy user mb-3">
            <div class="row no-gutters">
                @foreach($galleryimages as $image)
                    <div class="col-md-4 ftco-animate m-2">
                        <!-- <a href="/images/{{$gallery->id}}/{{$image->path}}" 
                            class="photography-entry img image-popup d-flex justify-content-center align-items-center" 
                            style="background-image: url(/images/{{$gallery->id}}/{{$image->path}});"> -->

                            <a data-fancybox="gallery" href="/images/{{$gallery->id}}/{{$image->path}}" 
                                class="img d-flex justify-content-center align-items-center">
                                <img class="" src="/images/{{$gallery->id}}/{{$image->path}}" name="{{$image->name}}" width="300" height="200">
                            </a>

                            <div class="overlay"></div>
                            <div class="text text-center">
                                <!-- <h3>Work 01</h3>
                                <span class="tag">Model</span> -->
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    @else
        <div class="photograhy mb-3">
            <div class="row no-gutters">
                <div class="col-md-4 ftco-animate m-2">
                    <a href="{{ asset('theme1/images/image_1.jpg') }}" class="photography-entry img image-popup d-flex justify-content-center align-items-center" style="background-image: url({{ asset('theme1/images/image_1.jpg') }});">
                        <div class="overlay"></div>
                        <div class="text text-center">
                            <!-- <h3>Work 01</h3>
                            <span class="tag">Model</span> -->
                        </div>
                    </a>
                </div>
                <div class="col-md-4 ftco-animate m-2">
                    <a href="theme1/images/image_2.jpg" class="photography-entry img image-popup d-flex justify-content-center align-items-center" style="background-image: url(theme1/images/image_2.jpg);">
                        <div class="overlay"></div>
                        <div class="text text-center">
                            <!-- <h3>Work 02</h3>
                            <span class="tag">Nature</span> -->
                        </div>
                    </a>
                </div>
                <div class="col-md-4 ftco-animate m-2">
                    <a href="theme1/images/image_3.jpg" class="photography-entry img image-popup d-flex justify-content-center align-items-center" style="background-image: url(theme1/images/image_3.jpg);">
                        <div class="overlay"></div>
                        <div class="text text-center">
                            <!-- <h3>Work 03</h3>
                            <span class="tag">Fashion</span> -->
                        </div>
                    </a>
                </div>
                <div class="col-md-4 ftco-animate m-2">
                    <a href="theme1/images/image_4.jpg" class="photography-entry img image-popup d-flex justify-content-center align-items-center" style="background-image: url(theme1/images/image_4.jpg);">
                        <div class="overlay"></div>
                        <div class="text text-center">
                            <!-- <h3>Work 04</h3>
                            <span class="tag">Travel</span> -->
                        </div>
                    </a>
                </div>
                <div class="col-md-4 ftco-animate m-2">
                    <a href="theme1/images/image_5.jpg" class="photography-entry img image-popup d-flex justify-content-center align-items-center" style="background-image: url(theme1/images/image_5.jpg);">
                        <div class="overlay"></div>
                        <div class="text text-center">
                            
                        </div>
                    </a>
                </div>
                <div class="col-md-4 ftco-animate m-2">
                    <a href="theme1/images/image_6.jpg" class="photography-entry img image-popup d-flex justify-content-center align-items-center" style="background-image: url(theme1/images/image_6.jpg);">
                        <div class="overlay"></div>
                        <div class="text text-center">
                            
                        </div>
                    </a>
                </div>

                <div class="col-md-4 ftco-animate m-2">
                    <a href="theme1/images/image_7.jpg" class="photography-entry img image-popup d-flex justify-content-center align-items-center" style="background-image: url(theme1/images/image_7.jpg);">
                        <div class="overlay"></div>
                        <div class="text text-center">
                            
                        </div>
                    </a>
                </div>
                <div class="col-md-4 ftco-animate m-2">
                    <a href="theme1/images/image_8.jpg" class="photography-entry img image-popup d-flex justify-content-center align-items-center" style="background-image: url(theme1/images/image_8.jpg);">
                        <div class="overlay"></div>
                        <div class="text text-center">
                            
                        </div>
                    </a>
                </div>
                <div class="col-md-4 ftco-animate m-2">
                    <a href="theme1/images/image_9.jpg" class="photography-entry img image-popup d-flex justify-content-center align-items-center" style="background-image: url(theme1/images/image_9.jpg);">
                        <div class="overlay"></div>
                        <div class="text text-center">
                            
                        </div>
                    </a>
                </div>
                
            </div>
        </div>
    @endif
    </section>
@endsection
