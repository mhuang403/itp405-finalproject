var bookshelf = require('./../bookshelf');
var Type = require('./type');
var Grape = require('./grape');
var Country = require('./country');

var Wine = bookshelf.Model.extend({
	tableName: 'wine_list',
	type: function() {
		return this.belongsTo(Type)
	},
	grape: function() {
		return this.belongsTo(Grape);
	},
	country: function() {
	return this.belongsTo(Country);
	}
});

module.exports = Wine;