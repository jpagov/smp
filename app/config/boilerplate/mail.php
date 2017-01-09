<?php

return array(

  'driver' => 'smtp',
  'host' => 'postmaster.1govuc.gov.my',
  'port' => 25,
  'from' => array(
    'address' => 'portalteam@jpa.gov.my',
    'name' => 'SMP'
    ),
  'encryption' => 'tls',
  'username' => null,
  'password' => null,
  'sendmail' => '/usr/sbin/sendmail -bs',
  'pretend' => false,

);
