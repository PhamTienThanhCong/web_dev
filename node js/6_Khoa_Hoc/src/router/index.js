const newRouter = require('./newRouter');
const manageRouter = require('./managerRouter');
const couserRouter = require('./couserRouter');

function route(app) {
    app.use('/manage',manageRouter)
    app.use('/coursera',couserRouter)
    app.use('/',newRouter)
}

module.exports = route