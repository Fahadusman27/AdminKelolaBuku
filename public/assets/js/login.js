const togglePassword = document.querySelector('#togglePassword');
  const passwordInput = document.querySelector('#passwordInput');

  togglePassword.addEventListener('click', function () {
    const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
    passwordInput.setAttribute('type', type);
    
    // Gunakan innerHTML untuk merender tag HTML
    if (type === 'password') {
      this.innerHTML = '<i class="ti-eye"></i>'; // Icon saat disembunyikan
    } else {
      // Mengubah warna icon menjadi biru (text-primary) saat password terlihat
      // atau Anda bisa ganti classnya ke icon lain seperti '<i class="ti-close"></i>'
      this.innerHTML = '<i class="ti-eye text-primary"></i>'; 
    }
  });


const PasswordConfirm = document.querySelector('#PasswordConfirm');
  const passwordConfirm = document.querySelector('#passwordConfirm');

  PasswordConfirm.addEventListener('click', function () {
    const type = passwordConfirm.getAttribute('type') === 'password' ? 'text' : 'password';
    passwordConfirm.setAttribute('type', type);
    
    // Gunakan innerHTML untuk merender tag HTML
    if (type === 'password') {
      this.innerHTML = '<i class="ti-eye"></i>'; // Icon saat disembunyikan
    } else {
      // Mengubah warna icon menjadi biru (text-primary) saat password terlihat
      // atau Anda bisa ganti classnya ke icon lain seperti '<i class="ti-close"></i>'
      this.innerHTML = '<i class="ti-eye text-primary"></i>'; 
    }
  });