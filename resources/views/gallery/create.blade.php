@extends('layouts.app')

@section('content')


<div class="container mt-5">
    
    <div class="row justify-content-md-center">
        <div class="align-middle">
            <h3 class="card-title">Create Gallery</h3>
            <form action="{{ route('gallery.store') }}" method="post">
            {{ csrf_field() }}
                <div class="form-group">
                    <label for="name">Gallery Title</label>
                    <input type="text" class="form-control" id="name"  name="name">
                </div>
                
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
<div>
@endsection