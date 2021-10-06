const mongoose = require('mongoose');
const Schema = mongoose.Schema;

const Course = new Schema({
  name: {type: String, minlength: 1},
  school: {type: String, minlength: 1},
  age: {type: Date, default: Date.now},
  createdAt: {type: Date, default: Date.now},
  uplatedAt: {type: Date, default: Date.now},
});

module.exports = mongoose.model('Course', Course);
