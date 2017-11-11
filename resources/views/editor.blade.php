<!DOCTYPE html>

<html>

<head>

    <title>Upload Multiple Images using dropzone.js and Laravel</title>

    <script src="http://demo.itsolutionstuff.com/plugin/jquery.js"></script>

    <link rel="stylesheet" href="http://demo.itsolutionstuff.com/plugin/bootstrap-3.min.css">

</head>

<body>


<div class="container">

    <div class="row">

       <div class="form-group col-md-12">
         <label>Content</label>
         <textarea name="txtContent" class="form-control " id="editor1"></textarea>
        </div> 

    </div>

</div>


<script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
<script> CKEDITOR.replace('editor1'); </script>


</body>

</html>