(function($, Dropzone) {
    "use strict";

    $(document).ready(function() {
        const url = SITE_URL + "/upload";
        const img_route = '/watch/';
        const block = $('#playbob-drag-zone > .playbob-drag-zone-place');
        const dropbox = $('.playbob-uploader-box');
        const buttonreset = $('.playbob-reset-button');

        function dragOverBlock(e) { block.addClass('onDrag'); }

        function dragLeaveBlock(e) { block.removeClass('onDrag'); }

        function getFileExt(fileName) {
            fileName = fileName.toLowerCase();
            return fileName.split('.').pop();
        }

        function onFileAdd(file) {
            const preview = $(file.previewElement);
            const ext = getFileExt(file.name);
            const img = preview.find('.playbob-upload-icon');
            var types = ['mp4', 'webm'];
            if (types.includes(ext)) {
                img.attr('src', SITE_URL + '/images/icons/' + ext + '.png');
            } else {
                img.attr('src', SITE_URL + '/images/icons/unknown.png');
            }

            $('#modal-full-width').modal('show');
            $(file.previewElement).removeClass('d-none');
            dropbox.addClass('d-none');
            buttonreset.removeClass('d-none');
            $('.uploaded-success').removeClass('d-none');
            if (dropzone.files.length > MAX_FILES) {
                this.removeFile(file);
            }
            if (dropzone.files.length >= MAX_FILES) {
                buttonreset.addClass('d-none');
            }

            $(".playbob-videos-name").each(function() {
                const fulltext = $(this).text();
                if (fulltext.length > 20) {
                    $(this).text(fulltext.substr(0, 23 - 3));
                    $(this).append('...');
                }
            });
        }

        function onFileError(file, message = null) {
            const preview = $(file.previewElement);
            const anchor = preview.find('.alert-error');
            const progress = preview.find('.upload-progress');
            const erroricon = preview.find('.error-icon-box');
            const upboxerror = preview.find('.playbob-card');

            anchor.html(message ? message : BIG_FILES_DETECTED);
            anchor.removeClass('d-none');
            progress.addClass('d-none');
            erroricon.removeClass('d-none');
            upboxerror.addClass('box-is-error');
        }



        function onUploadComplete(file) {
            if (file.status == "success") {
                const preview = $(file.previewElement);
                const response = JSON.parse(file.xhr.response);
                if (response.type == 'success') {
                    const id = response.data.id;
                    const anchor = preview.find('.success-input');
                    const buttonLink = preview.find('.success-button');
                    const progress = preview.find('.upload-progress');
                    const sucessicon = preview.find('.success-icon-box');
                    const upbox = preview.find('.playbob-card');
                    anchor.html('textarea', SITE_URL + img_route + id);
                    buttonLink.attr('href', SITE_URL + img_route + id);
                    anchor.html(SITE_URL + img_route + id);
                    anchor.removeClass('d-none');
                    buttonLink.removeClass('d-none');
                    progress.addClass('d-none');
                    sucessicon.removeClass('d-none');
                    upbox.addClass('box-is-success');
                } else
                    onFileError(file, response.errors);
            }
        }


        let previewNode = document.querySelector("#playbob-drop-template");
        previewNode.id = "";
        let previewTemplate = previewNode.parentNode.innerHTML;
        previewNode.parentNode.removeChild(previewNode);

        const dropzone = new Dropzone(
            'div#playbob-drag-zone', {
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: url,
                method: 'post',
                paramName: 'uploads',
                maxFiles: MAX_FILES,
                maxFilesize: MAX_SIZE,
                previewTemplate: previewTemplate,
                previewsContainer: "#playbob-preview-uploads",
                clickable: "div#playbob-upload-clickable",
                acceptedFiles: "video/mp4,video/webm",
                timeout: 180000,
                init: function() {
                    this.on("removedfile", function(file) {
                        if (dropzone.files.length == 0) { dropbox.removeClass('d-none'); }
                        if (dropzone.files.length <= MAX_FILES) { buttonreset.removeClass('d-none'); };
                        if (dropzone.files.length == 0) { buttonreset.addClass('d-none'); }
                    });
                }
            },
        );

        dropzone.on('dragover', dragOverBlock);
        dropzone.on('dragleave', dragLeaveBlock);
        dropzone.on('addedfile', onFileAdd);
        dropzone.on('error', onFileError);
        dropzone.on('complete', onUploadComplete);

        $(".modal").on("hidden.bs.modal", function() {
            buttonreset.addClass('d-none');
            dropbox.removeClass('d-none');
            dropzone.removeAllFiles(true);
        });

    })
})(jQuery, Dropzone);