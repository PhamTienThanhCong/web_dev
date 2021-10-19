var data = require('../model/data');
var { MongooseToObject } = require('../../util/mongooseHelper');
var { mutipleMongooseToObject } = require('../../util/mongooseHelper');

class couserController {
    data(req,res,next){
        data.findOne({url: req.params.slug})
            .then(coursera => {
                res.render('coursera/data',{
                    coursera: MongooseToObject(coursera)
                })
            })
            .catch(next)
    }

    create(req,res,next){
        res.render('coursera/createData')            
    }
    
    kho(req,res,next){
        const newData = new data(req.body)
        newData.save()
        .then(() => res.redirect('/manage'))
        .catch(next);
    }
}

module.exports = new couserController
