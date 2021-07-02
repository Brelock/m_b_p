$(document).ready(() => {
  $('.btn-edit').on('click', function() {
      let bannerItem = $(this).parent().parent();
      let form = $('form');
      // prepare link for update
      let updateHref = window.location.href + '/' + bannerItem.attr('data-id');

      // change action and method by form
      form.attr('action', updateHref);
      form.prepend('<input type="hidden" name="_method" value="PUT">');

      // put data to form input
      $('#v01').val(bannerItem.find('.url').text());
      $('.file-item').attr('src', bannerItem.find('.file img').attr('src'));
      $('.icon-container').attr('hidden', false);
  })
});