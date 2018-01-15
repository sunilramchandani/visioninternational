<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Vision International</title>
</head>
<body class="hold-transition skin-blue sidebar-mini">

    <form action="{{route('contactus.store')}}" method="post" role="form">
        {{csrf_field()}}
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
                    <input type = "text" class = "form-control textboxes-contact"  name="name" id="" placeholder="Full Name">
                </div>
                <div class = "row form-group">
                    <input type = "email" class = "form-control textboxes-contact"  name="email" id="" placeholder="E-mail Address">
                </div>
                <div class = "row form-group">
                    <input type = "tel" class = "form-control textboxes-contact"  name="contact_no" id="" placeholder="Contact Number">
                </div>
                <div class = "row form-group">
                    <select class = "form-control textboxes-contact" name="country" id="">
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
                    <select class = "form-control textboxes-contact" name="general_inquiries">
                        <option value="" disabled selected>General Inquiries</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                    </select>
                </div>
                <div class = "row form-group">
                    <textarea name="message" class = "form-control textboxes-contact" placeholder="Message" rows="6" cols="50" name="message" id=""></textarea>
                </div>
            </div>
        </div>  
    </div>
</body>
</html>