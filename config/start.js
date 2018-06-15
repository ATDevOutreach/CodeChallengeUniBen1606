const mongoose = require('mongoose');

// // import environmental variables from our variables.env file
// require('dotenv').config({ path: 'variables.env' });

// // Connect to our Database and handle any bad connections
// mongoose.connect(process.env.DATABASE).then(()=>{
//   console.log('connection to DB successful')
// }).catch(err=>{
//   console.error(`Error connecting to DB→ ${err.message}`)
// });
// mongoose.Promise = global.Promise; 

// mongoose.connection.on('error', (err) => {
//   console.error(`Error connecting to DB→ ${err.message}`);
// });


// Start our app!
const app = require('../app');
app.set('port', process.env.PORT || 7777);
const server = app.listen(app.get('port'), () => {
  console.log(`Express running → PORT ${server.address().port}`);
});

// process.on('SIGINT', () => { console.log("Bye bye!"); process.exit(); });

