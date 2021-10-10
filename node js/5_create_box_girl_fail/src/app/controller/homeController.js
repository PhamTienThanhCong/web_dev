const data = require('../model/DataTest')
const { mutipleMongooseToObject } = require('../../util/mongooseHelper')

class newControllers{
    
    home(req, res, next){
        data.find({})
            .then(testdatas => {
                res.render('home',{ 
                    testdatas: mutipleMongooseToObject(testdatas)
                })
            })
            // .then(testdatas => res.json(testdatas))
            .catch(next)
    }
}

module.exports = new newControllers