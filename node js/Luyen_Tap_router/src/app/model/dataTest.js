const mongodb = require('mongoose');
const Schema = mongodb.Schema;

const testdata = new Schema({
    name: {type: String, minlength: 1},
    age: {type: String, maxlength: 3},
    image: {type: String},
    url: {type: String,minlength: 2},
    ytb: {type: String},
    createTime: {type: Date, default: Date.now},
    updateTime: {type: Date, default: Date.now},
})

module.exports = mongodb.model('testdata',testdata);
