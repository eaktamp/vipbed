const router = require('express').Router();
const service = require('../service/patientService')

router.get('/',async(req,res)=>{
    res.json(await service.find());
});

router.post('/getpatientinfomation',async (req,res)=>  {
    //console.log(req.params.id); // get method ดึงค่าจาก url :id
    //console.log(req.body); //  ดึงค่าจากฟอร์มและส่งแบบ post
    const model = await service.findOne( req.body)
    res.json(model);
});


//router.post('/bed',(req,res)=> res.json(req.body));

module.exports = router;