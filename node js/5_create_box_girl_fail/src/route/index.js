const home = require('./home')
const girl = require('./girlRoute')
const font = require('./fontRoute')

function router(app){
    app.use('/girl',girl)
    app.use('/home',home)
    app.use('/',font)
}

module.exports = router