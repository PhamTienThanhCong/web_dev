const express = require('express')
const app = express()
const port = 3000
const path = require('path')
const handlebars  = require('express-handlebars');
const route = require('./router')
const db = require('./config/db/index')


// sử dụng các file public
app.use(express.static(path.join(__dirname,'public')));

// sử dụng model handlebars
app.engine('hbs', handlebars({
    extname: '.hbs'
}));
app.set('view engine', 'hbs');
app.set('views', path.join(__dirname, 'scoure/views'));

// app.get('/', function (req, res) {
//     res.render('home');
// });
// app.get('/news', function (req, res) {
//     res.render('news');
// });

db.connet();
route(app);

app.listen(port, () => {
  console.log(`Example app listening at http://localhost:${port}`)
})