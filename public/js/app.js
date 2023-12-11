const signUpButton = document.getElementById('signUp');
const signInButton = document.getElementById('signIn');
const containerLogin = document.getElementById('container-login');

signUpButton.addEventListener('click', () => {
	containerLogin.classList.add("right-panel-active");
});

signInButton.addEventListener('click', () => {
	containerLogin.classList.remove("right-panel-active");
});

function togglePassword(formType) {
	var passwordInput = document.getElementById('password' + formType);
	var showPasswordCheckbox = document.getElementById('showPassword' + formType);

	if (showPasswordCheckbox.checked) {
			passwordInput.type = 'text';
	} else {
			passwordInput.type = 'password';
	}
}