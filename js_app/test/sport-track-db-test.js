var uDAO = require(__dirname+'/../sport-track-db').user_dao;
var aDAO = require(__dirname+'/../sport-track-db').activity_dao;
var eDAO = require(__dirname+'/../sport-track-db').entry_dao;

var db = require(__dirname+'/../sport-track-db').db_connection;



//uDAO.deleteAll();

//console.log("=== INSERT ===");
//var thibz = ['Herard', 'ThibZZ', '22:04:2001', 'woman', 90, 190, 'thibz@zoullette.com1', 'Str0ngPAS5'];
//uDAO.insert(thibz);

//console.log("=== findAll ===");
//uDAO.findAll((error, rows) => console.log(rows));

//console.log("=== findByKey ===");
//uDAO.findByKey("thibz@zoullette.com1",(error, rows) => console.log(rows));

//console.log("=== delete ===");
//uDAO.delete("thibz@zoullette.com1")

//console.log("=== update ===");
//var thibz2 = ['Herard', 'ThibZZ', '22:04:2001', 'man', 90, 190, 'thibz@zoullette.com1', 'noPass'];
//uDAO.update("thibz@zoullette.com1",thibz2);

//uDAO.findAll((error, rows) => console.log(rows));

//                  TEST DE ACTIVITY

//aDAO.deleteAll();

//console.log("=== INSERT ===");
//var act1 = ['0001', '22:04:2001', 'IUT -> RU', 'thibz@zoullette.com1'];
//aDAO.insert(act1);

//console.log("=== findAll ===");
//aDAO.findAll((error, rows) => console.log(rows));

//console.log("=== findByKey ===");
//aDAO.findByKey("0001",(error, rows) => console.log(rows));

//console.log("=== delete ===");
//aDAO.delete("0001")

//console.log("=== update ===");
//var act2 = ['0002', '22:04:2001', 'IUT -> Paris', 'thibz@zoullette.com1'];
//aDAO.update("thibz@zoullette.com1",act2);

//aDAO.findAll((error, rows) => console.log(rows));



//                  TEST DE ENTRY

//eDAO.deleteAll();

//console.log("=== INSERT ===");
//var ent1 = ['0001', '01:23:25', '70', '47.644795', '-2.776605', '18', '0001'];
//eDAO.insert(ent1);

//console.log("=== findAll ===");
//eDAO.findAll((error, rows) => console.log(rows));

//console.log("=== findByKey ===");
//eDAO.findByKey("0002",(error, rows) => console.log(rows));

//console.log("=== delete ===");
//eDAO.delete("0001")

//console.log("=== update ===");
//var ent2 = ['0002', '01:23:25', '200', '47.644795', '-2.776605', '18', '0001'];
//eDAO.update("0001",ent2);

//eDAO.findAll((error, rows) => console.log(rows));


