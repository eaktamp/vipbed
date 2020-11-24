const router = require('express').Router();
const service = require('../service/roomService')

router.get('/',async(req,res)=>{
    res.json(await service.find());
});

router.post('/:id',async (req,res)=>  {
    res.json(await service.findOne());
});


//router.post('/bed',(req,res)=> res.json(req.body));

module.exports = router;