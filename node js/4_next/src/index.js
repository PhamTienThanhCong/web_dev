const express     = require('express')
const app         = express()
const port        = 3000
const morgan      = require('morgan')
const handlebars  = require('express-handlebars');
const path        = require('path');
const route       = require('./routes')

// app.use(morgan('combined'))

app.engine('hbs', handlebars({
    extname: '.hbs'
}));
app.set('view engine', 'hbs');
app.set('views', path.join(__dirname,'scrouce/views'));

app.use(express.static(path.join(__dirname,'public')))

app.use(express.urlencoded({
  extended: true
}));
app.use(express.json());

route(app)

app.listen(port, () => {
  console.log(`Example app listening at http://localhost:${port}`)
})