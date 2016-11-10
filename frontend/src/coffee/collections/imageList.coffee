Backbone = require('backbone')
Image = require('../models/image')

ImageList = Backbone.Collection.extend
	model: Image

	comparator: (image)->
		- image.get('id')

module.exports = ImageList