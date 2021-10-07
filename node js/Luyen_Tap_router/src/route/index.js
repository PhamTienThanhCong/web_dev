const news = require('./newsRoute')
const font = require('./fontRoute')

function router(app){
    app.use('/news',news)
    app.use('/home',font)
}

module.exports = router