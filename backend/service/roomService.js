const connection = require('../config/database');

module.exports = {
    find() {
        return new Promise((resolve,reject)=>{
            connection.query(`SELECT w.ward,w.name as wardname,COUNT(*) as total
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

    findOne(id) {
        return new Promise((resolve,reject)=>{
            connection.query(`SELECT hn,pname,fname,lname FROM patient where hn =`+id,(error,result)=>{
                if(error) return reject(error)
                const value = result.rows[0];
                resolve(value)
            });
        });
    }

}