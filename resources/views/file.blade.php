<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body><form action="{{route('fileupload.store')}}" method="post" role="form"  enctype="multipart/form-data"> 
{{csrf_field()}}

<input type = "file" class = "form-control"  name="upload_resume" id="resume"  >

<button type="submit">submit</button>

<h2>Modal Example</h2>

</form>   
</body>
</html>
