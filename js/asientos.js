var selection = 1;
function selectOrUnselect(asiento) {
	var isSelected = $(asiento).hasClass("selected");
	if(!isSelected) { //Select!
        if($("#asiento"+selection).html() != "No asignado") {
			var place = "#place"+$("#asiento"+selection).html();
			$(place).removeClass("selected");
			$(place).addClass("available");
            
		}
		$(asiento).removeClass("available");
		$(asiento).addClass("selected");
        //Extra por asiento
        //Fin extra por asiento
		$("#asiento"+selection).html($(asiento).html());
		$("#asientoName"+selection).val($(asiento).html());
		if(selection < n) {
			$("#sel"+selection).prop("checked","false");
			selection++;
			$("#sel"+selection).prop("checked","true");
		}
	} else {
		removeSelection($(asiento).html());
		$(asiento).removeClass("selected");
		$(asiento).addClass("available");
	}
    
    
        extraAsientos();
    
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


function extraAsientos() {
    var totalModificado = totalBase;
    for(var i=1; i <=    n ;i++) {
        var extra1 = false;
        var extra2 = false;
        if( $("#asiento"+i).html() != "No asignado") {
            var numAsiento = parseInt($("#asiento"+i).text());
             if( numAsiento >= 10 && numAsiento <= 21 || numAsiento >= 40 && numAsiento <= 51) {
                extra1=true;
            }
            if( numAsiento >= 21 && numAsiento <= 30 || numAsiento >= 51 && numAsiento <= 60) {
                extra2=true;
            }
            if(extra1){
                totalModificado+=1000;
            }
            if(extra2) {
                totalModificado+=3000;
            }
        }
	}
    $("#totalSpan").html(totalModificado);
    $("#extraAsiento").val(totalModificado-totalBase);
    
}