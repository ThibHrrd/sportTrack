const { response } = require('express');
var express = require('express');

var router = express.Router();
var user_dao = require('sport-track-db').user_dao;


router.get('/', function(req, res, next) {

  user_dao.findAll(function(err, rows) {

    if(err != null){
      console.log("ERROR= " +err);
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

  console.log("Before");

  user_dao.findByKey(email,(error, rows) => {

    console.log(rows);

          
    if (rows[0].password === password) {
      request.session.loggedin = false;
			request.session.email = null;
      request.session.loggedin = true;
      request.session.email = email;
      redirect = true;
      response.redirect("/activities"); 

    }


  });

  if (redirect == false) {
    response.redirect('/connect');
  }
});

module.exports = router;