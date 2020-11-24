const router = require('express').Router();
const service = require('../service/patientService')

router.get('/',async(req,res)=>{
    res.json(await service.find());
});

router.get('/:id',async (req,res)=>  {
    //console.log(req.params.id);
    const model = await service.findOne({ id:req.params.id })
    res.json(model);
});


//router.post('/bed',(req,res)=> res.json(req.body));

module.exports = router;