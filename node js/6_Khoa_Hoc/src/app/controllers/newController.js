var data = require('../model/data');
var { mutipleMongooseToObject } = require('../../util/mongooseHelper');

class newController {
    news(req,res){
        res.render('news')
    }
    home(req,res){
        res.render('home')
    }
    data(req,res,next){
        data.find({})
            .then(courseras =>{
                res.json(courseras)
            })
            .catch(next)
    }
}

module.exports = new newController
