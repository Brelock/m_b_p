$(document).ready(() => {
  $('.btn-edit').on('click', function() {
      let linkItem = $(this).parent().parent();
      let form = $('form');
      // prepare link for update
      let updateHref = window.location.href + '/' + linkItem.attr('data-id');

      // change action and method by form
      form.attr('action', updateHref);
      form.prepend('<input type="hidden" name="_method" value="PUT">');

      let $formatsSelect = $("#vs");

      // put data to form input
      $formatsSelect.val(linkItem.find('.format').data('option-id'));
      $('#v01').val(linkItem.find('.name-xml').text());
      $('#v02').val(linkItem.find('.link-xml').text());
      $('#iv01').val(linkItem.find('.comment-xml').text());
      $('#v03').val(linkItem.find('.icon-title').text());
      $('#v04').val(linkItem.find('.quantity').text());
      $('.icon-item').attr('src', linkItem.find('.icon img').attr('src'));
      $('.icon-container').attr('hidden', false);
  })
});