var db = require(__dirname + '/sqlite_connection');

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

    this.deleteAll = function(callback){

        db.run(`DELETE FROM User`, function(err) {
            if (err) {
              return console.log(err.message);
            }
            console.log(`Database emptied`);
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
module.exports = dao;