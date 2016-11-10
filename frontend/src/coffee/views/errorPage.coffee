$ = require('jquery')
Marionette = require('backbone.marionette')
Backbone = require('backbone')
E404 = require("../templates/error_pages/404.hbs")
E500 = require("../templates/error_pages/500.hbs")


ErrorPage = Marionette.View.extend
	initialize: (options)->
		switch options.page.toString()
			when '404' then @template = E404
			else @template = E500

	events:
		'click a': 'redirect'

	redirect: (event)->
		a = document.createElement('a')
		a.href = $(event.currentTarget).attr('href')

		Backbone.history.navigate a.pathname, trigger: true
		event.preventDefault()


module.exports = ErrorPage
