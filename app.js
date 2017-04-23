var express = require('express');
var app = express();
// var bookshelf = require('./bookshelf');
var Wine = require('./models/wine');
// var Type = require('./models/type');
// var Grape = require('./models/grape');
// var Country = require('./models/country');
// var bodyParser = require('body-parser');

// var Wine = bookshelf.Model.extend({
// 	tableName: 'wine_list'
// });

// app.use(bodyParser.json());

// app.use(bodyParser.urlencoded({ extended: true }))

app.get('/api/wine', function(request, response) {
	Wine.fetchAll().then(function(wine) {
	response.json(wine);
});
});

app.get('/api/wine/:id', function(request, response) {
	Wine.where('wine_id', request.params.id)
	// .fetch()
	.fetch({ require: true, withRelated: ['type', 'grape', 'country'] })
	.then(function(wine) {
		response.json(wine);
	}, function() {
		response.json({
			error: 'Wine not found'
		});
	});
});

// app.post('/api/v1/reviews', function(request, response) {
// 	var review = new Review ({
// 		book_id: request.body.book_id,
// 		headline: request.body.headline,
// 		body: request.body.body,
// 		rating: request.body.rating
// 	});

// 	review.save().then(function() {
// 	response.json(review);
// });
// });

app.listen(8000);