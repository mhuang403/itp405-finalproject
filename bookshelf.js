var knex = require('knex')({
	client: 'mysql',
	connection: {
		host: 'uscitp.com',
		user: 'sophiajl_wine',
		password: 'wineuser',
		database: 'sophiajl_wine_db',
		charset: 'utf8'
	}
});

var bookshelf = require('bookshelf')(knex);

module.exports = bookshelf;