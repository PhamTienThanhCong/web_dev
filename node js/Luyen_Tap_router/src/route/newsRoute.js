const express = require('express')
const router = express.Router()

var newController = require('../app/controller/newController')

router.use('/data',newController.data);
router.use('/',newController.home);

module.exports = router