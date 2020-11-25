var mysql = require('mysql');
const myconnection  = mysql.createConnection({
  host            : '172.16.0.21',
  user            : 'root',
  password        : 'Cpa@10665',
  database        : 'cpadb',
  port: 3306,
  charset:'utf8'
});



module.exports = myconnection;