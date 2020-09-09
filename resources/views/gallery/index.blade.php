@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
        <section class="ftco-section bg-light ftco-bread">
				<div class="container">
					<div class="row no-gutters slider-text align-items-center">
                        <div class="col-md-9 ftco-animate">
                            <p class="breadcrumbs"><span>Gallery</span></p>
                            
                                @if(session()->has('success'))
                                    <div class="alert alert-success">
                                        {{ session()->get('success') }}
                                    </div>
                                @endif
                            
                        </div>
	                </div>
				</div>
		</section>
        
        <section class="ftco-section-2">
            <div class="container">
                <div class="sidebar-box ftco-animate">
	                <!-- <h3 class="sidebar-heading">Gallery List</h3> -->
                    @if(count($userGalleries))
                    <div class="row justify-content-md-center">
            
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <!-- <th>#</th> -->
                                <th>Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                    
                        <tbody>
                        @foreach($userGalleries as $gallery)
                            <tr>
                                <!-- <td>1</td> -->
                                <td>
                                    <a href="{{ url('gallery/'.$gallery->id) }}">{{ $gallery->name }}</a>
                                </td>
                                <td>
                                    <a class="btn btn-info btn-sm" href="{{ url('gallery/edit/'.$gallery->id) }}">
                                        <i class="fas fa-pencil-alt">
                                        </i>
                                        Edit
                                    </a>

                                    <a class="btn btn-danger btn-sm btn-delete-record" href="{{ url('gallery/delete/'.$gallery->id) }}">
                                        <i class="fas fa-trash-alt">
                                        </i>
                                        Delete
                                    </a>

                                    <a class="btn btn-warning btn-sm " 
                                        href="{{ url('') }}" 
                                        data-toggle="modal" 
                                        data-target="#yourModal{{$gallery->id}}">
                                            <i class="fas fa-share-alt">
                                            </i>
                                        Share
                                    </a>
                                    
                                </td>
                            </tr>

                            <!-- Modal -->
                        <div class="modal" id="yourModal{{$gallery->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Share link to {{$gallery->name}}</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                </div>
                                <div class="modal-body">
                                    <div class="input-group input-group-lg">
                                        <input id="shareLink" type="text" class="form-control" value="{{ url('link/'.$gallery->slug) }}" readonly>
                                    <div class="input-group-btn">
                                        <!-- <button class="btn btn-default" type="submit"><i class="fal fa-copy"></button> -->
                                        <a class="btn " onclick="copyshareLink()"><i class="fal fa-copy fa-2x"></a></i>
                                    </div>
                                    </div>
                                </div>
                            </div>
                            </div>
                        </div>
                            @endforeach
                        </tbody>
                    
                    </table>
                </div>
                    @else
                        <div>
                            <div colspan="6" align="center">No gallery. Add One!</div>
                        </div>
                    @endif
	            </div>
            </div>
        </section>
        
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

            function copyshareLink() {
                /* Get the text field */
                var copyText = document.getElementById("shareLink");

                /* Select the text field */
                copyText.select(); 
                copyText.setSelectionRange(0, 99999); /*For mobile devices*/

                /* Copy the text inside the text field */
                document.execCommand("copy");

                /* Alert the copied text */
                //alert("Copied the text: " + copyText.value);
            }
        </script> 
@endsection