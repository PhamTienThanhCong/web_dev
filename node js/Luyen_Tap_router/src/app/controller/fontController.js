
class fontController{
    home(req,res){
        res.render('home')
    }
    login(req, res){
        res.render('login')
    }
    registers(req, res){
        res.render('registers')
    }
}

module.exports = new fontController