var plan = require('flightplan');

// configuration
plan.target('staging', [
  {
    host: 'shell.gridhost.co.uk',
    username: 'yewtreew1',
    port: 22,
    agent: process.env.SSH_AUTH_SOCK
  },
]);
plan.target('production', [
  {
    host: 'shell.gridhost.co.uk',
    username: 'yewtreew',
    port: 22,
    privateKey: '/Users/Mat/.shh/mat_imac',
    agent: process.env.SSH_AUTH_SOCK
  },
]);

// run commands on localhost
plan.local(function(local) {
  // uncomment these if you need to run a build on your machine first
  // local.log('Run build');
  // local.exec('gulp build');

  local.log('Copy files to remote hosts');
  var filesToCopy = local.exec('git ls-files', {silent: true});
  // rsync files to all the destination's hosts
  if(plan.runtime.target === 'staging'){

    var deploy = 'yewtreeweb-test.uk';
    local.log('Deploying to ' + deploy);
    local.transfer(filesToCopy, '~/public_html/wp-content/themes/DefaultTheme-Sass');

  }
  if(plan.runtime.target === 'production'){

    var deploy = 'yewtreeweb.co.uk';
    local.log('Deploying to ' + deploy);
    local.transfer(filesToCopy, '~/public_html/wp-content/themes/YewTree-ComingSoon');

  }

});
