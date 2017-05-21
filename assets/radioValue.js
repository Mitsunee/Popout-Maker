function radioValue(rObj) {
    for (var i=0; i<rObj.length; i++) if (rObj[i].checked) return rObj[i].value;
    return false;
}