					
		//global variable to record how many items have been added			
		//var item = 0;
		jQuery(function ($)
			{
			  $.datepicker.regional["vi-VN"] =
				{
					closeText: "Đóng",
					prevText: "Trước",
					nextText: "Sau",
					currentText: "Hôm nay",
					monthNames: ["Tháng một", "Tháng hai", "Tháng ba", "Tháng tư", "Tháng năm", "Tháng sáu", "Tháng bảy", "Tháng tám", "Tháng chín", "Tháng mười", "Tháng mười một", "Tháng mười hai"],
					monthNamesShort: ["Một", "Hai", "Ba", "Bốn", "Năm", "Sáu", "Bảy", "Tám", "Chín", "Mười", "Mười một", "Mười hai"],
					dayNames: ["Chủ nhật", "Thứ hai", "Thứ ba", "Thứ tư", "Thứ năm", "Thứ sáu", "Thứ bảy"],
					dayNamesShort: ["CN", "Hai", "Ba", "Tư", "Năm", "Sáu", "Bảy"],
					dayNamesMin: ["CN", "T2", "T3", "T4", "T5", "T6", "T7"],
					weekHeader: "Tuần",
					dateFormat: "dd/mm/yy",
					firstDay: 1,
					isRTL: false,
					showMonthAfterYear: false,
					yearSuffix: ""
				};

				$.datepicker.setDefaults($.datepicker.regional["vi-VN"]);
			});
		var item = 0;
		var id_item=0;
		var totalAmount = 0;
		var amount = 0;
		var grandTotal=0;		 
				
		$(document).ready(function()
			{	
				item= parseInt(document.getElementById('hiddenItem').value);
				id_item= parseInt(document.getElementById('hiddenItem').value);
				getTotalAmount();
				 $( "#product" ).autocomplete({		
				  source: 'http://localhost:8000/admin/autocomplete/quotation',
				  width: 160,
				  autoFill: true,
				  selectFirst: false,
				  minLength: 3,
				  autoFocus: true,
				  select: function(event, ui) {
					$('#product').val(ui.item.value);
				  }
				});

				$( "#cusName" ).autocomplete({		
				  source: 'http://localhost:8000/admin/autocomplete/customer',
				  width: 160,
				  autoFill: true,
				  selectFirst: false,
				  minLength: 1,
				  autoFocus: true,
				  select: function(event, ui) {
					$('#cusName').val(ui.item.value);
				  }
				});
				
				$( "#supName" ).autocomplete({		
				  source: 'http://localhost:8000/admin/autocomplete/supplier',
				  width: 160,
				  autoFill: true,
				  selectFirst: false,
				  minLength: 1,
				  autoFocus: true,
				  select: function(event, ui) {
					$('#supName').val(ui.item.value);
				  }
				});
				
				$('.edit-link').click(function(e){
					e.preventDefault();
					window.open( this.href, 'mywindow', 'width=400, height=200')
				});
				
				//Ajax to get the corresponding item from database and display on interface				
				$("#product").blur(function () {
					var _token = $("form[name='productForm']").find("input[name='_token']").val();
					var product= $(this).value;
					var url = "http://localhost:8000/admin/blur/quotation";
					$.ajax({						
						type: "post",
						url: url, 	
						cache: false,
						data: {"_token": _token, "product": $(this).val()},
						dataType: "json",						
						success: function (data) {
							$("#price").val(data.price);
							$("#stock").val(data.stock);							
						},
						error:function(){ 
							//alert("Why not success? What is problem with Server?!");							
						}
					});

				});
				
				$("#cusName").blur(function () {
					var _token = $("form[name='productForm']").find("input[name='_token']").val();
					var product= $(this).value;
					var url = "http://localhost:8000/admin/blur/customer";
					$.ajax({						
						type: "post",
						url: url, 	
						cache: false,
						data: {"_token": _token, "customer": $(this).val()},
						dataType: "json",						
						success: function (data) {
							document.getElementById("cusAddress").innerHTML = data.address;
							document.getElementsByName("cusAddress").value = data.address;
							document.getElementById("cusEmail").innerHTML = data.email;
							document.getElementsByName("cusEmail")[0].value= data.email;
							document.getElementById("cusTelephone").innerHTML = data.telephone;
							document.getElementsByName("cusTelephone").value = data.telephone;
							//$("#cusAddress").innerHTML(data.address);
							//$("#cusEmail").val(data.email);							
							//$("#cusTelephone").val(data.telephone);								
						},
						error:function(){ 
							//alert("Why not success? What is problem with Server?!");							
						}
					});

				});
				
				$("#supName").blur(function () {
					var _token = $("form[name='productForm']").find("input[name='_token']").val();
					//var product= $(this).value;
					var url = "http://localhost:8000/admin/blur/supplier";
					$.ajax({						
						type: "post",
						url: url, 	
						cache: false,
						data: {"_token": _token, "supplier": $(this).val()},
						dataType: "json",						
						success: function (data) {
							document.getElementById("supAddress").innerHTML = data.address;
							//document.getElementsByName("supAddress")[0].value = data.address;
							document.getElementById("supEmail").innerHTML = data.email;
							//document.getElementsByName("supEmail")[0].value= data.email;
							document.getElementById("supTelephone").innerHTML = data.telephone;
							//document.getElementsByName("supTelephone")[0].value = data.telephone;
							//$("#cusAddress").innerHTML(data.address);
							//$("#cusEmail").val(data.email);							
							//$("#cusTelephone").val(data.telephone);								
						},
						error:function(){ 
							//alert("Why not success? What is problem with Server?!");							
						}
					});

				});
				//global variable to record how many items have been added			
				//var item = 0;
				//var totalAmount = 0;
				//var amount = 0;
				
				$("#addItem").click(function (){
					//Will try to finish tomorrow...					
					var product = document.getElementById('product').value;
					var price = document.getElementById('price').value;
					var quantity = parseInt(document.getElementById('quantity').value);
					var stock= parseInt(document.getElementById('stock').value);
					var subTotal= price * quantity;
					
					if (price ==''){
						
						window.alert("Nope this way, please input and select right product, Man!");
						
						
					}
					
					else if (quantity =='' || quantity < 1){
												
						window.alert("quantity atleast is One, Man!");
						
					}
					
					else if (quantity > stock){
						
						window.alert("quantity must be less than stock, Man!");
						document.getElementById('quantity').value= stock;
					}
					else {
						//Please check here for adding product after removing
						if(checkUnique(product)){
							window.alert("item existing, please select again!");
							document.getElementById('product').value='';
							document.getElementById('price').value='';
							document.getElementById('quantity').value='';
							document.getElementById('stock').value='';
						}
						else {
							item++;
							id_item++;
							/*
							if (item==1)
							{
							
							$('<tr>	<td width = "10%"><label for="name">Thứ tự</label></td>	<td width = "30%"><label for="name">Tên sản phẩm</label></td><td width = "15%"><label for="price" >Giá</label></td><td width =15%"><label for="quantity" >Số lượng</label></td>	<td><label for="stock" >Có sẵn</label></td><td><label for="subtotal" >Tổng con</label></td>	<td><label for="delete" >Xóa?</label></td></tr>').fadeIn("slow").appendTo('#quotedTable');
							
							}
							
							
							$('<tr><td><input type="text" name="item[]" value="' + item + '" readonly ></td><td><input type="text" id ="product'+ item + '" name="product[]" value="' + product + '" readonly ></td> <td><input type="text" name="price[]" id=price'+ id_item+ ' value="' + price + '" readonly ></td> <td><input type="text" id= quantity'+id_item +' name="quantity[]" value="' + quantity + '" onkeyup=updateSub("'+id_item+'");></td> <td><input type="text" name="stock[]" id=stock'+id_item+ ' value="' + stock + '" readonly ></td><td><input type="text" name="subTotal[]" id=subTotal'+id_item+' value=' + subTotal + ' readonly ></td><td><input type="button" class = "btn btn-danger" value="delete" onclick =$(this).closest("tr").remove();reduceAmount();></td></tr>').fadeIn("slow").appendTo('#quotedTable');
							*/
							
							$('<tr><td width = "10%"><p name="item[]">'+item+'</p><input type="hidden"  name="itemorder[]" value="' + item + '" ></td><td width = "30%"><p id="product'+ item + '">'+product+'</p><input type="hidden" name="product[]" value="' + product + '"></td> <td width = "15%"><p id="price'+ id_item+ '">'+price+'</p><input type="hidden" name="price[]" value="' + price + '"></td> <td width = "15%"><input type="number" class="form-control" id= quantity'+id_item +' name="quantity[]" value="' + quantity + '" onchange=updateSub("'+id_item+'");></td> <td><p id=stock'+id_item+'>'+stock+'</p><input type="hidden"  name="stock[]" value="' + stock + '" ></td><td><p id=subTotal'+id_item+'>'+ subTotal + '</p><input type="hidden"  name="subTotal[]"  value=' + subTotal + '></td><td><button type="button" class = "btn btn-danger" class="glyphicon glyphicon-remove" onclick =$(this).closest("tr").remove();reduceAmount();><span class="glyphicon glyphicon-remove"></span></button></td></tr>').fadeIn("slow").appendTo('#quotedTable');
							
							document.getElementById('product').value='';
							document.getElementById('price').value='';
							document.getElementById('quantity').value='';
							document.getElementById('stock').value='';
							totalAmount = getTotalAmount();
							document.getElementById('totalAmount').value= totalAmount;
							document.getElementById('amount').value= amount;
							gettax();
						}
					}
				});
				
				function checkUnique(product){
					
					var i = 0;
					var j = 0;
					var arrProduct=[];
					for (j=0; j<item; j++){						
						
						arrProduct[j]=document.getElementsByName("product[]")[j].value;						
						
					}
					//var arrProduct = $("input[name='product[]']").map(function(){return $(this).val();}).get();
					for(i=0; i< arrProduct.length; i++){
						if (product==arrProduct[i]){
							return true;
						}					
					}
					return false;					
					
				}				
				
				$("#quotedDate").datepicker({ dateFormat: 'yy-m-d'});

			});
			
		
			
		function numbersonly(e) {
				var unicode = e.charCode ? e.charCode : e.keyCode;
				if (unicode != 8 && unicode != 46 && unicode != 37 && unicode != 27 && unicode != 38 && unicode != 39 && unicode != 40 && unicode != 9) { 
					if (unicode < 48 || unicode > 57)
						return false;
			}
		}

		function getdiscount(){
						
			var disc = 0;
			if (document.getElementById('discount').value!='' && parseFloat(document.getElementById('discount').value )<= 100){
				disc = parseFloat(document.getElementById('discount').value);
			}	
			else if (document.getElementById('discount').value > 100){
				alert(" %discount should NOT greater than 100");
				document.getElementById('discount').value='';
				var disc = 0;
			}
			totalAmount = amount * (1-disc/100);
			document.getElementById('totalAmount').value= totalAmount;
			gettax();
		}
		
		function gettax(){
						
			var tax = 0;
			if (document.getElementById('tax').value!='' && document.getElementById('tax').value <= 300){
				var tax = parseFloat(document.getElementById('tax').value);
			}	
			else if (document.getElementById('tax').value > 300){
				alert(" Tax should NOT greater than 300%");
				document.getElementById('tax').value='';
			}
			grandTotal = totalAmount * (1+tax/100);
			document.getElementById('grandTotal').value= grandTotal;
			document.getElementById('taxAmount').value= totalAmount*tax/100;
		}
		
		 function reduceAmount(){
			var i = 0;
			item--;
			totalAmount = getTotalAmount();
			document.getElementById('totalAmount').value= totalAmount;
			document.getElementById('amount').value= amount;
			gettax();
			//item--;
			for (i=0 ; i<item ; i++){	
				//this one is very suspicious please check carefully
				document.getElementsByName("item[]")[i].innerHTML = i+1 ;
				//document.getElementById("myHeader").innerHTML = "Have a nice day!";
			}
			
		}
		
		function getTotalAmount(){
					
					var discount = document.getElementById('discount').value;
					//var amount = 0;
					var arrPrice =[];
					var arrQuantity=[];
					var j = 0;
					for (j=0; j<item; j++){
						
						arrPrice[j]=document.getElementsByName("price[]")[j].value;
						arrQuantity[j]=document.getElementsByName("quantity[]")[j].value;						
						
					}
					//var arrPrice = document.getElementsByName('price[]').value;
					//var arrQuantity = document.getElementsByName('quantity[]').value;
					//var myForm = document.forms.addItemForm;
					//var arrPrice = myForm.elements['price[]'];
					//var arrQuantity = myForm.elements['quantity[]'];
					var i =0;
					amount = 0;
					for (i=0; i<arrPrice.length; i++){
						amount = amount + parseFloat(arrPrice[i]) * parseInt(arrQuantity[i]);
					}				
					totalAmount = amount*(1-discount/100);
					return totalAmount;
		}
		function updateSub(i){			
			//var arrPrice =[];
			//var arrQuantity=[];
			//var arrStock=[];
			var arrPrice;
			var arrQuantity;
			var arrStock;
			arrPrice=parseFloat(document.getElementById('price'+i).innerHTML);
			arrQuantity=parseInt(document.getElementById('quantity'+i).value);
			arrStock=parseInt(document.getElementById('stock'+i).innerHTML);
			if(arrQuantity > arrStock){				
				alert("no no, the quantity not greater than stock");
				arrQuantity = arrStock;
								
			document.getElementById('quantity'+i).value = arrStock;				
			}
			document.getElementById('totalAmount').value= getTotalAmount();
			document.getElementById('amount').value= amount;
			gettax();
			
			var sub_i= arrPrice*arrQuantity;
			//this is very important point of the tech!
			document.getElementById('subTotal'+i).innerHTML = sub_i;			
			
			/*
			arrPrice = $("input[name='price[]']").map(function(){return $(this).val();}).get();
			arrQuantity = $("input[name='quantity[]']").map(function(){return $(this).val();}).get();
			arrStock = $("input[name='stock[]']").map(function(){return $(this).val();}).get();
			
			var j = 0;
			for (j=0; j<item; j++){
				
				arrPrice[j]=parseFloat(document.getElementsByName("price[]")[j].value);
				arrQuantity[j]=parseInt(document.getElementsByName("quantity[]")[j].value);
				arrStock[j]=parseInt(document.getElementsByName("stock[]")[j].value);
				
			}
			if(arrQuantity[i-1] > arrStock[i-1]){				
				alert("no no, the quantity not greater than stock");
				arrQuantity[i-1] = arrStock[i-1];
				/*	this function is quite suspicious, please check carefully
				$(function() {
					$.each($('input[name="quantity[]"]'), function() {        
						$(this).val(arrStock[i-1]);
					});
				});
				
			document.getElementsByName("quantity[]")[i-1].value = arrStock[i-1];
				
			}
			document.getElementById('totalAmount').value= getTotalAmount();
			document.getElementById('amount').value= amount;
			tax();
			
			var sub_i= arrPrice[i-1]*arrQuantity[i-1];
			//this is very important point of the tech!
			document.getElementsByName("subTotal[]")[i-1].value = sub_i;
			*/
		}
		
		function quickAddCustomer(){
			_token= $('meta[name="csrf-token"]').attr('content');
			name = document.getElementById("cusQuickName").value;
			address = document.getElementById("cusQuickAddress").value;
			email = document.getElementById("cusQuickEmail").value;
			var url = "http://localhost:8000/admin/ajax/cusquickadd";
					$.ajax({						
							type: "post",
							url: url, 	
							cache: false,
							data: {"_token": _token, "name": name, "address":address, "email":email },
							/*
							data: {"id": id},
							headers:
							{
								'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
							},
							*/
							dataType: "json",						
							success: function (data) {
								//window.alert(data.message);
								//alert(data.message);
							},
							error:function(){ 
								alert("Error! Please check data inputted");							
							}						
						});
		}							
		
		function quickAddSupplier(){
			_token= $('meta[name="csrf-token"]').attr('content');
			name = document.getElementById("supQuickName").value;
			address = document.getElementById("supQuickAddress").value;
			email = document.getElementById("supQuickEmail").value;
			var url = "http://localhost:8000/admin/ajax/supquickadd";
					$.ajax({						
							type: "post",
							url: url, 	
							cache: false,
							data: {"_token": _token, "name": name, "address":address, "email":email },							
							dataType: "json",						
							success: function (data) {
								//window.alert(data.message);
								alert(data.message);
							},
							error:function(){ 
								alert("Error! Đã xảy ra lỗi vui lòng kiểm tra lại");							
							}						
						});
		}			
		
		
			
			
		
		
	
			
