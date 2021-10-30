
class newControllers{
    home(req, res, next){
        res.render('home')
    }
    new(req, res, next){
        res.render('new')
    }
}

module.exports = new newControllers;
