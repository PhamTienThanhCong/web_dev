const express = require('express')
const router = express.Router()

var newController = require('../app/controller/newController')

router.get('/data',newController.data);
router.get('/',newController.home);

module.exports = router