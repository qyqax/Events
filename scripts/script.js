$( document ).ready(function() {
    
    $('.deleteEvent').click(function(){
    	id = $(this).attr("id");
    	answer = window.confirm("Are you sure?");

    	if(answer){
    		$.ajax({
			  type: "POST",
			  url: "delete.php",
			  data: id,
			 
			});
			window.location.replace("myevents.php");
    	}
    	//alert(id);
    });

    $('#searchClick').click(function(){

    	$(this).fadeOut(500);	
    	$('#searchBox').delay(600).fadeIn(500);
    });

     $('#add_comment').click(function(){

    	$(this).fadeOut(500);	
    	$('#content').delay(600).fadeIn(500);
    });




});
 function participate(id){
    	$.ajax({
			  type: "POST",
			  url: "participate.php",
			  data: id,

			 
			});
    	window.location.replace("details.php?id="+id);
    }

  function resign(id){
  	$.ajax({
			  type: "POST",
			  url: "resign.php",
			  data: id,

			 
			});
  		window.location.replace("details.php?id="+id);
  }
