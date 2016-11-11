$ = require('jquery')
Marionette = require('backbone.marionette');
Backbone = require('backbone')
template = require('../templates/layout.hbs')
Radio = require('backbone.radio');

notifyChannel = Radio.channel('notify');

PaginationView = require('../views/pagination')

IMAGES_ON_PAGE = 9

Layout = Marionette.View.extend
	template: template

	regions:
		header: 'section.header'
		controls: 'section.controls'
		content: 'section.content'
		pagination: 'section.pagination'

	ui: 
		home: 'section.header a'

	events:
		'click @ui.home': 'goHome'

	showAlbumPagination: (albumId, page)->
		if @albumId is albumId
			pag = @getChildView 'pagination'
			pag.setPage page
		else
			$.ajax
				url: '/api/album/' + albumId + '/count'
				type: 'GET'

				success: (count, textStatus, jqXHR)=>
					opt = {
						page: page
						count: count
						url: '/album/' + albumId + '/page/'
						onpage: IMAGES_ON_PAGE
					}
					@showChildView 'pagination', new PaginationView opt
					
			@albumId = albumId

	hidePagination: ()->
		@detachChildView 'pagination'


	goHome: (event)->
		# root = notifyChannel.request('get:root')
		root = '/'
		Backbone.history.navigate root, trigger: true
		event.preventDefault()


module.exports = Layout
