const router = require('express').Router();
const { check, oneOf, validationResult } = require('express-validator');
const service = require('../service/roomService')



router.get('/', async (req, res) => {
    res.json(await service.findWard());
});

router.get('/wardbed:wardid', async (req, res) => {
    //res.json(req.params.wardid);
    //res.json(await service.findBed());
    res.json(await service.findbedOneward(req.params.wardid));
});



// ทดสอบ Insert data โดยเพิ่มลง ฐาน Mysql
router.post('/test', [
    check('username', 'กรุณากรอกข้อมูล').not().isEmpty()],
 async (req, res) => {
     try{
      validationResult(req).throw();
     const created = await service.onCreate(req.body);
     res.json(created);
    } catch (err) {
        res.status(400).json(err);
    }
});



module.exports = router;