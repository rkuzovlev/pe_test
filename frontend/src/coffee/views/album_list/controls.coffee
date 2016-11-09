Marionette = require('backbone.marionette');
template = require('../../templates/album_list/controls.hbs')

Controls = Marionette.View.extend
	template: template


module.exports = Controls
