let sqlite3 = require('sqlite3').verbose();
let db = new sqlite3.Database(__dirname+'/./sport_track.db', sqlite3.OPEN_READWRITE, (err)=>{
    if (err) {
        console.log("Database Connection failed :" + err.message);
    }
    else {
        console.log("Database Connection Succeeded");
    }
});

module.exports = db;