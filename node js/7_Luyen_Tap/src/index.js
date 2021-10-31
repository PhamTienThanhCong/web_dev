const express = require('express');
const app = express();
const PORT = process.env.PORT || 5000
const handlebars  = require('express-handlebars');
const path = require('path');
const route = require('./router/index');
const DB = require('./config/DB/index');

// Khởi tạo handlebars
app.engine('hbs', handlebars({
  extname: '.hbs',
}));
// set đường dẫn cho handlebar
app.set('view engine', 'hbs');
app.set('views', path.join(__dirname, 'scoures/views'))
// set đường dẫn cho file public
app.use(express.static(path.join(__dirname, './public')));

// set điều kiện để cho chươngw trình chạy được post
app.use(express.urlencoded({
  extended: true,
}))
app.use(express.json());

DB.connect;
route(app);

app.listen(PORT, () => {
  console.log(`Kết nối thành công http://localhost:${PORT}`)
})