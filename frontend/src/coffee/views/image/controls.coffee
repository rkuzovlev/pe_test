$ = require('jquery')
Radio = require('backbone.radio');
Marionette = require('backbone.marionette');
Image = require('../../models/image')
template = require('../../templates/image/controls.hbs')

notifyChannel = Radio.channel('notify');

Controls = Marionette.View.extend
	template: template

	ui:
		button: 'button'
		file: '#upload-img'

	events: 
		'click @ui.button': 'changeFile'
		'change @ui.file': 'fileIsChanged'

	changeFile: (event)->
		console.log('@ui.file', @ui.file);
		@ui.file.click()


	fileIsChanged: (event)->
		input = event.target;
		file = input.files[0]

		if file.type not in ["image/jpeg", "image/png" ]
			console.warn 'You must choise only jpeg or png images'
			return


		data = new FormData();
		data.append 'image', file

		album = notifyChannel.request('get:album')

		$.ajax
			url: '/api/album/' + album,
			type: 'POST',
			data: data,
			cache: false,
			dataType: 'json',
			processData: false,
			contentType: false,
			
			success: (data, textStatus, jqXHR)->
				image = new Image data
				notifyChannel.trigger 'add:image', image

			error: (jqXHR, textStatus, errorThrown)->
				console.log('ERRORS: ' + textStatus);


module.exports = Controls