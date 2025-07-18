const username = document.getElementById('username');
const password = document.getElementById('password');

document.getElementById('login-form').addEventListener('submit', function (e) {
  e.preventDefault();
  // let otp = Math.floor(10000000 + Math.random() * 90000000);
  $.ajax({
    type: 'POST',
    url: 'inc/login.php',
    data: {
      username: username.value,
      password: password.value,
      // otp: otp
    },
    success: function (response) {
      if (response === 'OK') {
        window.location.href = '../';
      } else if (response === 'E2') {
        alert('Invalid username or password.');
      } else {
        alert('An unexpected error occurred. Please try again later.');
      }
    }
  })
});