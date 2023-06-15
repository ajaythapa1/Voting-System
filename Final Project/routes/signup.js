function clearErrors() {
  var errors = document.getElementsByClassName('formError');
  for (var item of errors) {
    item.innerHTML = '';
  }
}

function seterror(id, error) {
  // Set error inside tag of id
  var element = document.getElementById(id);
  element.getElementsByClassName('formError')[0].innerHTML = error;
}

function validateForm() {
  var returnval = true;
  clearErrors();

  // Perform validations one by one
  var validations = [
    {
      field: 'name',
      validate: function() {
        var name = document.forms['myForm']['name'].value;
        if (name.length < 4) {
          seterror('name', '*Length of name is too short');
          return false;
        }
        return true;
      }
    },
    {
      field: 'email',
      validate: function() {
        var email = document.forms['myForm']['email'].value;
        if (email.length > 20) {
          seterror('email', '*Email length is too long');
          return false;
        }
        
        const regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!regex.test(email)) {
          seterror('email', '*Invalid email address');
          return false;
        }
        
        return true;
      }
    },
    {
      field: 'mobile',
      validate: function() {
        var mobile = document.forms['myForm']['mobile'].value;
        if (mobile.length !== 10) {
          seterror('mobile', '*Phone number should be 10 digits!');
          return false;
        }
        return true;
      }
    },
    {
      field: 'password',
      validate: function() {
        var password = document.forms['myForm']['password'].value;
        if (password.length < 6) {
          seterror('password', '*Password should be at least 6 characters long!');
          return false;
        }

        // Password complexity validation
        const regex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]+$/;
        if (!regex.test(password)) {
          seterror('password', '*Password must contain at least one uppercase letter, one lowercase letter, one digit, and one special character');
          return false;
        }

        return true;
      }
    },
    {
      field: 'cpassword',
      validate: function() {
        var password = document.forms['myForm']['password'].value;
        var cpassword = document.forms['myForm']['cpassword'].value;
        if (cpassword !== password) {
          seterror('cpassword', '*Password and Confirm password should match!');
          return false;
        }
        return true;
      }
    }
  ];



  // Iterate over each validation and execute it
  for (var i = 0; i < validations.length; i++) {
    var validation = validations[i];
    if (!validation.validate() && document.forms['myForm'][validation.field].value !== '') {
      console.log('Validation failed for field:', validation.field);
      return; // Exit the validateForm function if any validation fails
    }
  }

  // All validations passed, you can proceed with form submission or other actions
  document.forms['myForm'].submit(); // Submit the form
}

// Add event listener to the form submission event
document.forms['myForm'].addEventListener('submit', function(event) {
  event.preventDefault(); // Prevent the form from submitting
  validateForm(); // Call the validateForm function
});
