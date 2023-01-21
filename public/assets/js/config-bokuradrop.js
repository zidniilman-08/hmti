var photo_counter = 0;
Dropzone.options.bokuraDropzone = {

	uploadMultiple: false,
	parallelUploads: 100,
	maxFilesize: 8,
	previewContaine: '#dropzonePreview',
	previewTemplate: document.querySelector('#preview-template').innerHtml,
	addRemoveLinks: true,
	dictRemoveFile: 'Remove',
	dictFileTOOBig: 'Ukuran image melebihi 8mb',

	init:function() {

		this.on('removedfile', function(file) {
			
			$.ajax({
				type: 'POST',
				url: 'upload/delete',
				data: {id: file.name, _token: $('#csrf-token').val()},
				dataType: 'html',
				success: function(data){
					var rep = JSON.parse(data);
					if(rep.code == 200)
					{
						photo_counter--;
						$('#photoCounter').text( "(" + photo_counter + ")");
					}
				}
			});
		});
	},
	error: function(file, response) {
		if($.type(response) ===  'string')
			var message = response;
		else
			var message = response.message;
		file.previewElemnt.classList.add('dz-error');
			_ref = file.previewElemnt.querySelectorAll("[data-dz-errormessage]");
			_results = [];
			for (_i = 0, _len = _ref.length; _i < _len; _i++) {
				node = _ref[_i];
				_results.push(node.textContent = message);
			}
			return _results;
	},
	success: function(file, done) {
		photo_counter++;
		$('#photoCounter').text("(" + photoCounter + ")");
	}
}