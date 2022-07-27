
		$(document).ready(function() {
			var none = $(".no-display");
			$("#searchProp").on("keyup", function() {
				var value = $(this).val().toLowerCase();
				$("#myTable tr").filter(function() {
					$(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
				});
				none.toggle(!$("#myTable tr").filter(':visible').length)
			});
		});
