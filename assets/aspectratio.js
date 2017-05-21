function aspectratio (as_source,as_target,as_toggle,as_source_is) {
	as_toggle = document.getElementById(as_toggle);
	if(as_toggle.checked != true) return false;
	as_target = document.getElementById(as_target);
	if(as_source_is != 16) if(as_source_is != 9) {alert('Someone has been messing with the program code, I see.');return false;}
	x = as_source.value / as_source_is;
	if(as_source_is == 16) x = x * 9;
	if(as_source_is == 9) x = x * 16;
	x = Math.round(x);
	as_target.value=x;
}