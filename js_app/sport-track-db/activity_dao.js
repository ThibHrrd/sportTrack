var db = require(__dirname + '/sqlite_connection');


var ActivityDAO = function(){

    this.insert = function(values, callback){

        db.run(`INSERT INTO Activity ("id_activity", "activity_date", "activity_description", "distance", "max_frequency", "min_frequency", "average_frequency", "aUser") VALUES (?,?,?,?,?,?,?,?)`, values[0], values[1], values[2], values[3], values[4], values[5], values[6], values[7], function(err) {
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

    this.deleteAll = function(callback){

        db.run(`DELETE FROM Activity`, function(err) {
            if (err) {
              return console.log(err.message);
            }
            console.log(`Database emptied`);
        });


    };


    this.delete = function(key, callback){

        db.run(`DELETE FROM Activity WHERE id_activity=?`, key, function(err) {
            if (err) {
              return console.log(err.message);
            }
            // get the last insert id
            console.log(`A row has been removed`);
        });

        
    };

    this.findAll = function(callback){

        db.all("SELECT * FROM Activity", callback);
    };

    this.findByKey = function(key, callback){
        db.all("SELECT * FROM Activity where id_activity=?", key, callback);
    };
    
};

var dao = new ActivityDAO();
module.exports = dao;