//DECLARATION
let express = require('express');
let app = express();
let mysql = require('mysql');
let cron = require('node-cron');
let moment = require('moment');
let connexion =mysql.createConnection({
    host: 'localhost',
    user: 'root',
    password: '',
    database : 'gestionforage'
});
connexion.connect();


cron.schedule('0 0 0 5 * *', function(){
    let year = moment().subtract(1, 'months').format('YYYY');
    let month = moment().subtract(1, 'months').format('MM');
    connexion.query('UPDATE facture f join compteur c ON f.compteur_id = c.idcompteur SET f.payeenretart = 1 , c.estcoupe = 1 WHERE f.annee ='+year+' AND f.mois ='+month+' AND f.payee = 0',function (err,result) {
        if(err)
        {
            throw err ;
        }
        console.log("success coupure")
    });
});


//app.listen(80);

