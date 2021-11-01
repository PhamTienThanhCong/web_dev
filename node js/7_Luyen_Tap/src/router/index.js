newRouter = require('./courseRouter');
adminRouter = require('./adminRouter');

function route(app){
    app.use('/courses',newRouter);
    app.use('/admin',adminRouter);
}

module.exports = route
