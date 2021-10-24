const express = require('express');
const router = express.Router();

const managerController = require('../app/controllers/manageCouser');

router.get('/',managerController.manage);
router.get('/recbin',managerController.manageRecbin);
router.put('/:id/kho',managerController.kho);
router.patch('/:id/restoreDelete',managerController.restore);
router.post('/CouserSelecAction',managerController.CouserSelecAction);
router.post('/RecbinSelecAction',managerController.RecbinSelecAction);
router.delete('/:id/delete',managerController.delete);
router.delete('/:id/recbinDelete',managerController.recbinDelete);
router.get('/:id/update',managerController.update);
module.exports = router;
