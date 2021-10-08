const dataTest = require('../model/dataTest')

class newControllers{
    data(req, res){
        dataTest.find({},function (err, testdatas) {
            if(!err){
                res.json(testdatas);
            }
            else{
                res.status(400).send('Sorry, we cannot find that :((( ')
            }
        })
    }

    home(req, res){
        res.render('news')
    }
}

module.exports = new newControllers