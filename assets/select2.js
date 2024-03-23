$(document).ready(function() {
    $('#couleur').select2({
    // Activer la recherche et l'ajout de nouvelles options
    tags: true,
    createTag: function(params) {
        return {
        id: params.term,
        text: params.term,
        newOption: true
        }
    }
    });
});