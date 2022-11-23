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






<div id="title"><h3></h3></div>
<div id="description"></div>


<div>
<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Ингридиенты</th>
    </tr>
  </thead>
  <tbody id="products">
   
</div>


<div>
<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Процесс приготовления</th>
    </tr>
  </thead>
  <tbody id="steps">
   
</div>

<h1>Процесс приготовления</h1>





 
<script type="text/javascript">
   
   var url = window.location.pathname;
   var id = url.substring(url.lastIndexOf('/') + 1);
   
$(document).ready(function(){
   
        url = "/api/show_reciept";
        
        var posting = $.post( url,{
        'id_reciept':id
        }, function(data) {
            
            newRowAdd =' <h3>'+ data.title+'</h3>';
            $('#title').append(newRowAdd);
            
            newRowAdd =' <p class="text-muted">'+ data.description+'</p>';
            $('#description').append(newRowAdd);

            $.each(data.products, function(index, value){
            newRowAdd =' <tr><th scope="row">'+(index+1)+'</th><td>'+value+'</td></tr>';
            $('#products').append(newRowAdd);    
            });

            $.each(data.steps, function(index, value){
            newRowAdd =' <tr><th scope="row">'+(index+1)+'</th><td>'+value+'</td></tr>';
            $('#steps').append(newRowAdd);    
            });

        }, "json" );

  
    
});






</script>


</body>
</html>






