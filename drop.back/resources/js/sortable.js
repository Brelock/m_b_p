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

$(document).ready(() => {
  let $sortable = $('#sortable #tbody');
  $sortable.sortable({
    start: function (event, ui) {
      // Create a temporary attribute on the element with the old index
      $(this).attr('data-currentindex', ui.item.index());
    },
    update: function (event, ui) {
      let currentIndex = +$(this).attr('data-currentindex');
      let desiredIndex = +ui.item.index();

      let entity = $(this).find(`[data-index=${currentIndex}]`).attr('data-entity');

      // console.log(entity);

      function snakeToKebab(entity) {
        return entity.replace(/_/g, "-");
      }

      let currentId = $sortable.find("[data-index='" + currentIndex + "']").data('id');

      let desiredId = $sortable.find("[data-index='" + desiredIndex + "']").data('id');

      // console.log(currentId);
      // console.log(desiredId);

      axios.post(`/admin/${snakeToKebab(entity)}/reorder`, {
        currentId: currentId,
        desiredId: desiredId
      }).then((response) => {
        window.location.reload();
      });
    }
  });

    // Preview icon picture before save to database
    $('#icon-image').on("change", function(evt){
        preloadPicture(evt, 'showFile');
        $('.icon-container').attr('hidden', false);
    });

    // Delete icon picture
    $('.admin-icon-delete i').on("click", function () {
        let input = document.createElement('INPUT');
        input.name = "deleteIcon";
        input.type = 'hidden';
        input.value = 1;
        $('#form-unloading').append(input);
        $(this).parent().parent().next().attr('style', 'opacity: 0.4;')
    });
});