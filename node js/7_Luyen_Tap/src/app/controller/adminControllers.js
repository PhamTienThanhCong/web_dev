const data = require('../model/coursera');
var { MongooseToObject } = require('../../util/mongooseHelper');
var { mutipleMongooseToObject } = require('../../util/mongooseHelper');

class adminRouter{
    admin(req, res, next){
        res.send("<h1>ad min</h1>")
    }
    create(req, res, next){
        res.render('admin/create')
    }
    createCourse(req, res,next){
        const course = new data(req.body);
        course.save()
            .then(() => {
                res.json(course)
            })
            .catch(next);
    }

}

module.exports = new adminRouter;