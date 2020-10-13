var db = require(__dirname + '/sqlite_connection');


var ActivityEntryDAO = function(){

    this.insert = function(values, callback){

        db.run(`INSERT INTO Data_activity ("id_data", "data_time", "cardio_frequency", "latitude", "longitude", "altitude", "anActivity") VALUES (?,?,?,?,?,?,?)`, values[0], values[1], values[2], values[3], values[4], values[5], values[6], function(err) {
            if (err) {
              return console.log(err.message);
            }
            // get the last insert id
            console.log(`A row has been inserted with rowID ${this.lastID}`);
        });
        
    };

    this.deleteAll = function(callback){

        db.run(`DELETE FROM Data_Activity`, function(err) {
            if (err) {
              return console.log(err.message);
            }
            console.log(`Database emptied`);
        });


    };

    this.update = function(key, values, callback){
        
        this.delete(key,callback);
        this.insert(values, callback);

    };


    this.delete = function(key, callback){

        db.run(`DELETE FROM Data_activity WHERE id_data=?`, key, function(err) {
            if (err) {
              return console.log(err.message);
            }
            // get the last insert id
            console.log(`A row has been removed`);
        });

        
    };

    this.findAll = function(callback){

        db.all("SELECT * FROM Data_activity", callback);
    };

    this.findByKey = function(key, callback){
        db.all("SELECT * FROM Data_activity where id_data=?", key, callback);
    };
    
};

var dao = new ActivityEntryDAO();
module.exports = dao;