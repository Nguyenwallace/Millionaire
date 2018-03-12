<script>

$(document).ready(function()
			{					 	
				$("#dateFrom" ).datepicker({ dateFormat: 'yy-m-d' });
				$("#dateTo" ).datepicker({ dateFormat: 'yy-m-d' });
				$( "#customer" ).autocomplete({		
				  source: "{{url('admin/autocomplete/customer')}}",
				  width: 160,
				  autoFill: true,
				  selectFirst: false,
				  minLength: 1,
				  autoFocus: true,
				  select: function(event, ui) {
					$('#customer').val(ui.item.value);
				  }
				});
				
			});		
			
		function numbersonly(e) {
				var unicode = e.charCode ? e.charCode : e.keyCode;
				if (unicode != 8 && unicode != 46 && unicode != 37 && unicode != 27 && unicode != 38 && unicode != 39 && unicode != 40 && unicode != 9) { 
					if (unicode < 48 || unicode > 57)
						return false;
			}
		}
		
</script>
