const express = require('express')
const router = express.Router()

var girlController = require('../app/controller/girlController')

router.get('/:slug',girlController.show);

module.exports = router