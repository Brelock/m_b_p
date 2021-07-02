var editor_config = {
    path_absolute: "/admin/",
    mode : "exact",
    file_picker_types: 'file image media',
    file_browser_callback_types: 'file image media',
    elements : "content-ru,content-ua",
    automatic_uploads: true,
    plugins: [
        "advlist autolink autosave link  image lists charmap print preview hr anchor spellchecker",
        "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
        "save table contextmenu directionality emoticons template textcolor paste textcolor colorpicker"
    ],
    toolbar: "insertfile undo redo | styleselect | bold italic strikethrough | alignleft aligncenter alignright alignjustify | ltr rtl | bullist numlist outdent indent removeformat formatselect| link image media | code codesample | forecolor backcolor",
    nanospell_server: "php",
    browser_spellcheck: true,
    relative_urls: false,
    remove_script_host: false,
    language: 'uk',
    file_browser_callback : function(field_name, url, type, win) {
        var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
        var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;

        var cmsURL = editor_config.path_absolute + 'filemanager?field_name=' + field_name;
        if (type == 'image') {
            cmsURL = cmsURL + "&type=Images";
        } else {
            cmsURL = cmsURL + "&type=Files";
        }

        tinyMCE.activeEditor.windowManager.open({
            file : cmsURL,
            title : 'Filemanager',
            width : x * 0.8,
            height : y * 0.8,
            resizable : "yes",
            close_previous : "no"
        });
    },

    // file_picker_callback: function(callback, value, meta) {
    //     // Provide file and text for the link dialog
    //     if (meta.filetype == 'file') {
    //         callback('mypage.html', {text: 'My text'});
    //     }
    // }
};
function initMCEall(){
    tinyMCE.init(editor_config);
}
// add all textarea elements to document
initMCEall();
