@extends('layouts.app')

@section('content')
@if($Gallery)
<div class="container mt-5">
<h3 class="card-title">Update Gallery</h3>
    <div class="row justify-content-md-center">
    
    <form action="{{ route('gallery.update',['id'=> $Gallery->id]) }}" method="post">    
    {{ csrf_field() }}
        <div class="form-group">
            <label for="name">Gallery Title</label>
            <input type="text" class="form-control" id="name"  name="name" value="{{$Gallery->name}}">
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
<div>
@else
<div class="container">
<div class="row">Missing Gallery in records! </div>
</div>
@endif
@endsection