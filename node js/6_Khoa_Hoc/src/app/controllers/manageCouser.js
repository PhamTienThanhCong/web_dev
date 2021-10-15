var data = require('../model/data');
var { MongooseToObject } = require('../../util/mongooseHelper');
var { mutipleMongooseToObject } = require('../../util/mongooseHelper');

class manageCouser {
    manage(req,res,next){
        data.find({})
            .then(courseras =>{
                res.render('manage/manage',{
                    courseras: mutipleMongooseToObject(courseras)
                })
            })
            .catch(next)
    }
    update(req,res,next){
        data.findById(req.params.id)
            .then(coursera =>{
                res.render('manage/update', {
                    coursera: MongooseToObject(coursera)
                })
            })
            .catch(next)
        // res.send(req.params.id)
    }
    kho(req,res,next){
        data.updateOne({_id: req.params.id}, req.body )
            .then(() => res.redirect('/manage'))
            .catch(next);
    }
    delete(req,res,next){
        data.deleteOne({_id: req.params.id})
            .then(() => res.redirect('back'))
            .catch(next);
    }
}

module.exports = new manageCouser
