(function($) {
	'use strict';
	$(function() {
		$(".sc-controller .settings").on("click", function(e) {
			console.log($(this).data("controller-id") + "-settings");
			$("#" + $(this).data("controller-id") + "-settings").toggleClass("show");
			e.preventDefault();
		});
		$(".sc-sensor .settings").on("click", function(e) {
			console.log($(this).data("sensor-id") + "-settings");
			$("#" + $(this).data("sensor-id") + "-settings").toggleClass("show");
			e.preventDefault();
		});
	});
// Place your public-facing JavaScript here
})(jQuery);
