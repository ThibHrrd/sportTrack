const { response } = require('express');
var express = require('express');

var router = express.Router();
var user_dao = require('sport-track-db').user_dao;


router.get('/', function(req, res, next) {

  user_dao.findAll(function(err, rows) {

    if(err != null){
      console.log("ERROR= " + err);
    }else if (req.session.loggedin == true) {
      res.redirect('/activities')
    }else {
      res.render('connect', {data:rows});
    }

  });
});

router.post('/', function(request, response){

  var email = request.body.email;
  var password = request.body.password;
  var redirect = false;

  
  user_dao.findByKey(email,function(err, row){

    if(row.length == 0){

      response.redirect("/users");

    }else{

      if (row[0].password == password) {
        request.session.loggedin = true;
        request.session.email = email;
        response.redirect("/activities");
        
      }else{

        response.redirect("/connect");

      }
    }
  });
});

module.exports = router;