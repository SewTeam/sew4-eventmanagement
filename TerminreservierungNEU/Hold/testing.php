<?php
require_once('simpletest/autorun.php');
require_once('sessions.php');

class Testof_basics extends UnitTestCase {
  function Testof_validate_email() {
    $this->assertTrue(validate_email('a@b.com'));
    $this->assertFalse(validate_email('a.b.com'));
  }

  function Testof_validate_password() {
    $this->assertTrue(validate_password('pwd','pwd'));
    $this->assertFalse(validate_email('pwd', 'PWD'));
  }

  function Testof_hash_password() {
    //Trying to hash a password
    $this->assertEqual(hash_password('pwd'), '$2y$10$.T6yZ0dfBOwAcuY1FLa5CuF061cSl5/mH.jehVm0zVF.DVqNWSD8y');
  }
}

class Testof_Usermanagement extends UnitTestCase {
  function Testof_register() {
    //Trying to register with incorrect email adress
    $this->assertFalse(register('test.test.com', 'pwd', 'pwd'));
    //Trying to register a user with none matching passwords
    $this->assertFalse(register('test.test.com', 'pwd', 'PWD'));
    //Registering User
    $this->assertTrue(register('test@test.com', 'pwd', 'pwd'));
    //Trying to register the same email once again
    $this->assertFalse(register('test@test.com', 'pwd', 'pwd'));

  }

  function Testof_login() {
    //trying to log in with wrong credentials
    $this->assertFalse(login('nonexistent@user.com', 'pwd'));
    //Trying to log in with testuser
    $this->assertTrue(login('test@test.com', 'pwd'));
    //testing if user is logged in
    $this->assertTrue(checkfor_status());
  }

  function Testof_logout() {
    //trying to log out
    $this->assertTrue(logout());
    //testing if user is still logged in
    $this->assertFalse(checkfor_status());
  }

  function Testof_check_email() {
    //Testing if email exists
    $this->assertTrue(check_email('test@test.com'));
    //Testing if email exists
    $this->assertFalse(check_email('nonexistent@user.com'))
  }
}
?>
