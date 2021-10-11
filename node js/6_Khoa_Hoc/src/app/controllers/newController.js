var data = require('../model/data');
var { mutipleMongooseToObject } = require('../../util/mongooseHelper');

class newController {
    news(req,res){
        res.render('news')
    }
    home(req,res){
        res.send('hello')
    }
    data(req,res,next){
        data.find({})
            .then(courseras => {
                res.render('home',{
                    courseras: mutipleMongooseToObject(courseras)
                })
            })
            .catch(next)
    }
}

module.exports = new newController
