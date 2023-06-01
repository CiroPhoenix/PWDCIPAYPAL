
$(document).ready(function(){


$('#search').click(function(){

    var checker = 0;
    for (var i = 0; i < 12; i++){
        var card = $("div").filter(".col-md-3")[i];
        var title = $("h5").filter(".card-title")[i].innerText.toUpperCase();

        $.ajax({
            url: 'busqueda.php',
            type: 'POST',
            data: {card_busqueda: card[i], 
                busqueda: title[i].indexOf($("#inp").val().toUpperCase()),
                checker_busqueda: checker},
            success: function (response){
                checker = response;
            }
        })

       /* if(title.indexOf($("#inp").val().toUpperCase()) > -1 ){
            card.style.display = 'block';
            checker++;
        }else{
            card.style.display ='none';
        }*/
    }


if(checker > 0){

$("#not_find_any_thing").text("");

}else{
    
$("#not_find_any_thing").text("No result found").fadeIn();
}



});

});




$(document).ready(function(){



    $('#cart').hide();
    
    $(".fa-shopping-cart").mouseenter(function(){
        $('#cart').show();
    })

    $("#cart").mouseleave(function(){
        $("#cart").hide();
    })


    var cart_item_count = 0;
    $('.cart_btn').click(function(){
     cart_item_count++;
     var img_src = $(this).parents(".card-body").siblings("img").attr("src");
     var title = $(this).parents(".d-flex").siblings(".d-flex").find(".card-title").text();
     var price = $(this).parents(".d-flex").siblings(".d-flex").find("span:nth-child(2)").text();

      var cart_item = ` 
      
      <div class="main d-flex p-3 border border-left-0 border-right-0 border-top-0">
      
      <div class= "col-md-3 border border-left-0 border-top-0 border-bottom-0">
      <img src=${img_src} class="w-100" alt=""/>
      </div>


      <div id="title" class="col-md-3 d-flex flex-wrap align-content-center">
      <h6 style="font-size:13px;">${title}<h6>
      </div>


      <div class="col-md-3 d-flex flex-wrap align-content-center">
      <span class="mx-2"> 1 </span>
      </div>


      <div class"col-md-2 d-flex flex-wrap align-content-center" id="t_price">
      <h6 class"mt-2 d-flex"<span> $ </span><span class="cart_item_price"> ${price} </span></h6>
      </div>
<div class="col-md-1 d-flex flex-wrap align-content-center">
<span class="close" style="cursor:pointer; font-size:25px;">&times;</span>
</div>



      </div>
      
      
      ` 

     $("#order").append(cart_item);

     $("#cart_item_count").text(cart_item_count);

     $(".close").click(function(){
        $(this).parents(".main").remove();

    item_count();

     });

     item_count();


    })
function item_count(){
    var res = $("#order").children().length;
    $("$cart_item_count").text(res);
}
})


