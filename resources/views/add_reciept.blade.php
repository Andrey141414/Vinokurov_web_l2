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
    <!-- Шапка сайта -->
    <nav class="navbar navbar-light bg-light justify-content-sm-end" >
    
        <div class="mr-auto p-2">
            <a class="nav-link active" href="/">На главную</a>
        </div> 
        <a class="nav-link active " href="/my_reciepts">Мои рецепты</a>  
        <a class="nav-link active " href="/search">Поиск</a>
        <a class="nav-link active " href="/add_reciept">Добавить рецепт</a>        
    </nav>




<!-- Контентент страницы -->

<!-- вкладки -->
<!-- <ul class="nav nav-tabs mb-3 justify-content-center" >
  <li class="nav-item">
    <a class="nav-link" id="description-tab" data-toggle="tab" href="#description" role="tab" >Описание</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="ingredients-tab" data-toggle="tab" href="#ingredients" role="tab" >Ингридиенты</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="cooking-proccess-tab" data-toggle="pill" href="#cooking-proccess" role="tab" >Процесс приготовления</a>
  </li>
</ul> -->


<!-- Содержимое вкладок -->
<form id="add_form" method="post" action="/api/add_reciept">
                @csrf  
<div class="tab-content" id="pills-tabContent">
    <!-- Первая -->
    
    <div class="tab-pane fade show active" id="description" role="tabpanel" >
    
  <section class="ml-5">
    <div class="form-group">
        <label for="descriptionTextarea">Название</label>
        <input type="text " name="title"  class="form-control col-5 " >
    </div>

    <div class="form-group">
        <label for="descriptionTextarea">Описание</label>
        <textarea class="form-control col-5" name="description" id="descriptionTextarea" rows="3"></textarea>
    </div>

    <button type="button" id="move_to_ingridients" class="btn btn-success">Далее</button>
</section>    

  </div>


<!-- Вторая -->

  <div class="tab-pane fade" id="ingredients" role="tabpanel " >
   
  <section class="ml-5 ">
    <div class="form-group ">
    <label for="descriptionTextarea">Введите ингридиенты</label>
    
    <div id = "new-ingridient">
    <div class="input-group ">
        <input type="text"  name="ingridient[0]" id="i1" class="form-control col-6 ">
    </div>
    </div>
    </div>
    <button id="btn-add-ingridient" type="button"
                        class="btn btn-dark">
                        <span class="bi bi-plus-square-dotted">
                        </span> Добавить
                    </button>
      
    <button id="btn-delete-ingridient" type="button"
          class="btn btn-red">
          <span class="bi bi-plus-square-dotted ">
          </span> Удалить
      </button>
    <button type="button"  id="move_to_cooking-proccess" class="btn btn-success">Далее</button>


    </section>   

  </div>
 

<!-- Третья -->
  <div class="tab-pane fade" id="cooking-proccess" role="tabpanel" aria-labelledby="cooking-proccess-tab">

  <section class="ml-5 ">
    <div class="form-group ">
    <label for="descriptionTextarea">Опишите рецепт по пунктам</label>
    
    <div id = "new-step">
    <div class="input-group ">
      <textarea class="form-control col-5" id="descriptionTextarea" name="cook_step[0]" rows="3"></textarea>
    </div>
    </div>
    </div>
    <button id="btn-add-step" type="button"
                        class="btn btn-dark">
                        <span class="bi bi-plus-square-dotted">
                        </span> Добавить
                    </button>
      
      
      <button id="btn-delete-step" type="button"
          class="btn btn-red">
          <span class="bi bi-plus-square-dotted btn-danger">
          </span> Удалить
      </button>
    <button type="submit" class="btn btn-success">Сохранить</button>

    
    </section>   


  </div>


</div>
  </form>

<script type="text/javascript">
   var stepCount = 0;
   var ingridientCount = 0;
 $(document).ready(function(){
       
        $("#btn-add-ingridient").on('click', function () {
          ++ingridientCount;
          newRowAdd ='<input type="text" name="ingridient[' + ingridientCount +
          ']" id = "newinput' + ingridientCount +'" class="form-control col-6 ">';
            $('#new-ingridient').append(newRowAdd);
        });

        
       $("#btn-delete-ingridient").on('click', function () {
        if(ingridientCount>0)
        { 
         
         $("#newinput" + ingridientCount).remove();
         --ingridientCount;
        }
         
       });
        
        


        $("#btn-add-step").on('click', function () {
          ++stepCount;
          
          newRowAdd ='<textarea class="form-control col-5" id="descriptionTextarea' + stepCount +'" name="cook_step[' + stepCount +
          ']" rows="3"></textarea>';
            $('#new-step').append(newRowAdd);
        });

        $("#btn-delete-step").on('click', function () {
        if(stepCount>0)
        { 
         $("#descriptionTextarea" + stepCount).remove();
         --stepCount;
        }
         
       });


});

$(document).ready(function(){


 $("#move_to_ingridients").click(function(){
    
    if( !$("[name='title']").val() || !$("[name='description']").val() ) {
      alert('Некоторые поля - пустые!');
    }
    else{
    $("#description").attr('class', 'tab-pane fade');
    $("#ingredients").attr('class', 'tab-pane fade show active');

    }
    
 }); 

 $("#move_to_cooking-proccess").click(function(){
  
  var isEmpty = false;
  for ( var j = 0; j <= ingridientCount; j++ ) {
    if(!$("[name='ingridient["+ j +"]']").val())
    {
      isEmpty = true;
      break;
    }
  }

  if( isEmpty ) {
      alert('Некоторые поля - пустые!');
    }
    else{
    $("#ingredients").attr('class', 'tab-pane fade');
    $("#cooking-proccess").attr('class', 'tab-pane fade show active');
    }
 });


  
$("#add_form").submit(function(event) {
  

  var isEmpty = false;
  for ( var j = 0; j <= stepCount; j++ ) {
    if(!$("[name='cook_step["+ j +"]']").val())
    {
      isEmpty = true;
      break;
    }
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

  for ( var j = 0; j <= ingridientCount; j++ ) {
    ingridients[ j ] = $("[name='ingridient["+ j +"]']").val();
  }
  for ( var j = 0; j <= stepCount; j++ ) {
    steps[ j ] = $("[name='cook_step["+ j +"]']").val();
  }

  
  var arr = new Map([
    ['ingridients',ingridients],
    ['steps',steps],
    ['title',title],
    ['description',description],
  ]);

  console.log(arr);
   
  event.preventDefault();


  var $data;


  var $form = $( this ),

  url = $form.attr( 'action' );  
  var posting = $.post( url,{
    'ingridients':ingridients,
    'steps':steps,
    'title':title,
    'description':description
  });
  console.log(posting);
  
}

$.get('/my_reciepts');
  window.location.replace("/my_reciepts");

  
});

});
    </script>

</body>
</html>