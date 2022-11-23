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


   
    <div class="ml-4 form-group" id="title">
    <h4 class="pt-5"><strong>Название</strong></h4>
    </div>


   
    <div class="ml-4 form-group" id="description">
    <h4 class="pt-5"><strong>Описание</strong></h4>
    </div>
   
    
    
    
    
    <!-- <form id="add_form" method="post" action="/api/test">
                @csrf   -->
                
    
    <div class="container-fluid">
  <div class="row ">
  
    
    <div class="col ">
    <h5 class="pt-5"><strong>Этапы готовки блюда</strong></h5>
    <button class="btn btn-success mt-3 mb-5" id="btn-add-step">+ Ещё один шаг приготовления</button>
    <div id="steps"></div>
    <button class="btn btn-danger mt-3 mb-5" id="delete_step" >Убрать шаг</button></div>
 </div>
 





 
    <div class="col  d-flex align-items-center flex-column pr-5">
    <h5 class="pt-5 "><strong>Ингридиенты</strong></h5>
    
   
    <button class="btn btn-success mt-3 mb-5" id="btn-add-product">+ Ещё один ингридиент</button>
    <!-- <button class="btn btn-danger " id="" >Убрать ингридиент</button></div> -->

    <div id="products"> </div>
    <button class="btn btn-danger " id="delete_product" >Убрать ингридиент</button></div>
    
    <section class="ml-4 ">
    <div class="form-group ">
    <div class="input-group " >
       
    </div>
    </div>
    </section>  
    

    </div>
    
  </div>
</div>



<div class="d-flex justify-content-center pt-3 pb-5">
    <button type="button" class="btn btn-success mr-2" id="save">Сохранить</button>
    <button type="button" class="btn btn-danger mr-2"  id="delete">Удалить</button>
    <a href="/my_reciepts" class="btn btn-secondary " role="button">Назад</a>
</div>


<script type="text/javascript">
   
   var url = window.location.pathname;
   var id = url.substring(url.lastIndexOf('/') + 1);
   var stepCount = 0;
  var ingridientCount = 0;




$(document).ready(function(){
   
        url = "/api/show_reciept";
        id_reciept = id;
        var posting = $.post( url,{
        'id_reciept':id
        }, function(data) {
            
          //id_reciept =  data.id_reciept;


            newRowAdd =' <input class="col-4 mt-3" name="title" type="text" value = "'+data.title+'">';
            $('#title').append(newRowAdd);
            
            newRowAdd =' <textarea name="description" class="mt-3" cols="30" rows="4">'+ data.description+'</textarea> ';
            
            $('#description').append(newRowAdd);

            $.each(data.products, function(index, value){
              
              id = "delete_product"+index;
              id_section = "product_section"+index; 


              newRowAdd = 
              '<section class="ml-4" id = '+id_section+' ><div class="form-group "><div class="input-group " >'+
              '<input type="text " name = "product'+ingridientCount+'" class="form-control col-12 " value="'+value+'" > '+
              '<div class="input-group-append">'+
              '</div></div></section>' ;
              ingridientCount++;
             
            $('#products').append(newRowAdd); 
           
            });

            
            
            $.each(data.steps, function(index, value){
            id_section = "step_section"+index; 

            newRowAdd =
            '<section class="cl" id = '+id_section+' ><div class="form-group ">'+
            '<div class="input-group " id="steps">'+
            '<textarea name = "step'+stepCount+'" class="form-control col-12" id="descriptionTextarea" rows="3">'+value+'</textarea>'+
            '<div class="input-group-append">'+
            '</div></div></div></section>' ;

            stepCount++;
            $('#steps').append(newRowAdd);
            
            });

        }, "json" );



        $("#btn-add-step").on('click', function () {
         
          id_section = "step_section"+stepCount; 
          newRowAdd =
            '<section class="cl" id = '+id_section+' ><div class="form-group ">'+
            '<div class="input-group " id="steps">'+
            '<textarea  name = "step'+stepCount+'" class="form-control col-12" id="descriptionTextarea" rows="3"></textarea>'+
            '<div class="input-group-append">'+
            '</div></div></div></section>' ;
            $('#steps').append(newRowAdd);
            stepCount++;
        });

        $("#delete_step").on('click', function () {
       
       if(stepCount>0)
       { 
        --stepCount;
         $("#step_section"+stepCount).remove()
        
       }
        
      });
        
        
        

        
      $("#btn-add-product").on('click', function () {
          
          id_section = "product_section"+ingridientCount; 
          newRowAdd = 
              '<section class="ml-4" id = '+id_section+' ><div class="form-group "><div class="input-group " >'+
              '<input type="text " name = "product'+ingridientCount+'" class="form-control col-12 " value="" > '+
              '<div class="input-group-append">'+
              '</div></div></section>' ;
            $('#products').append(newRowAdd);
            ingridientCount++;
        });

        $("#delete_product").on('click', function () {
       
       if(ingridientCount>0)
       {  
        ingridientCount--;
         $("#product_section"+ingridientCount).remove()
       
       }
        
      });

       






      $("#save").on('click', function () {


  var isEmpty = false;
  for ( var j = 0; j < stepCount; j++ ) {
    if(!$('[name=step'+j+']').val())
    {
      isEmpty = true;
      break;
    }
  }

  for ( var j = 0; j < ingridientCount; j++ ) {
    if(!$('[name=product'+j+']').val())
    {
      isEmpty = true;
      break;
    }
  }


  if(!$("[name='title']").val() || !$("[name='description']").val())
  {
    isEmpty = true;
  }

  if( isEmpty ) {
    alert('Некоторые поля - пустые!');
    event.preventDefault();
  }
  else{

  var ingridients = [];
  var steps = [];
  var title = $("[name='title']").val();
  
  var description = $("[name='description']").val();

  for ( var j = 0; j < ingridientCount; j++ ) {
    ingridients[ j ] = $('[name=product'+j+']').val();
  }
  for ( var j = 0; j < stepCount; j++ ) {
    steps[ j ] = $('[name=step'+j+']').val();
  }

  
  var arr = new Map([
    ['ingridients',ingridients],
    ['steps',steps],
    ['title',title],
    ['description',description],
    ['id_reciept',id_reciept],
  ]);

  console.log(arr);
   



  var $data;


  var $form = $( this ),

  url = '/api/change_reciept_data';
  var posting = $.post( url,{
    'ingridients':ingridients,
    'steps':steps,
    'title':title,
    'description':description,
    'id_reciept':id_reciept
  });
   console.log(posting);
  
   window.location.replace("/show_reciept"+"/"+id_reciept);

  }

});


$("#delete").on('click', function () {
  url = '/api/delete_all_reciept_data';
  var posting = $.post( url,{
    'id_reciept':id_reciept
  });

  $.get('/my_reciepts');
  window.location.replace("/my_reciepts");
  

  
});
    
});






</script>

</body>
</html>






