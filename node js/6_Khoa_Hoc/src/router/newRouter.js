const express = require('express');
const router = express.Router();

const newController = require('../app/controllers/newController');

router.get('/data',newController.data);
router.get('/news',newController.news);
router.get('/:slug',newController.home);

module.exports = router
