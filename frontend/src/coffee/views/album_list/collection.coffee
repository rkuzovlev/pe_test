Marionette = require('backbone.marionette');
Album = require('./album')

AlbumCollection = Marionette.CollectionView.extend
	childView: Album

module.exports = AlbumCollection