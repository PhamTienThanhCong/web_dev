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
    create(req, res, next){
        res.render('girl/create')
    }

    store(req, res, next){
        const data = new datagirl(req.body);
        data.save()
        res.render('girl/store')
    }
}

module.exports = new girlControllers