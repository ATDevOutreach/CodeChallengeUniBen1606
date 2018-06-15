var _ = require('lodash')

// import environmental variables from our variables.env file
require('dotenv').config({ path: 'variables.env' });

//= ==================== APP CONSTANTS
const message = 'I am a fisherman. I sleep all day and work all night!'
// Your login credentials
const shortCode = '41919'
const username = 'sandbox'
const apikey = process.env.KEY;
const options = {
  apiKey: apikey,
  username: username
}
const AfricasTalking = require('africastalking')(options)
const sms = AfricasTalking.SMS

exports.received = (req, res) => {
    //select needed properties from post object
  var body = _.pick(req.body, ['from', 'to'])

  //Respond to message if from appropriate shortcode
  if (body.to == '41919') {
    sendResponse(body.from, message)
  } else {
    console.log('No be the correct guy you send give')
  }
}

function sendResponse (recipient, message) {
  var opts = {
    from: shortCode,
    to: recipient,
    message: message
  }
  sms.send(opts).then(
    console.log('Message sent successfully')
  ).catch(
      console.log('Something went wrong with message sending')
    );
}
