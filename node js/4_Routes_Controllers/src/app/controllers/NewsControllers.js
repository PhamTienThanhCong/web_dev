const Course = require('../models/course')


class NewControllers{
    scrouce(req, res){
        Course.find({}, function (err, courses) {
           if (!err) {
               res.json(courses)
            }
           else {
               res.status(404).send('Sorry, we cannot find that!')
           };
          });
    }

    index(req, res){
        res.render('news')
    }
    login(req, res){
        res.render('login')
    }
    registers(req, res){
        res.render('registers')
    }
}

module.exports = new NewControllers
