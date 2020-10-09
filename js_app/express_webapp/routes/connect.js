var express = require('express');

var router = express.Router();
var user_dao = require('sport-track-db').user_dao;


router.get('/', function(req, res, next) {

  user_dao.findAll(function(err, rows) {

    if(err != null){
      console.log("ERROR= " +err);
    }else {
      res.render('connect', {data:rows});
    }

  });
});

router.post('/', function(request, response){

  var email = request.email;
  var password = request.password;

  user_dao.findByKey((email,error, rows) => {

    var valid = false;

    for (row of rows) {

      if (row.password === password) {

        valid = true;

      }
    }

    

  });

});

module.exports = router;