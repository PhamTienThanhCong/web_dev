const express = require('express')
const app = express()
const port = 3000
const handlebars = require('express-handlebars')
const path = require('path')
const route = require('./route')
const db = require('./config/db')


app.use(express.urlencoded({
  extended: true
}))
app.use(express.json())

app.engine('hbs', handlebars({
  extname: '.hbs'
}));
app.set('view engine', 'hbs');
app.set('views', path.join(__dirname, 'scoures/views'))

// sử dụng file public
app.use(express.static(path.join(__dirname, 'public')))

db.connet()
route(app)

// app.get('/news', (req, res) => {
//     res.render('news')
// })

app.listen(port, () => {
  console.log(`Example app listening at http://localhost:${port}`)
})