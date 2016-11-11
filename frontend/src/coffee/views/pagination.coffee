$ = require('jquery')
Marionette = require('backbone.marionette');
Backbone = require('backbone')
template = require('../templates/pagination.hbs')

Pagination = Marionette.View.extend
	template: template
	channelName: 'notify',

	radioEvents:
		'add:image': 'imageAdded'

	events:
		'click a': 'redirect'

	redirect: (event)->
		a = document.createElement('a')
		a.href = $(event.currentTarget).attr('href')

		Backbone.history.navigate a.pathname, trigger: true
		event.preventDefault()
	
	initialize: (options)->
		@page = parseInt options.page
		@count = parseInt options.count
		@url = options.url
		@onpage = options.onpage

	render: ()->
		count = Math.ceil(@count / @onpage)
		if count <= 1
			this.$el.html ""
			return

		min = @page - 2
		min = 1 if min < 1
		max = @page + 2
		max = count if max > count
		showStart = if min == 1 then false else true
		showEnd = if max == count then false else true
		showStartDots = if min <= 2 then false else true
		showEndDots = if max >= count - 1 then false else true
		showLArrow = if @page > 1 then true else false
		showRArrow = if @page < count then true else false
		nextp = @page + 1
		prevp = @page - 1

		pages = []
		for num in [min..max]
			pages.push {
				num: num
				active: if num is @page then true else false
			}

		options =
			url: @url
			page: @page
			count: count
			min: min
			max: max
			showStart: showStart
			showEnd: showEnd
			showStartDots: showStartDots
			showEndDots: showEndDots
			showLArrow: showLArrow
			showRArrow: showRArrow
			nextp: nextp
			prevp: prevp
			pages: pages

		# console.log(options)

		this.$el.html this.template(options)

		return @

	imageAdded: ()->
		@count++
		@render()

	incPage: ()->
		@page++
		@render()

	decPage: ()->
		@page--
		@render()

	setPage: (page)->
		if page < 1
			page = 1
		
		c = Math.ceil(@count / @onpage)
		if page > c
			page = c
		
		@page = page
		@render()

module.exports = Pagination