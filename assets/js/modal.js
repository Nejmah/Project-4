$(function () {
    // Code pour la popup de suppression de billet
    $('.delete-post-button').on('click', function () {
        var url = $(this).attr('data-delete-url');
        $('#deleteModal .delete-link').attr('href', url);
    });
});