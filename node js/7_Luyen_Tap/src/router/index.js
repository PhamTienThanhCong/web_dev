newRouter = require('./newRouter');

function route(app){
    app.use('/',newRouter);
}

module.exports = route
