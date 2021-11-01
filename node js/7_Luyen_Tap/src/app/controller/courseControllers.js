const dataCoursera = require('../model/coursera');
var { MongooseToObject } = require('../../util/mongooseHelper');
var { mutipleMongooseToObject } = require('../../util/mongooseHelper');

class newControllers{
    new(req, res, next){
        dataCoursera.find({})
            .then(courseras=>{
                res.json(courseras)
            })
            .catch(next)
        // res.render('home')
    }
    home(req, res, next){
        dataCoursera.find({})
            .then(courseras=>{
                res.render('coursera',{
                    dataCoursera: mutipleMongooseToObject(courseras)
                })
            })
            .catch(next)
    }
}

module.exports = new newControllers;
