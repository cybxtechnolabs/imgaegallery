@extends('layouts.app')

@section('content')

<!-- 1. Add latest jQuery and fancybox files -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.min.js"></script>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css" />
<script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>


<h3 class="alert alert-info">{{$gallery->name}}</h3>
    <div class="container mb-5">
        

        @if(session()->has('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
        @endif

        <a href="{{ url()->previous() }}" class="btn btn-default">Go Back</a>
        <a href="{{ url('/images/create/'.$gallery->id) }}" class="btn btn-primary">Upload Images</a>
        

        <div class="div mt-3"></div>

        <!-- Display images here -->
            
            @if(count($galleryimages) > 0)
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
                                    <!-- <h3>{{$image->name}}</h3> -->
                                    <!-- <span class="tag">Model</span> -->
                                </div>
                            </a>
                            <a class="btn btn-danger btn-sm btn-delete-record m-1" href="{{ url('image/delete/'.$image->id) }}">
                                <i class="fas fa-trash-alt">
                                </i>
                                Delete
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
            @else
            <br />
            <div class="row">
                <div class="div m-3">No Images in this Gallery! You can upload</div>
            </div>
            @endif
        
    </div>

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js" type="text/javascript"></script>
    <script type="text/javascript">
        var site_url = "{{ url('/') }}";
        $(document).on('click','.btn-delete-record',function(){

            if(confirm('Are you sure ?'))
            {
                // $url = $(this).attr('href');
                // $('#global_delete_form').attr('action',$url);
                // $('#global_delete_form #delete_id').val($(this).data('id'));
                // $('#global_delete_form').submit();
                $(e.target).closest('form').submit()
            }

            return false;
        });
    </script> 

@endsection