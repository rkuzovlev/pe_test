Backbone = require('backbone')
Image = require('../models/image')

ImageList = Backbone.Collection.extend
	model: Image

module.exports = ImageList