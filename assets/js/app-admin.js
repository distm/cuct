$(function(){
    // disabled link
    $(".disabled, .disabled > a").bind("click", function(e){
        e.preventDefault();
    });
    
    // role delete
    $("[data-role='delete']").bind("click", function(){
        var me = $(this),
            c = me.attr("data-confirm") || "Yakin akan menghapus data ini?",
            ajax = (me.attr("data-ajax") === "true");
            
        if(confirm(c)){
            if(! ajax){
                return true;
            }
        }
        
        return false;
    });
});