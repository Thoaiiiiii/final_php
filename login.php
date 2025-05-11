<!DOCTYPE html>
<html lang="en">
<title>Tech PC - Login</title>
<?php include "header.php"; ?>

<form method="POST" action="includes/login.inc.php">
  <div class="container">
    <h3 class="grid underline">Login</h3>
    <div class="rounded-card-parent center">
      <div class="card rounded-card">
        <div class="row">
          <div class="input-field col s4 offset-s4">
          <i class="material-icons prefix white-text">account_circle</i>
            <label class="white-text" for="username">Username or Email</label>
            <input type="text" name="username" id="username" class="white-text">
          </div>
        </div>
        <div class="row">
          <div class="input-field col s4 offset-s4">
          <i class="material-icons prefix white-text">password</i>
            <label class="white-text" for="pwd">Password</label>
            <input type="password" name="pwd" id="pwd" class="white-text">
          </div>
        </div>
        <div class="row">
          <button type="submit" name="submit" class="btn" style="margin-left: 10px">Login</button>
          <!-- <button type="button" id="faceid-login" class="btn" style="margin-left: 10px;">Login with FaceID</button> -->
        </div>
        <div class="row">
          <span class="white-text">Not yet a member?</span>
          <a href="signup.php">Sign Up!</a>
          <div class="errormsg">
            <?php
              if (isset($_GET["error"]))
              {
                if ($_GET["error"] == "empty_input")
                  echo "<p>*Fill in all fields!</p>";
                else if ($_GET["error"] == "WrongLogin")
                  echo "<p>*Incorrect credentials!</p>";
                else if ($_GET["error"] == "usernotfound")
                  echo "<p>*User does not exists!</p>";
                else if ($_GET["error"] == "stmtfailed")
                  echo "<p>*SQL ERROR! Try Again Later.</p>";
                else if ($_GET["error"] == "attemptReached")
                  echo "<p>*Too many failed login attempts! Try again after 15 seconds.</p>";
              }
            ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</form>
<!-- login bằng qr thông qua google passkey -->
<!-- <script>
  document.getElementById('faceid-login').addEventListener('click', async() => {
    try {
      // gửi yêu cầu xác thực sinh trắc học
      const credential = await navigator.credentials.get({
        publicKey: {
          challenge: new Uint8Array(32), //chanllenge tu server
          rpId: window.location.hostname, 
          userVerification: 'required',
        } 
      });
      // gửi dữ liệu đến server
      const response = await fetch('includes/faceid-login.inc.php', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json'
        },
        body: JSON.stringify({ credential })
      });

      const result = await response.json();
      if(result.success) {
        // nếu xác thực thành công, chuyển hướng đến trang chính
        window.location.href = 'index.php';
      } else {
        // nếu xác thực thất bại, hiển thị thông báo lỗi
        alert('FaceID login failed' + result.message);
      }
    } catch (error) {
      console.error('FaceID login error:', error);
      alert('FaceID login failed. Please try again.');
    }
  });
</script> -->
<?php include "footer.php"; ?>
</html>
