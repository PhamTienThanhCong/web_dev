const newRouter = require('./newRouter');
const couserRouter = require('./couserRouter');

function route(app) {
    app.use('/coursera',couserRouter)
    app.use('/',newRouter)
}

module.exports = route