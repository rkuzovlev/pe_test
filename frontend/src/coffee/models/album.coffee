Backbone = require('backbone')

Album = Backbone.Model.extend
	url: '/api/albums'
	defaults:
		name: ""
		src: "https://upload.wikimedia.org/wikipedia/commons/thumb/a/ac/No_image_available.svg/300px-No_image_available.svg.png"

module.exports = Album