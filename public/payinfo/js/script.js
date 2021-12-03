$(document).ready(function(){

   //Ban Users
    $(document).on('click', '.banUsers', function(){ 
    	var id = $(this).data('id');
    	$('.loading').show();
    		$.ajax({ 
	        type: 'post',
	        url: '/panel/users/ban',
	        headers: {
	          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	        },
	        data: {
	       	  id: id
	        },success: function(data) {  
	            location.reload();
	            toastr.success(' ', 'Paid', {timeOut: 3000, positionClass: 'toast-top-center'});
	            $('.loading').hide();
	        }
	    });
    });	

    //Unban Freelancers
    $(document).on('click', '.unbanFreelancer', function(){ 
    	var id = $(this).data('id');
    	$('.loading').show();
    		$.ajax({ 
	        type: 'post',
	        url: '/panel/freelancer/unban',
	        headers: {
	          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	        },
	        data: {
	       	  id: id
	        },success: function(data) {  
	            location.reload();
	            toastr.success(' ', 'Unpaid', {timeOut: 3000, positionClass: 'toast-top-center'});
	            $('.loading').hide();
	        }
	    });
    });	

     //Unban Clients
    $(document).on('click', '.unbanClient', function(){ 
    	var id = $(this).data('id');
    	$('.loading').show();
    		$.ajax({ 
	        type: 'post',
	        url: '/panel/client/unban',
	        headers: {
	          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	        },
	        data: {
	       	  id: id
	        },success: function(data) {  
	            location.reload();
	            toastr.success(' ', 'Client Unbanned', {timeOut: 3000, positionClass: 'toast-top-center'});
	            $('.loading').hide();
	        }
	    });
    });	


});//document.ready