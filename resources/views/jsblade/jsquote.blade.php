<script>

var item = 0;
$(document).ready(function()
	{	
	 item= parseInt(document.getElementById('item_no').value);
	});
		
function deleteQuote(id){	
	//var _token = $("form[name='productForm']").find("input[name='_token']").val();
	if(window.confirm("bạn muốn xóa")){	
		item--;		
		//$(this).closest('tr').remove();
		document.getElementById('but'+id).closest('tr').remove();
		for (i=0 ; i<item ; i++){	
				//this one is very suspicious please check carefully
				document.getElementsByName("item[]")[i].innerHTML = i+1 ;
				//document.getElementById("item[]")[i].value = i+1 ;
				//document.getElementById("myHeader").innerHTML = "Have a nice day!";
			}
		//here to change the item number
		_token= $('meta[name="csrf-token"]').attr('content');
		var url = "{{url('admin/ajax/deleteQuote')}}";
						$.ajax({						
							type: "post",
							url: url, 	
							cache: false,
							data: {"_token": _token, "id": id},
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
							},
							error:function(){ 
								alert("Why not success? What is problem with Server?!");							
							}						
						});
					}				//_token = $('meta[name="csrf-token"]').attr('content');
					//var product= $(this).value;				
					
}

$('#selectAll').click(function(e){
    var table= $(e.target).closest('table');
    $('td input:checkbox',table).prop('checked',this.checked);
});


</script>
