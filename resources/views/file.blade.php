<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/bootstrap-multiselect.css" type="text/css"/>
    
    <style>
/* override position and transform in 3.3.x */
.carousel-inner .item.left.active {
  transform: translateX(-33%);
}
.carousel-inner .item.right.active {
  transform: translateX(33%);
}

.carousel-inner .item.next {
  transform: translateX(33%)
}
.carousel-inner .item.prev {
  transform: translateX(-33%)
}

.carousel-inner .item.right,
.carousel-inner .item.left { 
  transform: translateX(0);
}


.carousel-control.left,.carousel-control.right {background-image:none;}

</style>

</head> 
<body>

<div class="col-md-6 col-md-offset-3">
<div class="carousel slide" id="myCarousel">
  <div class="carousel-inner">
    <div class="item active">
      <div class="col-md-4"><a href="#"><img src="http://placehold.it/500/bbbbbb/fff&amp;text=1" class="img-responsive"></a></div>
    </div>
    @foreach($management as $about)
    <div class="item">
      <div class="col-md-4"><a href="#"><img src="{{ URL::asset('image/uploaded_aboutus_image')}}/{{$about->about_image}}" class="img img-responsive employee" alt="Company Banner"/></a></div>
    </div>
    @endforeach
  </div>
  <a class="left carousel-control" href="#myCarousel" data-slide="prev"><i class="glyphicon glyphicon-chevron-left"></i></a>
  <a class="right carousel-control" href="#myCarousel" data-slide="next"><i class="glyphicon glyphicon-chevron-right"></i></a>
</div>
</div>



</body>
<script   src="https://code.jquery.com/jquery-3.2.1.min.js"   integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="   crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script> 
<script type="text/javascript">
$('#myCarousel').carousel({
  interval: 10000
})

$('.carousel .item').each(function(){
  var next = $(this).next();
  if (!next.length) {
    next = $(this).siblings(':first');
  }
  next.children(':first-child').clone().appendTo($(this));
  
  if (next.next().length>0) {
    next.next().children(':first-child').clone().appendTo($(this));
  }
  else {
  	$(this).siblings(':first').children(':first-child').clone().appendTo($(this));
  }
});

</script>


</html>
