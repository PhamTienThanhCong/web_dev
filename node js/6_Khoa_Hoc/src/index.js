const express = require('express');
const app = express();
const port = 3000;
const path = require('path');
const handlebars  = require('express-handlebars');
const route = require('./router');
const db = require('./config/db/index');
var methodOverride = require('method-override');
const SortMiddleware = require('./app/middleware/sortMiddleware');

var Handlebars = require('handlebars');

Handlebars.registerHelper("inc", function(value, options)
{
    return parseInt(value) + 1;
});

// sử dụng các file public
app.use(express.static(path.join(__dirname,'public')));

// sử dụng model handlebars
app.engine('hbs', handlebars({
    extname: '.hbs',
    helpers: {
      sortMiddleware: (name, sort) => {
        // const sortType = name === sort.column ? sort.type : 'default';
        var sortType;
        if (name === sort.name){
          sortType = sort.type;
        }
        else{
          sortType = 'default';
        }
 
        const typeIcons = {
          default: 'oi oi-resize-height',
          asc: 'oi oi-sort-ascending',
          desc: 'oi oi-sort-descending'
        }

        const types = {
          default: 'desc',
          asc: 'desc',
          desc: 'asc',
        }
        const icon = typeIcons[sortType];
        const type = types[sortType];

        return `<a href="?_sort&column=${name}&type=${type}">
        <span class="${icon}"></span>
        </a>`;
        // return `<a href="?_sort&column=${name}&type=${type}">
        // <span class="${typeIcon}"></span>
        // </a>`;
    }
  }
}));
app.set('view engine', 'hbs');
app.set('views', path.join(__dirname, 'scoure/views'));

// Phương Thức post
app.use(express.urlencoded({
  extended: true
}))
app.use(express.json())

app.use(methodOverride('_method'))

//costume sortMiddleware
app.use(SortMiddleware)

db.connet();
route(app);

app.listen(port, () => {
  console.log(`Example app listening at http://localhost:${port}`)
})