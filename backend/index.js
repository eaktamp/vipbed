const express = require('express');
const server = express();
const PORT = "3000";
const bodyParser = require('body-parser');
const routes = require('./routes/index');


server.use(bodyParser.urlencoded({extended:false}));
server.use(bodyParser.json());

server.use('/api',routes);

server.get('*', function (req, res) {
  res.send('<H1>Server Is started </H1>')
})
 
server.listen(PORT,() => console.log(`Server start on ${PORT}.`));