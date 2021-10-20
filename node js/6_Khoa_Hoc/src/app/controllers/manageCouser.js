var data = require('../model/data');
var { MongooseToObject } = require('../../util/mongooseHelper');
var { mutipleMongooseToObject } = require('../../util/mongooseHelper');

class manageCouser {
    manage(req,res,next){
        Promise.all([data.find({}),data.countDocumentsDeleted()])
            .then(([courseras,numberDelete]) => {
                res.render('manage/manage',{
                    numberDelete,
                    courseras: mutipleMongooseToObject(courseras),
                })
            })
            .catch(next)
    }

    manageRecbin(req,res,next){
        data.findDeleted()
            .then(courseras =>{
                res.render('manage/recbin',{
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
    }

    //Thông báo update
    kho(req,res,next){
        data.updateOne({_id: req.params.id}, req.body )
            .then(() => res.redirect('/manage'))
            .catch(next);
    }
    // Xóa Giả
    delete(req,res,next){
        data.deleteById(req.params.id)
            .then(() => res.redirect('back'))
            .catch(next);
    }

    //XÓA vĩnh viễn
    recbinDelete(req,res,next){
        data.deleteOne({ _id: req.params.id })
            .then(() => res.redirect('back'))
            .catch(next);
    }

    restore(req,res,next){
        data.restore({ _id: req.params.id })
            .then(() => res.redirect('back'))
            .catch(next);
    }

}

module.exports = new manageCouser
