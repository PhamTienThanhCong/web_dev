const mongoose = require('mongoose');
const Schema = mongoose.Schema;
const slug = require('mongoose-slug-generator');
const mongooseDelete = require('mongoose-delete');

mongoose.plugin(slug);

const BlogPost = new Schema({
  name: {type: String},
  img: {type: String},
  description: {type: String},
  ytb: {type: String},
  url: { type: String, slug: "name", unique: true },
  author: { type: String,default: "Be Công"},
  createTime: {type: Date, default: Date.now},
  updateTime: {type: Date, default: Date.now},
});

BlogPost.plugin(mongooseDelete, { deletedAt : true ,overrideMethods: 'all'});

module.exports = mongoose.model('coursera', BlogPost);