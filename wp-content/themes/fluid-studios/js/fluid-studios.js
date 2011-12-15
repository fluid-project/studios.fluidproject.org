(function ($) {
	var fls_go_back = function () {
		history.back(-1);
		return false;
	};
	
	$(document).ready(function() {
		$("#flsc-go-back-link").click(fls_go_back);
	});
	
})(jQuery);
