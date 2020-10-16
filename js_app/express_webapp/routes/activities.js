var express = require('express');
var user_dao = require('sport-track-db').user_dao;

var router = express.Router();

router.get('/', function(req, res, next) {

    user_dao.findAll(function(err, rows) {
  
      if(err != null){
        console.log("ERROR= " +err);
      //}else if (req.session.loggedin == true) {
        //res.redirect('/connect')
      }else {
        res.render('activities', {data:rows});
      }
  
    });
  });

module.exports = router;