const mongodb = require('mongoose');
const Schema = mongodb.Schema;

const data = new Schema({
    name: {type: String, minlength: 2},
    age: {type: String, maxlength: 3},
    createTime: {type: Date, default: Date.now},
    updateTime: {type: Date, default: Date.now},
})

module.exports = mongodb.model('testdata', data);
