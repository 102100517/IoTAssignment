setInterval(() => {
	$.ajax({url: "query.php"}).done((output) => {
		$("#debug").html(output);
	});
}, 50);
