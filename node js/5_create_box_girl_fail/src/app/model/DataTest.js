const mongodb = require('mongoose');
const Schema = mongodb.Schema;
const slug = require('mongoose-slug-generator');

mongodb.plugin(slug)

const testdata = new Schema({
    name: {type: String, minlength: 1},
    age: {type: String, maxlength: 3},
    image: {type: String},
    url: { type: String, slug: 'name', unique: true },
    ytb: {type: String},
})

module.exports = mongodb.model('testdata',testdata);
