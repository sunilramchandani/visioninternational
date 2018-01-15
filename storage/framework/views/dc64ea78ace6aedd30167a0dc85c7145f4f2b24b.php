<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<form action="<?php echo e(route('contactus.store')); ?>" method="post" role="form">
        <?php echo e(csrf_field()); ?>


        <div class="form-group">
            <label for="name"><i class="fa fa-id-badge" aria-hidden="true"></i> Name</label>
            <input type="text" class="form-control textboxes" name="name" id="">
        </div>


        <div class="form-group">
            <label for="name"><i class="fa fa-id-badge" aria-hidden="true"></i> Email </label>
            <input type="text" class="form-control textboxes" name="email" id="">
        </div>
        <div class="form-group">
            <label for="name"><i class="fa fa-id-badge" aria-hidden="true"></i> Contact Number </label>
            <input type="text" class="form-control textboxes" name="contact_no" id="">
        </div>
        <div class="form-group">
            <label for="name"><i class="fa fa-id-badge" aria-hidden="true"></i> Country </label>
            <input type="text" class="form-control textboxes" name="country" id="">
        </div>


        <div class="form-group">
        <label for="display_name"><i class="fa fa-id-badge" aria-hidden="true"></i> General Inquiries </label>
        <select class="form-control textboxes" name="general_inquiries">
            <option value="Example">example</option>
          </select> 
        </div>

        <div class="form-group">
            <label for="name"><i class="fa fa-id-badge" aria-hidden="true"></i> Message </label>
            <input type="text" class="form-control textboxes" name="message" id="">
        </div>
    
        <div class="form-group">
            <button type="submit" class="btn float-right">
                Submit  <i class="fa fa-1x fa-arrow-circle-right" aria-hidden="true"></i>
            </button>
        </div>
        </form>

</body>
</html>