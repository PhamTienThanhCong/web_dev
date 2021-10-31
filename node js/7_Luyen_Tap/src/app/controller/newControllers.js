const dataCoursera = require('../model/coursera');

class newControllers{
    new(req, res, next){
        dataCoursera.find({})
            .then(dataCoursera=>{
                res.json(dataCoursera)
            })
            .catch(next)
        // res.render('home')
    }
    home(req, res, next){
        res.render('coursera')
    }
}

module.exports = new newControllers;
