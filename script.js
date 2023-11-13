$(document).ready(function () {
	// function to get original shopname
	fetchShopName();

	$("#shop_name_text").on("click", function () {
		// the shop name element
		var h1Element = $(this);
		//when user clicks h1, it turns into an input
		var inputElement = $(this.replaceWith("inputElement"), {
			type: "text",
			value: h1Element.text(),
			keypress: function (e) {
				//13 is enter key
				if (e.which === 13) {
					//prevents page refresh
					e.preventDefault();
					var newShopName = $(this).val();

					// Validate
					if (!newShopName.match(/^[a-zA-Z0-9\s]+$/)) {
						alert("Invalid shop name. Only letters, numbers, and spaces are allowed.");
						return;
					}

					//ajax to update
					updateShopName(newShopName, inputElement);

					// puts updated h1 back with the new shop name
					inputElement.text(newShopName);
					$(this).replaceWith(h1Element);
					h1Element.text(newShopName);
				}
			},
		});
	});

	// fetch original shop name from db
	function fetchShopName() {
		$.ajax({
			type: "GET",
			url: "get_shop_name.php",
			success: function (response) {
				// Update the shop name in the h1 element
				$("#shop_name_text").text(response);
			},
			error: function (error) {
				console.error("Error fetching shop name:", error);
			},
		});
	}
});

// update shop name in db
function updateShopName(newShopName, h1Element) {
	$.ajax({
		type: "POST",
		url: "update_shop_name.php",
		data: { newShopName: newShopName },
		success: function (response) {
			alert(response); // Display the response from the server
		},
		error: function (error) {
			console.error("Error updating shop name:", error);
			// If there's an error, revert the change in the h1
			h1Element.text(h1Element.data("originalText"));
		},
	});
}
