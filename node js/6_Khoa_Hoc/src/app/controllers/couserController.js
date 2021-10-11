var data = require('../model/data');
var { MongooseToObject } = require('../../util/mongooseHelper');

class couserController {
    create(req,res,next){
        data.findOne({url: req.params.slug})
            .then(coursera => {
                res.render('coursera/createData',{
                    coursera: MongooseToObject(coursera)
                })
            })
            .catch(next)
    }

    data(req,res,next){
        data.findOne({url: req.params.slug})
            .then(coursera => {
                res.render('coursera/data',{
                    coursera: MongooseToObject(coursera)
                })
            })
            .catch(next)
    }
}

module.exports = new couserController
