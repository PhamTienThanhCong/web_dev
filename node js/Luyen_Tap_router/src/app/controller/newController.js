const data = require('../model/DataTest')
const { mutipleMongooseToObject } = require('../../util/mongooseHelper')

class newControllers{
    
    data(req, res, next){
        data.find({})
            .then(testdatas => {
                res.render('data',{ 
                    testdatas: mutipleMongooseToObject(testdatas)
                })
            })
            // .then(testdatas => res.json(testdatas))
            .catch(next)
    }

    home(req, res){
        res.render('news')
    }
}

module.exports = new newControllers