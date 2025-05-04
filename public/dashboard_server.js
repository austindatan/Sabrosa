const mysql = require('mysql');

const connection = mysql.createConnection({
    host: 'localhost', // or your database host
    user: 'yourUsername', // replace with your MySQL username
    password: 'yourPassword', // replace with your MySQL password
    database: 'sabrosa' // change to 'sabrosa'
});

connection.connect((err) => {
    if (err) throw err;
    console.log('Connected to sabrosa database!');
});
    