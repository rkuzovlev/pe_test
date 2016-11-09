Marionette = require('backbone.marionette')
Backbone = require('backbone')
AlbumRouter = require('./routers/album')
Layout = require('./views/layout')

PayeverApp = Marionette.Application.extend
	region: "#content"
	
	onStart: ()->
		layout = new Layout()

		main = this.getRegion();
		main.show(layout);

		@ac = new AlbumRouter.controller layout: layout
		@ar = new AlbumRouter.router controller: @ac

		Backbone.history.start pushState: true


module.exports = new PayeverApp()