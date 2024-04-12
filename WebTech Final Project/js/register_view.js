const container = document.getElementById('container');
const registerBtn = document.getElementById('register');
const loginBtn = document.getElementById('login');

registerBtn.addEventListener('click', () => {
  container.classList.add("active");
});

loginBtn.addEventListener('click', () => {
    container.classList.remove("active");
});

function validateLogin() {
    const email = document.getElementById('email1').value;
    const password = document.getElementById('psw').value;

    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    const passwordRegex = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[^\s]{8,}$/;
  
    if (!emailRegex.test(email)) {
      alert('Please enter a valid email address');
      return false;
    }
  
    if (!passwordRegex.test(password)) {
        alert('Please enter a valid password. Password must contain at least 8 characters');
        return false;
    }
    return true;
  }

function validateRegistration() {
  const firstName = document.getElementById('firstName').value;
  const lastName = document.getElementById('lastName').value;
  const userName = document.getElementById('userName').value;
  const email = document.getElementById('email2').value;
  const phone = document.getElementById('phone').value;
  const password = document.getElementById('pswd').value;
  const confirmPassword = document.getElementById('pswd-repeat').value;
  const gender = document.getElementById('gender').value;
  const dob = document.getElementById('dob').value;

  const nameRegex = /^[a-zA-Z\s]*$/;

  const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

  const phoneRegex = /^\d{10}$/;

  const passwordRegex = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[^\s]{8,}$/;

  const dobRegex = /^(19|20)\d{2}-(0[1-9]|1[0-2])-(0[1-9]|[12]\d|3[01])$/;

  if (!nameRegex.test(firstName) || !nameRegex.test(lastName) || !nameRegex.test(userName)) {
    alert('Please enter a valid name');
    return false;
  }

  if (!emailRegex.test(email)) {
    alert('Please enter a valid email address');
    return false;
  }

  if (!phoneRegex.test(phone)) {
    alert('Please enter a valid 10-digit phone number');
    return false;
  }

  if (!passwordRegex.test(password)) {
    alert('Pleas enter a valid password. Password must contain at least 8 characters');
    return false;
}


  if (password !== confirmPassword) {
    alert('Passwords do not match');
    return false;
  }

  if (gender === '') { 
    alert('Please select your Gender');
    return false;
}

  if (!dobRegex.test(dob)) {
    alert('Please enter a valid date of birth');
    return false;
  }

  const dobDate = new Date(dob);
  const currentDate = new Date();
  if (dobDate >= currentDate) {
      alert('Date of birth should be in the past');
      return false;
  }

  return true;
}