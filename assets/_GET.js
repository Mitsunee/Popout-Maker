function _GET(needle,haystack) {//looks for variable needle in haystack (haystack is also a hopefully valid youtube link)
	needle += "=";
	LF = haystack.indexOf(needle);
	if(LF==-1) return 0;
	LFb = haystack.indexOf("&",LF);
	LFc = haystack.indexOf("#",LF);
	if(LFb!=-1) {
		stopAt = LFb;
	} else if(LFc!=-1) {
		stopAt = LFc;
	} else {
		stopAt = haystack.length;
	}
	startAt = LF + needle.length;
	return haystack.substring(startAt,stopAt);
}