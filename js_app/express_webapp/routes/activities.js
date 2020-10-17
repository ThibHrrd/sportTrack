var express = require('express');
var activity_dao = require('sport-track-db').activity_dao;

var router = express.Router();

router.get('/', function(req, res, next) {

    activity_dao.findAll(function(err, rows) {
  
      if(err != null){

        console.log("ERROR= " +err);
      }else if (req.session.loggedin == false || req.session.loggedin == null) {
        res.redirect('/connect')
      }else {
        var tab = Array();
        for (row of rows) {
          if (row.aUser == req.session.email) {
            tab.push({date : row['activity_date'], description : row['activity_description'], distance : row['distance'], min : row['min_frequency'], max : row['max_frequency'], average : row['average_frequency']});
          } 
        }
        res.render('activities',{data : tab});
      }
  
    });
  });

module.exports = router;