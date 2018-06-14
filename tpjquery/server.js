 /******************************************\
    CREATE APPLICATION EXPRESSE AND DEP
 \******************************************/
let express = require('express');

let app = express();

let bodyParser = require('body-parser');

let Singleton = require('./controllers/Singleton');

 /******************************************\
         PARAMS EXPRESSE
 \******************************************/
app.set('view engine','ejs');

 /******************************************\
             MIDDLEWARE
 \******************************************/

app.use('/asset',express.static('public'));

app.use(bodyParser.urlencoded({extended:false}));

app.use(bodyParser.json());

 /******************************************\
         SINGLE PAGE OF APPLICATION
 \******************************************/

app.get('/',Singleton.index);

 /******************************************\
            CONTROLLER ETUDIANT
 \******************************************/

app.get('/etudiant/create',Singleton.createEtudiant);

app.get('/etudiant/update',Singleton.updateEdutiant);

app.get('/etudiant/delete',Singleton.deleteEdutiant);

app.get('/etudiant/gets',Singleton.getsEdutiant);

app.get('/etudiant/show',Singleton.showEdutiant);

app.get('/etudiant/getmat',Singleton.getMatEdutiant);

app.get('/etudiant/search',Singleton.searchtEdutiant);

app.get('/etudiant/infiny',Singleton.infinyEdutiant);

 /******************************************\
             CONTROLLER NOTE
 \******************************************/

 app.get('/note/create',Singleton.createNote);

 app.get('/note/shownoteetu',Singleton.showNoteEtudiant);

 app.get('/note/updateSelect',Singleton.updateSelectNote);

 /******************************************\
             SERVER START ON PORT 80
 \******************************************/

app.listen(88);

