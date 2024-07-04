<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.min.js"></script>
    
</head>
<body>
   

@include('partials.header')

@include('partials.content')

@include('partials.footer')

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
<script src="https://cdn.tiny.cloud/1/116r2z0hnqbkxovlj361axxzjoggjf3uhxx3fuqh22yebfzu/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>

 @yield('scripts')
<script>
    $(document).ready(function() {
        $('#posts').select2();
    });
    
    document.addEventListener('DOMContentLoaded', function() {
        tinymce.init({
            selector: 'textarea#postContent',
            plugins: 'autoresize',
            toolbar: 'undo redo | formatselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat',
            autoresize_bottom_margin: 16,
            autoresize_max_height: 400,
            menubar: false
        });
    });
</script>

 <script>
    Dropzone.autoDiscover = false;
    var myDropzone = new Dropzone("#dropzoneArea", {
        url: "{{ route('file-upload') }}",
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        maxFilesize: 5, // Max file size in MB
        acceptedFiles: ".jpeg,.jpg,.png", // Accepted file types
        addRemoveLinks: true, // Show remove links
        init: function() {
            this.on("success", function(file, response) {
                console.log("File uploaded:", response);
                document.getElementById('photo').value = response.file_name;
            });
            this.on("thumbnail", function(file, dataUrl) {
                var imagePreview = document.getElementById('uploadedImage');
                imagePreview.src = dataUrl;
                imagePreview.style.display = 'block';
            });
        }
    });


</script>





</body>
</html>
