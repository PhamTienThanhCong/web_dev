const express   = require('express')
const app       = express()
const port      = 3000
const morgan    = require('morgan')
const handlebars    = require('express-handlebars');
const path      = require('path')

app.use(morgan('combined'))

app.engine('hbs', handlebars({
    extname: '.hbs'
}));
app.set('view engine', 'hbs');
app.set('views',path.join(__dirname,'scoure/views'))

app.get('/', function (req, res) {
    res.render('home');
});

app.get('/tac-gia', function (req, res) {
    res.render('tac-gia');
});

app.listen(port, () => {
  console.log(`Example app listening at http://localhost:${port}`)
})