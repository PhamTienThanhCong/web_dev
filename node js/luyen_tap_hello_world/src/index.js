const path = require('path')
const express = require('express')
const app = express()
const port = 3000
const morgan = require('morgan')
const handlebars = require('express-handlebars');

app.use(morgan('combined'))

// app.engine('handlebars', handlebars({
//   extname = '.handlebars'
// }));

app.engine('hbs', handlebars({
  extname: '.hbs'
}))
app.set('view engine', 'hbs');
app.set('views', path.join(__dirname, 'rescources\\views'));



app.get('/', (req, res) => {
  res.render('home')
})

app.get('/test', (req, res) => {
  res.render('test')
})

app.get('/luyen-tap', (req, res) => {
  res.send(`
    <h3> hello world </h3>
  `)
})

app.listen(port, () => {
  console.log(`Example app listening at http://localhost:${port}`)
})