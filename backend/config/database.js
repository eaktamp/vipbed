// const pgcon = require('pg')

// const connection =  pgcon.createPool({
//   host: '172.16.0.192',
//   user: 'iptscanview',
//   password: 'iptscanview',
//   database: 'cpahdb',
//   charset:'utf8',
//   port: 5432
// })

// connection.getConnection((err,connect)=> console.log(err));

// module.exports = connection;

const { Pool, Client } = require('pg')
const connection = new Pool({
  host: '172.16.0.192',
  user: 'iptscanview',
  password: 'iptscanview',
  database: 'cpahdb',
  charset:'utf8',
  port: 5432
})

// pool.query('SELECT hn,cid,fname,lname from patient limit 3', (err, res) => {
//   console.log(err, res.rows[0])
//   pool.end()
// })


module.exports = connection;