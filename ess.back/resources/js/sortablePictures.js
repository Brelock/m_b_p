$(document).ready(() => {
    let $sortable = $('#sortable');
    $sortable.sortable({
        start: function(event, ui) {
            // Create a temporary attribute on the element with the old index
            $(this).attr('data-currentindex', ui.item.index());
        },
        update: function(event, ui) {
            let currentIndex = +$(this).attr('data-currentindex');
            let desiredIndex = +ui.item.index();

            console.log('currentIndex', currentIndex);
            console.log('desiredIndex', desiredIndex);

            let entity = $(this).attr('data-entity');

            console.log(entity);

            let currentId = $sortable.find("[data-index='" + currentIndex + "']").data('id');
            let currentProjectId = $sortable.find("[data-index='" + currentIndex + "']").attr('data-projectId');

            let desiredId = $sortable.find("[data-index='" + desiredIndex + "']").data('id');
            let desiredProjectId = $sortable.find("[data-index='" + desiredIndex + "']").attr('data-projectId');

            console.log('currentId', currentId);
            console.log('desiredId',desiredId);


            axios.post(`/admin/${entity}/reorder-picture`, {
                currentId: currentId,
                desiredId: desiredId,
                currentProjectId: currentProjectId,
                desiredProjectId: desiredProjectId
            }).then((response) => {
                window.location.reload();
            });
        }
    });
});