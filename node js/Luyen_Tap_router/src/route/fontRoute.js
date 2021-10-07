const express = require('express')
const router = express.Router()

const fontController = require('../app/controller/fontController')

router.use('/login',fontController.login)
router.use('/registers',fontController.registers)
router.use('/',fontController.home)

module.exports = router