Marionette = require('backbone.marionette');
Backbone = require('backbone')
template = require('../../templates/image/image.hbs')

Image = Marionette.View.extend
	template: template
	className: 'image g-lg-4 g-md-4 g-sm-6 g-xs-12'

module.exports = Image