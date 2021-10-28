var data = require('../model/data');
var { MongooseToObject } = require('../../util/mongooseHelper');
var { mutipleMongooseToObject } = require('../../util/mongooseHelper');

class manageCouser {
    manage(req,res,next){
        let courseQuery =data.find({})
        if(req.query.hasOwnProperty('_sort')){
            courseQuery = courseQuery.sort({
                [req.query.column] : req.query.type
            });
        }

        Promise.all([courseQuery,data.countDocumentsDeleted()])
            .then(([courseras,numberDelete]) => {
                res.render('manage/manage',{
                    numberDelete,
                    courseras: mutipleMongooseToObject(courseras),
                })
            })
            .catch(next)
    }

    manageRecbin(req,res,next){
        let courseQuery = data.findDeleted()
        if(req.query.hasOwnProperty('_sort')){
            courseQuery = courseQuery.sort({
                [req.query.column] : req.query.type
            });
        }
        
        courseQuery
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

    //
    restore(req,res,next){
        data.restore({ _id: req.params.id })
            .then(() => res.redirect('back'))
            .catch(next);
    }

    // lựa chọn và Thực hiện nhiều trong home
    CouserSelecAction(req, res, next) {
        switch (req.body.ActionSelect) {
            case 'delete':
                data.delete({_id: {$in: req.body.courseIds } })
                    .then(() => res.redirect('back'))
                    .catch(next);
                break;
            default:
                res.json({ messenge : 'action is not allowed'})
                break;
        }
    }

    // lựa chọn và Thực hiện nhiều trong recbin
    RecbinSelecAction(req, res, next) {
        switch (req.body.ActionSelect) {
            case 'restore':
                data.restore({_id: {$in: req.body.courseIds } })
                    .then(() => res.redirect('back'))
                    .catch(next);
                break;
            case 'delete':
                data.deleteMany({_id: {$in: req.body.courseIds } })
                    .then(() => res.redirect('back'))
                    .catch(next);
                break;
            default:
                res.json({ messenge : 'action is not allowed'});
                break;
        }
    }



}

module.exports = new manageCouser
