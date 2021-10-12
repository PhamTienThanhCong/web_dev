const express = require('express');
const router = express.Router();

const managerController = require('../app/controllers/manageCouser');

router.get('/',managerController.manage);
router.post('/:id/kho',managerController.kho);
router.get('/:id/update',managerController.update);
module.exports = router
