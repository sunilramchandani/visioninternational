<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Vision International</title>

    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <!-- Bower includes -->
    <link rel="stylesheet" href="{{ asset('css/bower_bundle.css')  }}">
    <link rel="stylesheet" href="{{ asset('css/bundle.css')  }}">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('css/contact-us.css') }}">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

    <!-- Google Font -->
    <link rel="stylesheet"
          href="{{ asset('fonts/googlefonts.css') }}">
</head>
<body class="hold-transition skin-blue sidebar-mini">
    <div class="container-fluid">
        <div class = "col-lg-12">
            <div class = "col-lg-12 header-image">
                <img src="{{ URL::asset('image/photos/Internship.jpg')}}" class="img img-responsive img-rounded" alt="Company Banner">
            </div>
            <div class = "col-lg-12 text-center">
                <h1>Say Hello!</h1>
            </div>
            <div class = "col-lg-4 col-lg-offset-1">
                <div class = "row form-group">
                    <input type = "text" class = "form-control textboxes-contact"  name = "name" id = "name" placeholder="Full Name">
                </div>
                <div class = "row form-group">
                    <input type = "email" class = "form-control textboxes-contact"  name = "email" id = "email" placeholder="E-mail Address">
                </div>
                <div class = "row form-group">
                    <input type = "tel" class = "form-control textboxes-contact"  name = "contact" id = "contact" placeholder="Contact Number">
                </div>
                <div class = "row form-group">
                    <select class = "form-control textboxes-contact">
                        <option value="" disabled selected>Countries</option>
                        <option value="PS">Palestinian Territory, Occupied</option>
                        <option value="PA">Panama</option>
                        <option value="PG">Papua New Guinea</option>
                        <option value="PY">Paraguay</option>
                        <option value="PE">Peru</option>
                        <option value="PH">Philippines</option>
                        <option value="PN">Pitcairn</option>
                        <option value="PL">Poland</option>
                        <option value="PT">Portugal</option>
                        <option value="PR">Puerto Rico</option>
                        <option value="QA">Qatar</option>
                    </select>
                </div>
            </div>
            <div class = "col-lg-4 col-lg-offset-1">
                <div class = "row form-group">
                    <select class = "form-control textboxes-contact">
                        <option value="" disabled selected>General Inquiries</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                    </select>
                </div>
                <div class = "row form-group">
                    <textarea name="message" class = "form-control textboxes-contact" placeholder="Message" rows="6" cols="50"></textarea>
                </div>
            </div>
        </div>  
    </div>
</body>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
</html>
