const mysql = require('mysql');

const connection = mysql.createConnection({
    host: 'localhost', 
    user: 'yourUsername', 
    password: 'yourPassword', 
    database: 'sabrosa'
});

connection.connect((err) => {
    if (err) throw err;
    console.log('Connected to sabrosa database!');
});
    