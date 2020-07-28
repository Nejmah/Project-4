$(function () {
    // Code pour la popup de suppression de billet
    $('.delete-chapter-button').on('click', function () {
        var url = $(this).attr('data-delete-url');
        $('#deleteChapterModal .delete-form').attr('action', url);
    });
});

$(function () {
    // Code pour la popup de suppression d'un commentaire
    $('.delete-comment-button').on('click', function () {
        var url = $(this).attr('data-delete-url');
        $('#deleteCommentModal .delete-form').attr('action', url);
    });
});