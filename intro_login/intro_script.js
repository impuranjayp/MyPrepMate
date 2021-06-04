
function Animator(){
	var modalLogin = document.querySelector('.button');
	var modalReg = document.querySelector('.button-2');

	var modalBg1 = document.querySelector('.modal-bg');
	var modalBg2 = document.querySelector('.modal-bg-2')

	var modalClose = document.querySelector('.modal-close');
	var modalClose2 = document.querySelector('.modal-2-close');

	modalLogin.addEventListener('click', function(){
		modalBg1.classList.add('bg-active');
	});
	
	modalReg.addEventListener('click', function() {
		modalBg2.classList.add('bg-active');
	});
	
	modalClose.addEventListener('click', function(){
		modalBg1.classList.remove('bg-active');
	});
	
	modalClose2.addEventListener('click', function(){
		modalBg2.classList.remove('bg-active');
	});

};

function ValidateEmail(inputText)
{
	var mailformat =/^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
	if(inputText.value.match(mailformat))
	{}
	else
	{
		return alert("You have entered an invalid email address!");
	}
};

function ValidatePhone(inputText1)
{
 	var phoneformat = /[0-9]/;
	if(inputText1.value.match(phoneformat))
	{}
	else
	{
  		return alert("You have entered an invalid Phone Number");
	}
};

function CheckStrength(password_input){
	var pwd = password_input.value;
	//console.log(pwd)
	var match = new Array();      // Check progress
	match.push("[A-Z]");      // Uppercase
	match.push("[a-z]");      // Lowercase
	match.push("[0-9]");      // Numbers
	match.push("[$@$!%*#?&]");      // Special Chars
	var prog = 0;
	for (var i = 0; i < match.length; i++)
	  	{
	      if (new RegExp(match[i]).test(pwd))
	       {
	          prog++;
	       }
	   	}
	    // Length must be at least 8 chars
	  	if(prog > 2 && pwd.length > 7)
	  	{
	  	  prog++;
	  	}
	// Display it
	var progress = "";
	var strength = "";
	switch (prog) 
	{
	   	case 0:
	   		//strength = "25% - Weak";
	   		progress = "0";
	   		break;
	   	case 1:
	   	case 2:
	  		strength = "25% - Weak";
	   		progress = "25";
	   		break;
		case 3:
	  		strength = "50% - Good";
	   		progress = "50";
	   		break;
	  	case 4:
	   		strength = "75% - Moderate";
	   		progress = "75";
	   		break;
	  	case 5:
	   		strength = "100% - Strong";
	   		progress = "100";
	   		break;
	}
	  	document.getElementById("progresslabel").innerHTML = strength;
	  	document.getElementById("progress").value = progress;
};

Animator();

window.addEventListener('scroll', () => {
    document.body.style.setProperty('--video', 
    window.pageYOffset / (document.body.offsetHeight - window.innerHeight)
    );
}, false);
