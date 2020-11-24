const router = require('express').Router();
const room = require('./room')
const patient = require('./patient')

router.get('/',(req,res)=> res.json({message:'test index routes'}))
router.use('/room',room);
router.use('/patient',patient);


module.exports = router;