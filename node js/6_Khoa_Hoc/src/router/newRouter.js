const express = require('express');
const router = express.Router();

const newController = require('../app/controllers/newController');

router.get('/home',newController.home);
router.get('/news',newController.news);

module.exports = router
