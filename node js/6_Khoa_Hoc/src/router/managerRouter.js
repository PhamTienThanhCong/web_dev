const express = require('express');
const router = express.Router();

const managerController = require('../app/controllers/manageCouser');

router.get('/',managerController.manage);
router.put('/:id/kho',managerController.kho);
router.delete('/:id/delete',managerController.delete);
router.get('/:id/update',managerController.update);
module.exports = router;
