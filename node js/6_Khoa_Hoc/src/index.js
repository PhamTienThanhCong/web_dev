const express = require('express')
const app = express()
const port = 3000
const path = require('path')
const handlebars  = require('express-handlebars');
const route = require('./router')
const db = require('./config/db/index')

var Handlebars = require('handlebars');

Handlebars.registerHelper("inc", function(value, options)
{
    return parseInt(value) + 1;
});

// sử dụng các file public
app.use(express.static(path.join(__dirname,'public')));

// sử dụng model handlebars
app.engine('hbs', handlebars({
    extname: '.hbs'
}));
app.set('view engine', 'hbs');
app.set('views', path.join(__dirname, 'scoure/views'));

// Phương Thức post
app.use(express.urlencoded({
  extended: true
}))
app.use(express.json())

db.connet();
route(app);

app.listen(port, () => {
  console.log(`Example app listening at http://localhost:${port}`)
})