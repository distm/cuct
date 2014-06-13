tinymce.init({
    selector: ".use-mce",
    theme: "modern",
    height: 300,
    plugins: [
        //"advlist autolink link image lists charmap print preview hr anchor pagebreak",
        //"searchreplace wordcount visualblocks visualchars insertdatetime media nonbreaking",
        "link image print preview table contextmenu directionality emoticons paste textcolor responsivefilemanager fullscreen code"
    ],
    
    menubar: false,
    toolbar1: "undo redo | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | forecolor backcolor",
    toolbar2: "| table | responsivefilemanager | link unlink anchor | print preview code | fullscreen",
    image_advtab: true,

    relative_urls: false,
    external_filemanager_path: "/assets/libs/filemanager/",
    filemanager_title: "Filemanager" ,
    external_plugins: { 
        filemanager: "plugins/responsivefilemanager/plugin.min.js"
    }
 });