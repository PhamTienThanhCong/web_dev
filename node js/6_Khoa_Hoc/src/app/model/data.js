const mongoose = require('mongoose');
const Schema = mongoose.Schema;
const slug = require('mongoose-slug-generator');

mongoose.plugin(slug);

const BlogPost = new Schema({
  name: {type: String},
  img: {type: String},
  description: {type: String},
  ytb: {type: String},
  url: { type: String, slug: "name", unique: true },
  createTime: {type: Date, default: Date.now},
  updateTime: {type: Date, default: Date.now},
});

module.exports = mongoose.model('coursera', BlogPost);