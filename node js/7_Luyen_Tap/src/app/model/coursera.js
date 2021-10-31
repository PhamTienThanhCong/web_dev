const mongoose = require('mongoose');
const slug = require('mongoose-slug-generator');
const Schema = mongoose.Schema;
mongoose.plugin(slug);

const course = new Schema({
    name: {type: String, minlength: 1},
    author: {type: String, minlength:2},
    description: {type: String, minlength:5},
    image: {type: String},
    slug: {type: String, slug: 'name', unique: true},
    createdAt: { type : Date, default: Date.now }
})

module.exports = mongoose.model('coursera', course);