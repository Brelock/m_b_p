function preloadPicture(evt, containerId){
    let file = evt.target.files;
    let pictureFile = file[0];
    let reader = new FileReader();
    // Closure to capture the file information.
    reader.onload = (function(theFile) {
        return function(e) {
            $('#' + containerId).find('img').remove();
            $('#' + containerId).html(['<img class="thumb" src="', e.target.result,
                '" title="', escape(theFile.name), '" />'].join(''));
        };
    })(pictureFile);
    // Read in the image file as a data URL.
    reader.readAsDataURL(pictureFile);
}

$(document).ready(function () {
    // Preview main picture before save to database
    $('#main-image').on("change", function(evt){
        preloadPicture(evt, 'showFile');
    });
    // Preview xls file before save to database
    $('#main-file').on("change", function(evt){
        preloadPicture(evt, 'showXls');
    });
    // Preview pictures before save to database
    $("#project-images").on('change', function () {

        //Get count of selected files
        let countFiles = $(this)[0].files.length;

        let imgPath = $(this)[0].value;
        let extn = imgPath.substring(imgPath.lastIndexOf('.') + 1).toLowerCase();
        let image_holder = $("#sortable");

        if (extn == "gif" || extn == "png" || extn == "jpg" || extn == "jpeg") {
            if (typeof (FileReader) != "undefined") {

                //loop for each file selected for uploaded.
                for (let i = 0; i < countFiles; i++) {

                    let reader = new FileReader();
                    reader.onload = function (e) {
                        $(image_holder).append([
                            '<li class="ui-state-default"><div class="col-sm-3 animated fadeIn"><div class="options-container"><img src="',
                            e.target.result,
                            '" class="img-fluid options-item"/>',
                            '</div></div></li>'
                        ].join(''));
                    };
                    reader.readAsDataURL($(this)[0].files[i]);
                }

            } else {
                alert("Этот браузер не поддерживает FileReader.");
            }
        } else {
            alert("Пожалуйста, выберите только картинки");
        }
    });

});