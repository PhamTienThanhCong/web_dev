const express = require('express');
const router = express.Router();
const newControllers = require('../app/controller/adminControllers');

router.get('/create',newControllers.create)
router.post('/creating',newControllers.createCourse)
router.get('/',newControllers.admin)

module.exports = router;