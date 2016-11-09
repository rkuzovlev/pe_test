Marionette = require('backbone.marionette');
Image = require('./image')
EmptyImageList = require('./emptyImageList')

ImageCollection = Marionette.CollectionView.extend
	childView: Image
	emptyView: EmptyImageList

module.exports = ImageCollection