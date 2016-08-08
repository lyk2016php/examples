$(document).ready(function() {

	$(".readmore p")
	.hide();

	$(".readmore p:first-child")
	.show();

	$(".readmore p:last-child")
	.after("<a class='btn' href='#'>Devamını Oku</a>");

	$(".readmore .btn").click(function() {
		$(this).parent().find("p").show();
		$(this).hide();
	});
});