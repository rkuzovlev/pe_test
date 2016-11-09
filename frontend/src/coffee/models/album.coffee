Backbone = require('backbone')

Album = Backbone.Model.extend
	defaults:
		name: ""
		src: ""

module.exports = Album