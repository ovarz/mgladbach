<?php
  ini_set('session.gc_maxlifetime', 3600);
  ini_set('session.cookie_lifetime', 3600);
  session_set_cookie_params(3600);
  session_start();
?>