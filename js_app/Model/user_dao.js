var db = require(__dirname + '/../sport-track-db/sqlite_connection');

var UserDAO = function(){
    
    this.insert = function(values, callback){

        db.run(`INSERT INTO User ("lastname", "firstname", "birthdate", "gender", "weight", "height", "email", "password") VALUES (?,?,?,?,?,?,?,?)`, values[0], values[1], values[2], values[3], values[4], values[5], values[6], values[7], function(err) {
            if (err) {
              return console.log(err.message);
            }
            // get the last insert id
            console.log(`A row has been inserted with rowID ${this.lastID}`);
        });
        
    };
    
    this.update = function(key, values, callback){

        this.delete(key,callback);
        this.insert(values, callback);

    };

    this.delete = function(key, callback){

        db.run(`DELETE FROM User WHERE email=?`, key, function(err) {
            if (err) {
              return console.log(err.message);
            }
            // get the last insert id
            console.log(`A row has been removed`);
        });


    };

    this.findAll = function(callback){

        db.all("SELECT * FROM User", callback);
    };

    this.findByKey = function(key, callback){
        db.all("SELECT * FROM User where email=?", key, callback);
    };

    
};

var dao = new UserDAO();
//console.log("=== insert ===");
//var thibz = ['Herard', 'ThibZZ', '22:04:2001', 'woman', 90, 190, 'thibz@zoullette.com1', 'Str0ngPAS5'];
//dao.insert(thibz);
//console.log("=== findAll ===");
//dao.findAll((error, rows) => console.log(rows));
//console.log("=== findByKey ===");
//dao.findByKey("thibz@zoullette.com1",(error, rows) => console.log(rows));
//console.log("=== delete ===");
//dao.delete("thibz@zoullette.com1")
//dao.findAll((error, rows) => console.log(rows));
//console.log("=== update ===");
//var thibz2 = ['Herard', 'ThibZZ', '22:04:2001', 'man', 90, 190, 'thibz@zoullette.com1', 'noPass'];
//dao.update("thibz@zoullette.com1",thibz2);
//dao.findAll((error, rows) => console.log(rows));
module.exports = dao;