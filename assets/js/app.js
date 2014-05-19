$(function(){
    // select 2
    $(".use-select2").select2({
        minimumResultsForSearch: 20
    });
    
    // a-date-second
    var ads = $("#a-date-second");
    if(ads.length > 0){
        setInterval(function(){
            var t = new Date(),
                h = t.getHours(),
                i = t.getMinutes(),
                s = t.getSeconds();
            ads.html((h<10?'0'+h:h) +":"+ (i<10?'0'+i:i) +":"+ (s<10?'0'+s:s));
        }, 1000);
    }
});