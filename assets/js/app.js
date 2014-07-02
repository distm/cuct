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
    
    // home tab
    $(".home-tab").each(function(){
        $(this).find("a").click(function (e) {
            e.preventDefault();
            $(this).tab("show");
        });
    });
    
    // coursel
    $('.carousel').carousel({
        interval: 3000
    });
    
    // lightbox
    $(document).delegate('*[data-toggle="lightbox"]', 'click', function(event) {
        event.preventDefault();
        $(this).ekkoLightbox({
            gallery: "g1",
            gallery_parent_selector: "gallery",
            left_arrow_class: "fa fa-chevron-left",
            right_arrow_class: "fa fa-chevron-right"
        });
    });
    
});