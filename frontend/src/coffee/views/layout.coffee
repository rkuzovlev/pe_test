Marionette = require('backbone.marionette');
template = require('../templates/layout.hbs')

Layout = Marionette.View.extend
	template: template

	regions:
		header: 'section.header'
		controls: 'section.controls'
		content: 'section.content'


module.exports = Layout
