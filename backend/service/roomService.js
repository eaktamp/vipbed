const pgconnection = require('../config/database');
const myconnection = require('../config/mycon');

module.exports = {
    findWard() {
        return new Promise((resolve,reject)=>{
            pgconnection.query(`SELECT w.ward,w.name as wardname,COUNT(*) as total
            FROM bedno as b
            INNER JOIN roomno AS r ON b.roomno = r.roomno
            INNER JOIN ward AS w ON w.ward = r.ward
            INNER JOIN roomtype AS t ON t.roomtype = r.roomtype
            LEFT JOIN room_status_type AS s ON s.room_status_type_id = r.room_status_type_id
            WHERE 1 = 1 
            AND t.roomtype = '2' 
            AND b.bedtype = '2'
            GROUP BY w.ward,wardname `,(error,result)=>{
                if(error) return reject(error)
              
                resolve(result.rows)
            });
        });
    },

    findbedOneward(wardid) {
        return new Promise((resolve,reject)=>{
            //console.log(wardid)
            resolve(wardid)
            // pgconnection.query(`SELECT b.*,n.icode,n.name AS ward_vip,w.ward,w.name as nameward
            // FROM bedno as b
            // INNER JOIN roomno AS r ON b.roomno = r.roomno
            // INNER JOIN ward AS w ON w.ward = r.ward
            // INNER JOIN roomtype AS t ON t.roomtype = r.roomtype
            // LEFT JOIN room_status_type AS s ON s.room_status_type_id = r.room_status_type_id
            // LEFT JOIN nondrugitems AS n ON n.icode = b.room_charge_icode
            // WHERE 1 = 1 
            // AND w.ward = ?
            // AND t.roomtype = '2' 
            // AND b.bedtype = '2'
            // ORDER BY bedno ASC `,wardid,(error,result)=>{
            //     if(error) return reject(error)
            //     resolve(result.rows)
            // });
        });

    },


    onCreate(value) {
        return new Promise((resolve, reject) => {
            //resolve(value);
            const bkmodel = {
                user_name: value.username,
                user_id: value.user_id,
                sql_aws: value.sql_aws,
                start_time: new Date(value.start_time),
            }
            //resolve (bkmodel);
            myconnection.query('INSERT INTO test_sql SET ?', bkmodel, (err, result) => {
                if (err) return reject(err);
                resolve(result);
            })
        })
    }

}