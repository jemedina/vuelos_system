var selection = 1;

function selectOrUnselect(asiento) {
	var isSelected = $(asiento).hasClass("selected");
	if(!isSelected) {
		if($("#asiento"+selection).html() != "No asignado") {
			var place = "#place"+$("#asiento"+selection).html();
			$(place).removeClass("selected");
			$(place).addClass("available");
		}
		$(asiento).removeClass("available");
		$(asiento).addClass("selected");
		$("#asiento"+selection).html($(asiento).html());
		if(selection < 3) {
			$("#sel"+selection).prop("checked","false");
			selection++;
			$("#sel"+selection).prop("checked","true");
		}
	} else {
		removeSelection($(asiento).html());
		$(asiento).removeClass("selected");
		$(asiento).addClass("available");
	}
}


function setSelection(sel) {
	selection = sel;
}

function removeSelection(num) {
	$(".asientoClass").each(function(index,obj) {
		if(parseInt($(obj).html()) == num) {
			$("#asiento"+(index+1)).html("No asignado");
			$("#sel"+(index+1)).prop("checked","true");
			selection = index+1;
		}
	});
}
