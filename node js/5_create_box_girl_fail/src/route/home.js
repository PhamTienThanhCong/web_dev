const express = require('express')
const router = express.Router()

var homeController = require('../app/controller/homeController')

router.get('/',homeController.home);

module.exports = router