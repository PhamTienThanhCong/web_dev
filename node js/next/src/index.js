const express     = require('express')
const app         = express()
const port        = 3000
const morgan      = require('morgan')
const handlebars  = require('express-handlebars');
const path        = require('path')

app.use(morgan('combined'))

app.engine('hbs', handlebars({
    extname: '.hbs'
}));
app.set('view engine', 'hbs');
app.set('views', path.join(__dirname,'scrouce/views'));

app.use(express.static(path.join(__dirname,'public')))

app.get('/', (req, res) => {
  res.render('home')
})

app.listen(port, () => {
  console.log(`Example app listening at http://localhost:${port}`)
})