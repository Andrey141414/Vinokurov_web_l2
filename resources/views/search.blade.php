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


<label class="form-label pt-5" for="form1">Введите название блюда или ингридиент</label>
    <div class="input-group">
    
  <div class="form-outline">
    <input  type="search" id="search-input" class="form-control" />
    
  </div>
  <button type="button" class="btn btn-primary" >Найти
    <i class="fas fa-search"></i>
  </button>

</div>

<div class="col-md-10 mb-4 border border-primary pb-5" id="search_results">
   

 </div>





<style>
    .cursor-pointer {
  cursor: pointer;
}
</style>




<script type="text/javascript">
$(document).ready(function(){
   

  let keyupTimer;
    
  

  $('#search-input').keyup('input',  function(){ 
   
  


  $("#search_results").empty();   
       
      
       url = "/api/search_reciept";
        
        var posting = $.post( url,{
        'search':($(this).val())
        }, function(data) {

            $.each(data.search_result, function(index, value){
              newRowAdd ='  <h4 class="cursor-pointer pt-5 super" id="'+ value[0][2] +'"><strong> '
              +value[0][0]+'</strong></h4><p class="text-muted">'+value[0][1]+'</p>';
            $('#search_results').append(newRowAdd);
            
            
            
            $('#search_results').delegate('.cursor-pointer','click',function(){
              var clickId = $(this).attr('id');
              console.log(clickId);
              resiept_url = "api/show_reciept";
              
              var posting = $.post( resiept_url,{
              'id_reciept':clickId
              });
              window.location.replace("/show_reciept"+"/"+clickId);
             });
                
            
            
            
            }); 
            });

        }, "json" );

      }, 500);

    

</script>



</body>
</html>






<!-- <div class="input-group mb-3 mt-5">

<label for="exampleFormControlTextarea1">Example textarea</label>
<input type="text " class="col-5 " placeholder="Recipient's username">
<div class="input-group-append ">
    <button class="btn btn-outline-secondary" type="button">Добавить ещё</button>
</div>
</div> -->