
			/* function changeImage() {
     			
            		document.getElementById("cima").src = "/images/jesus.jpg";
        			//alert('yaaaa');
        		}
			*/

			function changeImage(source) {
     				
            		document.getElementById("cima").src = source;
        			
        		}






/*
        	function uploadPic() {
        		$('#upload').modal('show');

        	}
    	
*/
		function uploadPic() {
				$('#upload').modal('show');	

        		$('#upload').on('show',function(){
        			$("modal-body #produto_id").val('He is coming back');	
        		});
       			

        	}

       $(document).on("click", ".uppic", function () {
	     var produtoId = $(this).data('id');
	     $(".modal-body #produto_id").val( produtoId );
	     // As pointed out in comments, 
	     // it is superfluous to have to manually call the modal.
	     // $('#addBookDialog').modal('show');
	});

       function addcategoria(){
       	$('#modalcategoria').modal('show');
       }


      

