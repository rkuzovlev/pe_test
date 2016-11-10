$ = require('jquery')
Radio = require('backbone.radio');
Marionette = require('backbone.marionette');
template = require('../../templates/album_list/controls.hbs')
Album = require('../../models/album')

notifyChannel = Radio.channel('notify');

Controls = Marionette.View.extend
	template: template

	ui:
		aname: '#newAlbumName'

	events: 
		'submit form': 'submit'

	submit: (event)->
		event.preventDefault()

		val = @ui.aname.val()
		unless val.length
			console.warn 'You have to insert album name for create'
			return

		album = new Album
			name: val

		album.save {}, {
			success: ()->
				notifyChannel.trigger('add:album', album);

			error: ()->
				console.error 'Something wrong. Can\'t save album'
		}
		
		@ui.aname.val('')

module.exports = Controls
