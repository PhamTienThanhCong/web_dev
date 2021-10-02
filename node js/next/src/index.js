const express     = require('express')
const app         = express()
const port        = 3000
const morgan      = require('morgan')
const handlebars  = require('express-handlebars');
const path        = require('path');
const { Console } = require('console');
var test;

// app.use(morgan('combined'))

app.engine('hbs', handlebars({
    extname: '.hbs'
}));
app.set('view engine', 'hbs');
app.set('views', path.join(__dirname,'scrouce/views'));

app.use(express.static(path.join(__dirname,'public')))


app.get('/', (req, res) => {
  
  if (req.query.email == "cong.pttc@gmail.com" && req.query.passworld == "cong" && req.query.check == "on"){
    res.render('home')
  }
  else{
    console.log("lỗi cú pháp")
  }
  res.render('login')
})

app.get('/home', (req, res) => {
  test = req.query.search
  if (test=="news"){
    res.render('news')
  }
  res.render('home')
})

app.get('/news', (req, res) => {
  res.render('news')
})

app.listen(port, () => {
  console.log(`Example app listening at http://localhost:${port}`)
})