	
		$(document).ready(function()
			{	
				 $( "#category" ).autocomplete({		
				  source: 'http://localhost:8000/admin/autocomplete/category',
				  width: 160,
				  autoFill: true,
				  selectFirst: false,
				  minLength: 1,
				  autoFocus: true,
				  select: function(event, ui) {
					$('#category').val(ui.item.value);
				  }
				});	
				$("#manu_date" ).datepicker({ dateFormat: 'yy-dd-mm' });
			});
			
		function numbersonly(e) {
				var unicode = e.charCode ? e.charCode : e.keyCode;
				if (unicode != 8 && unicode != 46 && unicode != 37 && unicode != 27 && unicode != 38 && unicode != 39 && unicode != 40 && unicode != 9) { 
					if (unicode < 48 || unicode > 57)
						return false;
			}
		}
		function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#preview').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }
	
			
