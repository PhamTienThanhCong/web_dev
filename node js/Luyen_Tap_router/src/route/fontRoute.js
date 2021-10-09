const express = require('express')
const router = express.Router()

const fontController = require('../app/controller/fontController')

router.get('/login',fontController.login)
router.get('/registers',fontController.registers)

module.exports = router