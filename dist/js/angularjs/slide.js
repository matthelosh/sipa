$(document).ready(function(){
	$('ul#nav li a').click(function(){
		$('a.active').removeClass('active');
		$(this).addClass('active');

		// $('html, body').scrollTo($(this).attr('href'), 1000);

		
		// return false;
	});
	
});

// function pgHome(){
// 		$("#pgDesc").attr('content', 'Halaman beranda Numi');
// 	}
// function pgAbout(){
// 		$("#pgDesc").attr('content', 'Halaman tentang Saya');
// 		// $.ajax({
// 		// 	url: '/api/getUsers',
// 		// 	type: 'GET',
// 		// 	success: function(data){
// 		// 		var user = JSON.stringify(data);
// 		// 		console.log(data.email);
// 		// 		$("#dataUser").html('<b>'+data.email+'</b>');
// 		// 	}
// 		// });
		
// 	}

// 	$.getJSON("/api/getUsers", function(data){
// 			console.log(data);
// 			$.each(data, function(i, user){
// 				console.log(user.email);
				
// 				$("#dataUser").append(user.username+"<br>"+user.email+"<br>"+user.password+"<hr>");
			
				
// 			});

			
// 		});