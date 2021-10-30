const express = require('express');
const app = express();
const port = 3000;
const handlebars  = require('express-handlebars');
const path = require('path');
const route = require('./router/index');
const db = require('./config/DB');

// Khởi tạo handlebars
app.engine('hbs', handlebars({
  extname: '.hbs',
}));
// set đường dẫn cho handlebar
app.set('view engine', 'hbs');
app.set('views', path.join(__dirname, 'scoures/views'))
// set đường dẫn cho file public
app.use(express.static(path.join(__dirname, './public')));

db.connet();
route(app);

app.listen(port, () => {
  console.log(`Example app listening at http://localhost:${port}`)
})