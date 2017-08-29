// After form loads focus will go to User id field.
function firstfocus()
{
	var uid = document.registration.userid.focus();
	return true;
}

// This function will validate User id.
function nm_depan_validation(mx,my)
	{
		var uid = document.registration.nm_depan;
		var uid_len = uid.value.length;
		if (uid_len == 0 || uid_len >= my || uid_len < mx)
		{
			alert("Nama depan harus lebih dari "+mx+" huruf sampai "+my);
			uid.focus();
			return false;
		}
		// Focus goes to next field i.e. Password.
		document.registration.nm_blkg.focus();
		return true;
}

function nm_blkng_validation(mx,my)
	{
		var nm_blkg = document.registration.nm_blkg;
		var nm_blkg_len = nm_blkg.value.length;
		if (nm_blkg_len == 0 || nm_blkg_len >= my || nm_blkg_len < mx)
		{
			alert("Nama belakang harus lebih dari "+mx+" huruf");
			nm_blkg.focus();
			return false;
			//$('.userid_validation').html("");
		}
		// Focus goes to next field i.e. Password.
		document.registration.email.focus();
		return true;
}

function ValidateEmail()
{
	var uemail = document.registration.email;
	var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
	if(uemail.value.match(mailformat))
	{
		document.registration.no_telp.focus();
		return true;
	}
	else
	{
		alert("Email tidak sesuai!");
		uemail.focus();
		return false;
	}
}

function NoTelp()
{ 
	var uzip = document.registration.no_telp;
	var numbers = /^[0-9]+$/;
	if(uzip.value.match(numbers))
	{
		// Focus goes to next field i.e. email.
		document.registration.no_telp_lain.focus();
		return true;
	}
	else
	{
		alert('No. Telpon Harus Angka!');
		uzip.focus();
		return false;
	}
}

function NoTelpLain()
{ 
	var uzip = document.registration.no_telp_lain;
	var numbers = /^[0-9]+$/;
	if(uzip.value.match(numbers))
	{
		// Focus goes to next field i.e. email.
		document.registration.alamat.focus();
		return true;
	}
	else
	{
		alert('No. Telpon Lain Harus Angka!');
		uzip.focus();
		return false;
	}
}

function alamat()
{ 
	var uname = document.registration.alamat;
	var letters = /^[A-Za-z]+$/;
	if(uname.value.match(letters))
	{
	// Focus goes to next field i.e. Address.
		document.registration.pass.focus();
		return true;
	}
	else
	{
		alert('Alamat must have alphabet characters only');
		uname.focus();
		return false;
	}
}

// This function will validate Password.
function passid_validation(mx,my)
{
	var passid = document.registration.pass;
	var passid_len = passid.value.length;
	if (passid_len == 0 ||passid_len >= my || passid_len < mx)
	{
		alert("Panjang Password minimal "+mx+" sd "+my);
		passid.focus();
		return false;
	}
// Focus goes to next field i.e. Name.
	document.registration.username.focus();
	return true;
}

// This function will validate Name.
function allLetter()
{ 
	var uname = document.registration.username;
	var letters = /^[A-Za-z]+$/;
	if(uname.value.match(letters))
	{
	// Focus goes to next field i.e. Address.
		document.registration.address.focus();
		return true;
	}
	else
	{
		alert('Username must have alphabet characters only');
		uname.focus();
		return false;
	}
}

// This function will validate Address.
function alphanumeric()
{ 
	var uadd = document.registration.address;
	var letters = /^[0-9a-zA-Z]+$/;
	if(uadd.value.match(letters))
	{
		// Focus goes to next field i.e. Country.
		document.registration.country.focus();
		return true;
	}
	else
	{
		alert('User address must have alphanumeric characters only');
		uadd.focus();
		return false;
	}
}

// This function will select country name.
function countryselect()
{
	var ucountry = document.registration.country;
	if(ucountry.value == "Default")
	{
	alert('Select your country from the list');
	ucountry.focus();
	return false;
	}
	else
	{
	// Focus goes to next field i.e. ZIP Code.
	document.registration.zip.focus();
	return true;
	}
}

// This function will validate ZIP Code.
function allnumeric()
{ 
	var uzip = document.registration.zip;
	var numbers = /^[0-9]+$/;
	if(uzip.value.match(numbers))
	{
		// Focus goes to next field i.e. email.
		document.registration.email.focus();
		return true;
	}
	else
	{
		alert('ZIP code must have numeric characters only');
		uzip.focus();
		return false;
	}
}

// This function will validate Email.
 