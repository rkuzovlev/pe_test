Marionette = require('backbone.marionette');
Backbone = require('backbone')
template = require('../../templates/image/emptyImageList.hbs')

EmptyImageList = Marionette.View.extend
	template: template
	className: 'no_content'

module.exports = EmptyImageList