Marionette = require('backbone.marionette');
Backbone = require('backbone')

ErrorPage = require('../views/errorPage')

AlbumListCollectionView = require('../views/album_list/collection')
AlbumListControlsView = require('../views/album_list/controls')
AlbumListCollection = require('../collections/albumList')

ImageCollectionView = require('../views/image/collection')
ImageControlsView = require('../views/image/controls')
ImageCollection = require('../collections/imageList')


AlbumController = Marionette.Object.extend
	channelName: 'notify',

	radioRequests: 
		'get:album': 'getAlbum'

	radioEvents:
		'add:album': 'addAlbum'
		'add:image': 'addImage'

	getAlbum: ()->
		@albumId

	addImage: (image)->
		@imageList.add image if @imageList and image

	addAlbum: (album)->
		@albumList.add album if @albumList and album

	initialize: (options)->
		@layout = options.layout;
		
		@albumList = new AlbumListCollection()
		@imageList = new ImageCollection()

	listAlbums: ()->
		@layout.showChildView 'controls', new AlbumListControlsView()
		@layout.showChildView 'content', new AlbumListCollectionView(collection: @albumList)

		@albumList.fetch()

	showAlbum: (albumId, page)->
		@albumId = albumId
		@page = page

		url = '/api/album/' + albumId
		url += '/page/' + page if page		

		@layout.showChildView 'controls', new ImageControlsView()
		@layout.showChildView 'content', new ImageCollectionView(collection: @imageList)

		@imageList.reset()
		@imageList.url = url
		@imageList.fetch()


	default: ()->
		@layout.detachChildView 'content'
		@layout.showChildView 'controls', new ErrorPage page: 404
		


AlbumRouter = Marionette.AppRouter.extend
	appRoutes:
		'': 'listAlbums'
		'album/:albumId': 'showAlbum'
		'album/:albumId/page/:page': 'showAlbum'
		'*default' : 'default'

	onRoute: (name, path, args)->
		console.log('User navigated to ', name, path);


module.exports = {
	router: AlbumRouter,
	controller: AlbumController
}