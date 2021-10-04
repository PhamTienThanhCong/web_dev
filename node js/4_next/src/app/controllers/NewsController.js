
class NewsController{
    index(req, res){
        res.render('news')
    }
    show(req, res){
        res.send("heelo mấy cưng !")
    }
}

module.exports = new NewsController
