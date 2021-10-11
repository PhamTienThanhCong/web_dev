const express = require('express');
const router = express.Router();

const couserController = require('../app/controllers/couserController');

router.post('/kho',couserController.kho);
router.get('/create',couserController.create);
router.get('/:slug',couserController.data);

module.exports = router
