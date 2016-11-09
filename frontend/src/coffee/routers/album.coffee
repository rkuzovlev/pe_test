Marionette = require('backbone.marionette');
Backbone = require('backbone')


AlbumListCollectionView = require('../views/album_list/collection')
AlbumListControlsView = require('../views/album_list/controls')
AlbumListCollection = require('../collections/albumList')

ImageCollectionView = require('../views/image/collection')
ImageControlsView = require('../views/image/controls')
ImageCollection = require('../collections/imageList')


AlbumController = Marionette.Object.extend
	initialize: (options)->
		@layout = options.layout;
		
		@albumList = new AlbumListCollection()
		@imageList = new ImageCollection()

	listAlbums: ()->
		@layout.showChildView 'controls', new AlbumListControlsView()
		@layout.showChildView 'content', new AlbumListCollectionView(collection: @albumList)

		@albumList.fetch()


	showAlbum: (albumId, page)->
		url = '/api/album/' + albumId
		url += '/page/' + page if page		

		@layout.showChildView 'controls', new ImageControlsView()
		@layout.showChildView 'content', new ImageCollectionView(collection: @imageList)

		@imageList.url = url
		@imageList.fetch()
		


AlbumRouter = Marionette.AppRouter.extend
	appRoutes:
		'': 'listAlbums'
		'album/:albumId': 'showAlbum'
		'album/:albumId/page/:page': 'showAlbum'

	onRoute: (name, path, args)->
		console.log('User navigated to ', name, path);


module.exports = {
	router: AlbumRouter,
	controller: AlbumController
}