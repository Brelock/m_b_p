$(document).ready(() => {
    let $sortable = $('#sortable tbody');
    $sortable.sortable({
        start: function(event, ui) {
            // Create a temporary attribute on the element with the old index
            $(this).attr('data-currentindex', ui.item.index());
        },
        update: function(event, ui) {
            let currentIndex = +$(this).attr('data-currentindex');
            let desiredIndex = +ui.item.index();

            let entity = $(this).find(`[data-index=${currentIndex}]`).attr('data-entity');

            console.log(entity);

            let currentId = $sortable.find("[data-index='" + currentIndex + "']").data('id');

            let desiredId = $sortable.find("[data-index='" + desiredIndex + "']").data('id');

            console.log(currentId);
            console.log(desiredId);


            axios.post(`/admin/${entity}/reorder`, {
                currentId: currentId,
                desiredId: desiredId
            }).then((response) => {
                window.location.reload();
            });
        }
    });
});