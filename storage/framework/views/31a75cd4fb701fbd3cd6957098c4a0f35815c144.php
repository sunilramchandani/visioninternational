<?php
$curl = curl_init();
$rss_url = "https://graph.facebook.com/v2.9/visionsrx/posts?fields=full_picture,message&access_token=EAAbDDDPZCZCFABACmIOHj1Hk81WZCpeleMY0gEkHgVgDF8C2vKMbf9ZBt2KNdhU9fZACWD9bBlt8Ny3Xa4dcmZAhRGZAiNxDjRmMTgsp2gqNH5BqXVT4NoNTb9kHOUOmOM9hmIfKcDJ42ddxm9DuLb7fZCHfUCYFef3vDG8iHfqsMQZDZD";
curl_setopt($curl, CURLOPT_URL, $rss_url);
curl_setopt($curl, CURLOPT_USERAGENT, 'Mozilla/4.0 (compatible; MSIE 7.0; Windows NT 5.1; .NET CLR 1.0.3705; .NET CLR 1.1.4322; Media Center PC 4.0)');
curl_setopt($curl, CURLOPT_REFERER, '');
curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($curl, CURLOPT_TIMEOUT, 10);
$result = curl_exec($curl); // execute the curl command
curl_close($curl);
$data = json_decode($result, true);

foreach($data['data'] as $action) {
    
    if (isset($action['full_picture']))
    {
      $full_picture = $action['full_picture'];
      $message = $action['message'];
    }
    else{
        $message = $action['message'];
    }     
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
<body>
<div>
<table class="table table-border table-hover" id="abstractticketrequest-table">
                            <thead>
                                <tr>
                                    <th>Terminal</th>
                                    <th>Form</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                </tr>
                            </tfoot>
                        </table>
                        <?php $__currentLoopData = $data['data']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $picture): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                        <img src="<?php echo e($picture['full_picture']); ?>" alt="" height="300" width= "300" >
                        <input type="text" value="<?php echo e($picture['message']); ?>" >
                        
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>



</div>
</body>
</html>