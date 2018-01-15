<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="<?php echo e(asset('css/bootstrap.min.css')); ?>" rel="stylesheet">
    <link rel="stylesheet" href="css/app.css" />
    <link rel="stylesheet" href="css/contact-us.css" />
    <title>Vision International</title>
</head>
<body>
<form action="<?php echo e(route('contactus.store')); ?>" method="post" role="form">
        <?php echo e(csrf_field()); ?>

    <div class="container-fluid">
        <div class = "col-lg-12">
            <div class = "col-lg-12 header-image">
                <img src="<?php echo e(URL::asset('image/photos/Internship.jpg')); ?>" class="img img-responsive img-rounded" alt="Company Banner">
            </div>
            <div class = "Say Hello row">
                <div class = "col-lg-12 text-center">
                    <h1>Say Hello!</h1>
                </div>
                <div class = "col-lg-4 col-lg-offset-1">
                    <div class = "row form-group">
                        <input type = "text" class = "form-control"  name="name" id="" placeholder="Full Name">
                    </div>
                    <div class = "row form-group">
                        <input type = "email" class = "form-control"  name="email" id="" placeholder="E-mail Address">
                    </div>
                    <div class = "row form-group">
                        <input type = "tel" class = "form-control"  name="contact_no" id="" placeholder="Contact Number">
                    </div>
                    <div class = "row form-group">
                        <select class = "form-control" name="country" id="">
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
                <div class = "col-lg-5 col-lg-offset-1">
                    <div class = "row form-group">
                        <select class = "form-control" name="general_inquiries">
                            <option value="" disabled selected>General Inquiries</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                        </select>
                    </div>
                    <div class = "row form-group">
                        <textarea name="message" class = "form-control textarea-input" placeholder="Message" rows="8" cols="50" name="message" id=""></textarea>
                    </div>
                </div>
                <div class = "col-lg-3 col-lg-offset-9 text-center">
                    <button class = "submit btn"><span>Send Message</span></button>
                </div>
            </div>  
        </div>


        <div class = "Our Offices row">
            <div class = "col-lg-12 text-center">
                <h1>Our Offices</h1>
            </div>
            <div class = "col-lg-2 col-lg-offset-1">
                <label class = "country"> Philippines </label>
                <ul>
                    <li><a href = "">Manila</a></li>
                    <li><a href = "">Makati</a></li>
                    <li><a href = "">Quezon City</a></li>
                </ul>
            </div>
            <div class = "col-lg-4">
                <label class = "country"> United States of America </label>
                <ul>
                    <div class = "col-lg-6">
                        <li><a href = "">Alaska</a></li>
                        <li><a href = "">California</a></li>
                        <li><a href = "">Florida</a></li>
                    </div>
                    <div class = "col-lg-6">
                        <li><a href = "">Hawaii</a></li>
                        <li><a href = "">Massachusettes</a></li>
                        <li><a href = "">Texas</a></li>
                    </div>  
                </ul>
            </div>
            <div class = "col-lg-4">
                <label class = "country"> Canada </label>
                <ul>
                    <div class = "col-lg-6">
                        <li><a href = "">Alberta</a></li>
                        <li><a href = "">British Columbia</a></li>
                        <li><a href = "">Manitoba</a></li>
                    </div>
                    <div class = "col-lg-6">
                        <li><a href = "">New Brunswick</a></li>
                        <li><a href = "">New Foundland and Labrador</a></li>
                    </div>  
                </ul>
            </div>
        </div>

        <br/>
        <div class = "country-city-offices row">
            <div class = "col-lg-5 col-lg-offset-1">
                <div class = "row top-header">
                    <div class = "col-lg-2">
                        <h1 class = "city-header inline-header">City</h1>
                    </div>
                    <div class = "col-lg-1">
                        <h4 class = "country-header inline-header">Country</h4>
                    </div>
                </div>
                <div class = "office-details row">
                    <div class = "col-lg-12 form-group">
                        <label for = "telephone"><span class="glyphicon glyphicon-earphone"></span></label>
                        <h4 id = "telephone" name = "telephone">TELEPHONE HERE</h4>
                    </div>
                    <div class = "col-lg-12">
                        <label for = "mobilephone"><span class="glyphicon glyphicon-phone"></span></label>
                        <h4 id = "mobilephone" name="mobilephone">MOBILEPHONE HERE</h4>
                    </div>
                     <div class = "col-lg-12">
                        <label for = "address"><span class="glyphicon glyphicon-pushpin"></span></p>
                        <h4 id = "address" name="address">ADDRESS HERE</h4> 
                    </div>
                </div>
            </div>
            <div class = "col-lg-5 col-lg-offset-1">
                
            </div>
        </div>
    </div>
</form>
</body>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?php echo e(asset('js/bootstrap.min.js')); ?>"></script>
</html>