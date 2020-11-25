const { Pool, Client } = require('pg')
const pgconnection = new Pool({
  host: '172.16.0.192',
  user: 'iptscanview',
  password: 'iptscanview',
  database: 'cpahdb',
  charset:'utf8',
  port: 5432
});

module.exports = pgconnection;
