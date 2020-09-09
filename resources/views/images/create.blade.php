@extends('layouts.app')

@section('content')
<!-- css -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/min/dropzone.min.css">
<!-- csrf token --> 
<meta name="_token" content="{{csrf_token()}}" />


    <div class="container">
        <h1>Upload Images</h1>
        <a href="{{ url()->previous() }}" class="btn btn-info">Go Back</a>
        <div class="row">
            <div class="col-md-12">
                <h4 class="text-center font-weight-bold">Multiple Images Upload</h4>
                <form method="post" action="{{route('images.upload')}}" enctype="multipart/form-data"
                            class="dropzone" id="dropzone">
                @csrf
                </form>
            </div>
        </div>
    </div>




    <!-- Script -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/dropzone.js"></script>

    <script type="text/javascript">
        Dropzone.options.dropzone =
        {
            maxFiles: 50,
            maxFilesize: 10,
            renameFile: function(file) {
               // var dt = new Date();
               // var time = dt.getTime();

                var filename = file.name;
                filename = filename.replace(/\s+/g, '-');

               // var filenameOnly = filename.split('.').shift();
              //  var extension = filename.split('.').pop();
               // return filenameOnly + '_' + time + '.' + extension;
               //we will handle unique filename in controller 
               return filename;
            },
            acceptedFiles: ".jpeg,.jpg,.png,.gif",
            addRemoveLinks: true,
            timeout: 5000000,
            removedfile: function(file)
            {
                var name = file.upload.filename;
                $.ajax({
                    headers: {
                                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                            },
                    type: 'POST',
                    url: '{{ url("/image/delete") }}',
                    data: {filename: name},
                    success: function (data){
                        //TODO we will display flash
                        console.log("File has been successfully removed!!");
                    },
                    error: function(e) {
                        console.log(e);
                    }});
                    var fileRef;
                    return (fileRef = file.previewElement) != null ?
                    fileRef.parentNode.removeChild(file.previewElement) : void 0;
            },
            success: function(file, response)
            {
                $('.dz-filename').css('position','relative');
                $('.dz-filename').css('top','-55px');
                $('.dz-success-mark').css('border-radius', '50%');
                $('.dz-success-mark').css('background', 'green');
                $('.dz-success-mark').css('opacity', '1');
                $(".dz-error-mark").css("display", "none");

               // window.location.href='{{ route('images.index',['id'=> $gallery_id]) }}';
            },
            error: function(file, response)
            {
                 $('.dz-filename').css('position','relative');
                 $('.dz-filename').css('top','-55px');
                 $('.dz-error-mark').css('border-radius', '50%');
                 $('.dz-error-mark').css('background', 'red');
                 $('.dz-error-mark').css('opacity', '1');
                 $(".dz-success-mark").css("display", "none");
                 alert(response);
                //return false;
            }
            // this.on("error", function(file, message) { 
            //             alert(message);
            //             this.removeFile(file); 
            // });
        };
    </script>


@endsection