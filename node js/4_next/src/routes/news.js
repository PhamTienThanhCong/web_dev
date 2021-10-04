const express = require('express')
const route = require('.')
const router = express.Router()

const newsController = require('../app/controllers/NewsController')

router.use('/hello', newsController.show)
router.use('/', newsController.index)

module.exports = router