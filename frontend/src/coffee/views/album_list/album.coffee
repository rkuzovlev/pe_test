Marionette = require('backbone.marionette');
Backbone = require('backbone')
template = require('../../templates/album_list/album.hbs')

Album = Marionette.View.extend
	template: template
	className: 'album g-lg-4 g-md-4 g-sm-6 g-xs-12'

	ui:
		albumLink: 'a.name'

	events:
		'click @ui.albumLink': 'openAlbum'

	openAlbum: (event)->
		Backbone.history.navigate '/album/' + @model.get('id'), trigger: true
		event.preventDefault()

module.exports = Album