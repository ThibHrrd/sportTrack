let path = require('path');
let sqlite3 = require('sqlite3').verbose();
let db = new sqlite3.Database(path.resolve(__dirname, '../bdd/sport_track.db'), sqlite3.OPEN_READWRITE, (err)=>{
    if (err) {
        console.log("Database Connection failed " + err.message);
    }
    else {
        console.log("Database Connection Succeeded");
    }
});

console.log(db);

function findAll(callback) {
    db.all("SELECT * FROM User", function(err, rows){

        if (err) {
            console.log(err);
        }
        else {
            callback(rows);
        }

    });
}

router.get('/users', function(req, res, next) {
    findAll(function(rows) {
        res.render('index', {data: rows});
    });
});