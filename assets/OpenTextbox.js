function OpenTextbox(OTB1,OTB2) {
  if(OTB1.checked == true){
   document.getElementById(OTB2).style.display='block';
  }else{
   document.getElementById(OTB2).style.display='none';
  }
}
function OpenTextboxToggle(OTBT1,OTBT2) {
	document.getElementById(OTBT1).style.display='none';
	document.getElementById(OTBT2).style.display='block';
}