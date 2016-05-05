var save=function (city,jsonObj) {
    var Db = require('mongodb').Db;
    var Server = require('mongodb').Server;

    var db = new Db('test',new Server('localhost',27017))

    db.open((err,db)=>{
        var coll = db.collection(city);
        coll.save(jsonObj,(err,r)=>{
            if(!err){
               console.log('save to '+city); 
            }
            
            db.close();
        });
        
    });
};

var removeAll = function (city,callback) {
    var Db = require('mongodb').Db;
    var Server = require('mongodb').Server;

    var db = new Db('test',new Server('localhost',27017))

    db.open((err,db)=>{
        var coll = db.collection(city);
        coll.remove((err,numOfRows)=>{
            if(!err){
                console.log(`${city} collection be removed. ${numOfRows}`);
            }
            db.close();
            callback(err);
        });
      
    });
};

var readAll=function (city,callback) {
    var Db = require('mongodb').Db;
    var Server = require('mongodb').Server;

    var db = new Db('test',new Server('localhost',27017))

    db.open((err,db)=>{
        var coll = db.collection(city);
        var cursor = coll.find();
        cursor.toArray((err,results)=>{
            if(!err){
                callback(results);
                //db.close();        
            }
            db.close();
        });
    });
}

exports.save = save;
exports.removeAll = removeAll;
exports.readAll = readAll;
 

