const express = require('express')
const morgan = require('morgan')
const app = express()
const port = 3000

app.use(morgan('combined'))

app.get('/hello', (req, res) => {
  res.send('<h1>Hello world!</h1><br><a href="http://localhost:3000/next">hello world</a>')
})
app.get('/next', (req, res) => {
  res.send('<h1>Phạm Tiến Thành Công!</h1>')
})

app.listen(port, () => {
  console.log(`Example app listening at http://localhost:${port}`)
})