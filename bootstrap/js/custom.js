
		$(function(){
			$('#addnewform').hide();

			// $('.plus').click(function(){
			// 	let noOfOrder = $('#noOfOrder').val();
			// 	$('#noOfOrder').val(++noOfOrder);
			// })

			// $('.minus').click(function(){
			// 	let noOfOrder = $('#noOfOrder').val();
			// 	if (noOfOrder > 0) {
			// 		noOfOrder = noOfOrder - 1;
			// 		$('#noOfOrder').val(noOfOrder);
			// 	}
			// });

			$('#add').click(function () {
				console.log("clicked");
				$('#addnewform').show();
			})
		});
