const express = require('express');
const router = express.Router();
const newControllers = require('../app/controller/courseControllers');

router.get('/',newControllers.home);
router.get('/:slug',newControllers.new);

module.exports = router;