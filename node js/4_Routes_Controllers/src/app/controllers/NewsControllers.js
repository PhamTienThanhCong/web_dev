
class NewControllers{
    index(req, res){
        res.render('news')
    }
    login(req, res){
        res.render('login')
    }
    registers(req, res){
        res.render('registers')
    }
}

module.exports = new NewControllers
