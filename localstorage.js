$(document).ready(function() {

	getReceiptlist();
	
	function getReceiptlist() {
		$.get('sushi_list.json', function (response) {
			if (response) {
				// console.log(typeof(response));

				// if response is string
				var sushiObjArray = JSON.parse(response);

				// if response is object 
				// var sushiObjArray = response;

				var sushi = ''; var bento = ''; var ramen = ''; var appet = ''; var rice = '';
				



				var html = '', j = 1;
				$.each(sushiObjArray, function(i, v) {
					switch(parseInt(v.category)) {
						case 0:
						sushi += getCards(i, v);
						break;
						case 1:
						bento += getCards(i, v);
						break;
						case 2:
						ramen += getCards(i, v);
						break;
						case 3:
						appet += getCards(i, v);
						break;
						case 4:
						rice += getCards(i, v);
						break;
						default:
					  		//code block
					  	}

					  	$('div#pills-sushi div.container div.row').html(sushi);
					  	$('div#pills-bento div.container div.row').html(bento);
					  	$('div#pills-ramen div.container div.row').html(ramen);
					  	$('div#pills-appet div.container div.row').html(appet);
					  	$('div#pills-rice div.container div.row').html(rice);



					  	html += `<tr>
					  	<td>${j++}</td>
					  	<td>${v.name}</td>
					  	<td>${v.price}</td>
					  	<td>${v.category}</td>
					  	<td>
					  	<button class="btn btn-outline-primary btn-detail"><i class="fas fa-info-circle"></i></button>
					  	<button class="btn btn-outline-warning btn-edit" data-id="${i}"><i class="fas fa-edit"></i></button>
					  	<button class="btn btn-outline-danger btn-delete" data-id="${i}"><i class="fas fa-trash-alt"></i></button>
					  	</td>
					  	</tr>
					  	`;
					  });
				$('#tablebody').html(html);


			}
		})
	}

	function getCards(i, v){
		html = `
		<div class="col-6 col-lg-4 mb-5">
		<div class="card">
		<span class="price badge badge-dark badge-pill" id="price_badge">${v.price} Ks</span>
		<img src="${v.photo}" class="card-img-top">
		<div class="card-body">
		<h5 class="card-title text-center mb-2">${v.name}</h5>
		<hr>
		<button class="btn btn-outline-danger btn-block addtocart" data-id="${i}" data-name="${v.name}" data-price=${v.price}>Add to Cart</button>
		</div>
		</div>
		</div>
		`;
		return html;
	}

	// delete
	$('#tablebody').on('click', '.btn-delete', function() {
		var id = $(this).data('id');
		console.log(id);

		var ans = confirm('Are you sure to delete?');

		if (ans) {
			$.post('deletereceipt.php',{id: id}, function(data) {
				getReceiptlist();
			});
		}

	});

	$('#close').click(function () {

		$('.addnewform').hide(500);

		$('.tableform').hide(500);
	});


	$('.addnewform').hide(500);

	$('.tableform').hide(500);

	$('#add').click(function () {
		console.log("clicked");
		$('.addnewform').toggle();
		$('.tableform').toggle();
	});

	$('tbody').on('click', '.btn-edit', function() {

		var id = $(this).data('id');

		$.get('sushi_list.json', function(response) {
 
			var sushiObjArray = JSON.parse(response);
			var name = sushiObjArray[id].name;
			var price = sushiObjArray[id].price;
			var category = sushiObjArray[id].category;
			var profile = sushiObjArray[id].photo;

			// console.log("Name: " + name);
			// console.log("Email: " + email);
			// console.log("Gender: " + gender);
			// console.log("Address: " + address);
			// console.log("Profile: " + profile);

			$('#edit-id').val(id);
			$('#edit-name').val(name);
			$('#edit-price').val(parseFloat(price.replace(/,/g, '')));
			console.log(typeof(price));
			$('#edit-category').val(category);
			$('#old-profile-name').val(profile);
			$('edit-category').attr('selected', 'selected')


			$('#old-profile').attr('src', profile);
		});



		$('.addnewform').hide(500);
		$('.editform').show(500);
	});

	// $('#add').click(function () {
	// 			console.log("clicked");
	// 			$('#addnewform').toggle();
	// 		});

	showTable();

	$('div.tab-pane').on('click', '.addtocart', function(){
		let id = $(this).data('id');
		let name = $(this).data('name');
		let price = $(this).data('price');

		// console.log(price);

		let menu = {
			id : id,
			name : name,
			price : price,
			qty : 1
		}

		// console.log(menu);

		let menuString = localStorage.getItem("menulist");
		let menuArray;

		if (menuString == null) {
			menuArray = Array();
		}
		else{
			menuArray = JSON.parse(menuString);
		}

		console.log(menuArray);



		let status = false;

		$.each(menuArray, function(i, v){
			if (id == v.id) {
				status = true;
				v.qty++;
			}
		})

		if (!status) {
			menuArray.push(menu);
		}

		menuData = JSON.stringify(menuArray);

		localStorage.setItem('menulist', menuData);

		showTable();

	});

	function showTable(){
		var menuString = localStorage.getItem('menulist');

		if(menuString){
			$('#voucher_div').show(500);

			var menuArray = JSON.parse(menuString);
			var total = 0;
			var tbodyData=''; var tfootData='';

			if(menuArray !=0){
				//looping localStorage
				$.each(menuArray,function(i,v){
					var name = v.name;
					var price = parseFloat(v.price.replace(/,/g, ''));
					var qty = v.qty;
					var subtotal = price * qty;

					total += subtotal;

					console.log(price);

					tbodyData += `<tr>
					<td>
					${name}
					<span class="font-weight-lighter d-block">${price} KS</span>
					</td>
					<td>
					<button class="btn btn-secondary btn-sm minusBtn" data-id="${i}">-</button>
					<span class="mx-2">${qty}</span>
					<button class="btn btn-secondary btn-sm plusBtn" data-id="${i}">+</button>
					</td>
					<td>
					${subtotal}
					</td>
					<td align="center">
					<button class="btn btn-danger btn-sm removeBtn" data-id="${i}">X</button>
					</td>

					</tr>`;
				})

				tfootData += `<tr>
				<td colspan="4">
				<button class="btn btn-light btn-block" id="checkoutBtn">Check Out</button>
				</td>
				</tr>`

				$('#tb_body').html(tbodyData);
				$('tfoot').html(tfootData);
			}
			else{
				//array empty
				$('#voucher_div').hide(500);
			}
		}
		else{
			$('#voucher_div').hide(500);
		}
	}

	// Add Quantity
	$('#tb_body').on('click','.plusBtn', function() {
		let id = $(this).data('id');

		let menuString = localStorage.getItem("menulist");

		let menuArray = JSON.parse(menuString);

		$.each(menuArray, function(i,v){
			if (i == id) {
				v.qty++;
			}
		})

		let menuData = JSON.stringify(menuArray);
		localStorage.setItem('menulist', menuData);

		showTable();
	})

	// Sub Quantity
	$('#tb_body').on('click','.minusBtn', function() {
		let id = $(this).data('id');

		let menuString = localStorage.getItem("menulist");

		let menuArray = JSON.parse(menuString);

		$.each(menuArray, function(i,v){
			if (i == id) {
				if (v.qty > 1){
					v.qty--;
				}else{
					
					menuArray.splice(v, 1);
					// menuArray = JSON.stringify(menuArray);
					// localStorage.setItem("menuArray", menuArray);

				}
			}
		})

		let menuData = JSON.stringify(menuArray);
		localStorage.setItem('menulist', menuData);

		showTable();
	});

	// Remove item
	$('#tb_body').on('click','.removeBtn', function(){
		let id = $(this).data('id');
		let menuString = localStorage.getItem('menulist');
		let menuArray = JSON.parse(menuString);

		$.each(menuArray, function(i,v){
			if (i == id) {
				console.log(id);
				menuArray.splice(v, 1);
			}
		});

		let menuData = JSON.stringify(menuArray);
		localStorage.setItem('menulist', menuData);

		showTable();
	})


	$('tfoot').on('click', '#checkoutBtn', function(){
		localStorage.clear();
		showTable();
	})

});