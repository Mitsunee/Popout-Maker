function ToggleDarkmode() {
	if($("#darkmode-selector input")[0].checked) {
		$("body").addClass("darkmode");
	} else {
		$("body").removeClass("darkmode");
	}
}