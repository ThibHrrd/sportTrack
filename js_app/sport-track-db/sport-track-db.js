var db_connection = require(__dirname+'/sqlite_connection');

var user_dao = require(__dirname + '/user_dao');
var activity_dao = require(__dirname + '/activity_dao');
var activity_entry_dao = require(__dirname + '/activity_entry_dao');
var distance = require(__dirname + '/distance');

module.exports = {db: db_connection, user_dao: user_dao, activity_dao: activity_dao, activity_entry_dao:activity_entry_dao, distance:distance};