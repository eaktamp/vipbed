const express = require('express');
const server = express();
const bodyParser = require('body-parser');
const { check, validationResult } = require('express-validator');

const PORT = "3000";
const routes = require('./routes/index');

//ปกป้อง HTTP HEADER ด้วย Helmet
var helmet = require('helmet')
server.use(helmet())


server.use(bodyParser.urlencoded({extended:false}));
server.use(bodyParser.json());


server.use('/api',routes);

server.get('*', function (req, res) {
  res.send('<H1>Server Is started </H1>')
})
 
server.listen(PORT,() => console.log(`Server start on ${PORT}.`));