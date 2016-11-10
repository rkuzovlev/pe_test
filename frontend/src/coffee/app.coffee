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

		# support dev env, not fully suported yet :(
		root = '/'
		if window.location.pathname.indexOf('/app_dev.php') == 0
			root = "/app_dev.php"

		Backbone.history.start pushState: true, root: root


module.exports = new PayeverApp()