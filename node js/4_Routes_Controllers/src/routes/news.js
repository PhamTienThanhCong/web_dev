const express = require('express')
const router = express.Router()

const newControllers = require('../app/controllers/NewsControllers')

// newControllers.index
router.use('/login/registers', newControllers.registers)
router.use('/login', newControllers.login)
router.use('/scrouce', newControllers.scrouce)
router.use('/', newControllers.index)

module.exports = router