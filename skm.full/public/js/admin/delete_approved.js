$('.delete_approved').submit(function( event ) {
    let question = $(event.target).data('approve-question') ? $(event.target).data('approve-question') : 'Вы уверены что хотите удалить?';
    return confirm(question);
});
