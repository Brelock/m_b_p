$(document).ready(function () {
  // Predelete pictures
  $('.admin-image-delete i').on("click", function () {
    let inp = $(`form input[data-id=${$(this).attr('id')}]`);
    if (inp.length >= 1) return;
    let input = document.createElement('INPUT');
    $(this).parent().parent().next().attr('style', 'opacity: 0.4;');
    $(this).attr('style', 'opacity: 0.4;');
    $(input).attr('data-id', $(this).attr('id'));
    input.name = "pictures_id[]";
    input.type = 'hidden';
    input.value = $(this).attr('id');
    $('form').append(input);
  });

  // Restore picture
  $('.admin-image-restore i').on("click", function () {

    $(this).parent().parent().next().attr('style', 'opacity: 1;');
    $('.admin-image-delete i').attr('style', 'opacity: 1;');
    $(`form input[data-id=${$(this).attr('data-id')}]`).remove();
  })

  // Delete xml file
  $('.admin-xml-delete i').on("click", function () {
    let input = document.createElement('INPUT');
    $(this).parent().parent().attr('style', 'display: none;');
    input.name = "deleteXml";
    input.type = 'hidden';
    input.value = 1;
    $('#form-product').append(input);
  });

  // Delete xls file for sunport
  $('.admin-xls-delete i').on("click", function () {
    let input = document.createElement('INPUT');
    $(this).parent().parent().attr('style', 'display: none;');
    input.name = "deleteXls";
    input.type = 'hidden';
    input.value = 1;
    $('#form-product').append(input);
  });

  // Predelete picture for sunport
  $('.admin-image-delete i').on("click", function () {
    let input = document.createElement('INPUT');
    $(this).parent().prev().attr('style', 'opacity: 0.4;');
    $(this).attr('style', 'opacity: 0.4;');
    input.name = "deletePicture";
    input.type = 'hidden';
    input.value = 1;
    $('#form-product').append(input);
  });
});