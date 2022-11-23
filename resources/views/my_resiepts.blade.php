<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Всё, что есть в холодильнике!</title>
    <link href="css/welcome.css" rel="stylesheet" type="text/css" >
    <link href="/bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="/bootstrap/css/bootstrap-responsive.css" rel="stylesheet">
   <script src="//ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
   
</head>
<body>
    
    <nav class="navbar navbar-light bg-light justify-content-sm-end" >
    
        <div class="mr-auto p-2">
            <a class="nav-link active" href="/">На главную</a>
        </div> 
        <a class="nav-link active " href="/my_reciepts">Мои рецепты</a>  
        <a class="nav-link active " href="/search">Поиск</a>
        <a class="nav-link active " href="/add_reciept">Добавить рецепт</a>        
    </nav>



<?php 
    //echo(count($reciepts));

?>



@for ($i = 0; $i < count($reciepts); $i++)
<div class="col-md-10 mb-4 border border-primary pb-5" id="{{$reciepts[$i]->id}}">
   
   <h4 class="cursor-pointer pt-5"  id="{{$reciepts[$i]->id}}"><strong>{{$reciepts[$i]->title}}</strong></h4>
   <p class="text-muted">{{$reciepts[$i]->description}}</p>
  
    <button class="btn btn-info change-button" id="{{$reciepts[$i]->id}}">Редактировать</button>
   <button type="button" id="{{$reciepts[$i]->id}}" class="btn btn-success cursor-pointer">Посмотреть</button>
 </div>
@endfor

 


<script type="text/javascript">
   
$(document).ready(function(){
   
    $(".cursor-pointer").click(function () {
        var clickId = $(this).attr('id');
       
    window.location.replace("/show_reciept"+"/"+clickId);

});

    $(".change-button").click(function () {
        var clickId = $(this).attr('id');
       
    window.location.replace("/reciept"+"/"+clickId);

 });

});




</script>


<style>
    .cursor-pointer {
  cursor: pointer;
}
</style>

</body>
</html>






