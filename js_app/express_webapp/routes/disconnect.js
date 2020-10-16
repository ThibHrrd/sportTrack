var express = require('express');

var router = express.Router();

router.get('/', function(req, res, next) {

    req.session.loggedin = false;
    req.session.email = null;
    console.log(req.session)
    res.redirect('/connect');
  });

module.exports = router;