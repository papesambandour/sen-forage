 /******************************************\
           DEPS
 \******************************************/

let bodyParser = require('body-parser');

let url =  require('url');

let Config = require('../models/Config');

let Etudiant = require('../models/Etudiant');

let Note = require('../models/Note');

  /******************************************\
       CLASS PERSISTANCE SINGLETON
  \******************************************/
class _Singleton {
    static index(request,response){
        Etudiant.getsMore(10,0,function (result) {

            response.locals.etudiants =result;
            response.render('page/home') ;
        });
    }

    static createEtudiant(request,response)
    {
        let query = url.parse(request.url,true).query;//le true done le query en objet
        let etudiant = new Etudiant(query.matE,query.prenomE,query.nomE,query.classE);
        Etudiant.create(etudiant,function (res) {
            let lastInsertId = res.insertId ;
            let lastmat;
            Config.get('MAT',function (rest) {
                lastmat= parseInt(rest) + 1;
                Config.set('MAT',lastmat,function (rest) {
                    response.send(lastInsertId+"");
                })
            })
        });
    }
    static updateEdutiant(request,response)
    {
        let query = url.parse(request.url,true).query;//le true done le query en objet
        let etudiant = new Etudiant(query.mateEtu,query.prenomE,query.nomE,query.classE,query.idE);
        Etudiant.update(etudiant,function (res) {
            response.send(1+"");
        });
    }
    static deleteEdutiant(request,response)
    {
        let query = url.parse(request.url,true).query;
        let etudiant = new Etudiant();
        etudiant.id =query.idE;
        Etudiant.delete(etudiant,function (res) {
            response.send("1");
        });
    }
    static getsEdutiant(request,response)
    {
        Etudiant.gets(function (res) {
            response.send(JSON.stringify(res));
        })
    }
    static showEdutiant(request,response)
    {
        let query = url.parse(request.url,true).query;
        Etudiant.show(query.idE,function (res) {
            response.send(JSON.stringify(res));
        })
    }
    static getMatEdutiant(request,response)
    {
        Config.get('MAT',function (res) {
            let resParsed = parseInt(res);
            resParsed++;
            response.send( resParsed +'');
        })
    }
    static searchtEdutiant(request,response)
    {
        let query = url.parse(request.url,true).query;
        Etudiant.getsSearch(100,0,query.item,function (res) {
            response.send(JSON.stringify(res));
        })
    }
    static infinyEdutiant(request,response)
    {
        let query = url.parse(request.url,true).query;
        let myoffset = (query.myoffset ===undefined || query.myoffset ===null || query.myoffset ==='') ? 0 : query.myoffset;
        let mylimit = (query.mylimit ===undefined || query.mylimit ===null || query.mylimit ==='') ? 0 : query.mylimit;
        Etudiant.getsMore(mylimit,myoffset,function (res) {
            let send = {};
            send.data = res;
            send.more =  res.length > 0;
            response.send(JSON.stringify(send));
        })
    }
    static createNote(request,response)
    {
        let query = url.parse(request.url,true).query;//le true done le query en objet
        let note = new Note(query.valeur,query.semestre,query.annee,query.matier,query.idE);
        Note.create(note,function (res) {
            response.send(1+"");
        });
    }
    static showNoteEtudiant(request,response)
    {
        let query = url.parse(request.url,true).query;//le true done le query en objet
        Note.getNoteByidEt(query.idEt,function (res) {
            response.send(JSON.stringify(res));
        });
    }
    static updateSelectNote(request,response)
    {
        let query = url.parse(request.url,true).query;//le true done le query en objet
        Note.updateSelecte(query.idNote,query.itemValue,query.item,function (res) {
            response.send("1");
        });
    }
}


module.exports = _Singleton ;