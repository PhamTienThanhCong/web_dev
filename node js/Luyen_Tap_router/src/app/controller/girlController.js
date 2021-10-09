const datagirl = require('../model/DataTest')
const { MongooseToObject } = require('../../util/mongooseHelper')

class girlControllers{
    
    show(req, res, next){
        datagirl.findOne({url: req.params.slug})
            .then(testdata => {
                res.render('girl/view',{ testdata: MongooseToObject(testdata) })
            })
            .catch(next)
            
        // res.send("ban nay ten "+ req.params.slug);
    }
}

module.exports = new girlControllers