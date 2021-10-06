const newsRouter = require('./news')

function route(app) {
    app.use('/news',newsRouter)

    // app.get('/login', (req, res) => {
    //     console.log(req.query.search)
    //     res.render('login')
    // })
    // app.get('/registers', (req, res) => {
    //     console.log(req.query.search)
    //     res.render('registers')
    // })
}

module.exports = route
