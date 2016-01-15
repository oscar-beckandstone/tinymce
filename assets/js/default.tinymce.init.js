var configuration = {
    plugins: [
        'advlist autolink link image lists charmap print preview hr anchor pagebreak',
        'spellchecker searchreplace wordcount visualblocks visualchars code fullscreen',
        'insertdatetime media nonbreaking save table contextmenu directionality',
        'emoticons template paste textcolor'
    ],
    selector: 'textarea',
    setup: function (editor) {
        editor.on('change', function () {
            tinymce.triggerSave();
        });
    },
    height: 500,
    width: '100%',
    theme: 'modern',
    relative_urls: false,
    toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media | preview',
    elementpath: true
};
