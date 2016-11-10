Backbone = require('backbone')
Album = require('../models/album')

AlbumList = Backbone.Collection.extend
	url: '/api/albums'
	model: Album

	comparator: (image)->
		- image.get('id')

module.exports = AlbumList