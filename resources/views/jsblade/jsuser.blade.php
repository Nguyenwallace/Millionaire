<script>

var item=1;

$(document).ready(function()
{	
	item= parseInt(document.getElementById('hiddenItem').value);
});	
			
function deleteuser(id){	
	//var _token = $("form[name='productForm']").find("input[name='_token']").val();
	if(window.confirm("bạn muốn xóa")){	
		//item--;	
		//document.getElementById('but'+id).closest('tr').remove();
		//$(this).closest('tr').remove();
		//document.getElementById('but'+id).closest('tr').remove();
		/*
		for (i=0 ; i<item ; i++){	
				//this one is very suspicious please check carefully
				document.getElementsByName("item[]")[i].innerHTML = i+1 ;				
			}
		*/
		//here to change the item number
		_token= $('meta[name="csrf-token"]').attr('content');
		var url = "{{url('manager/ajax/deleteuser')}}";
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
							success: function (data) {								//document.getElementById('but'+id).closest('tr').remove();								
								item--;	
								document.getElementById('but'+id).closest('tr').remove();
								for (i=0 ; i<item ; i++){	
								//this one is very suspicious please check carefully
								document.getElementsByName("item[]")[i].innerHTML = i+1 ;
								window.alert(data.message);			}
							},
							error:function(){ 
								alert("Không thể xóa User đang dùng!");							
							}						
						});
	}
}	

</script>
