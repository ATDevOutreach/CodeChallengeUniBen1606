var express = require('express');

var router = express.Router();
var sms = require('../controllers/smsController')


/* POST users listing. */
router.post('/', sms.received);

module.exports = router;
