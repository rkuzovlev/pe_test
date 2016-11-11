Backbone = require('backbone')
Image = require('../models/image')

ImageList = Backbone.Collection.extend
	model: Image

	initialize: () ->
		@on 'add', @imageAdded

	imageAdded: ()->
		if @length > 9
			@pop()

	comparator: (image)->
		- image.get('id')

module.exports = ImageList