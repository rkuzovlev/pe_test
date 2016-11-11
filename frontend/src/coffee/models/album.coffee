Backbone = require('backbone')

Album = Backbone.Model.extend
	url: '/api/albums'
	defaults:
		name: ""
		src: "/assets/img/no_photo.png"

module.exports = Album