function general(){

	var x1,x2;
	x1=document.getElementById("newpass").value;
    x2=document.getElementById("cnewpass").value;
	if(x1.length<8 && x1.length>0)
	{
	  alert("Password must contain at least 8 characters");
	  return false;	
	}
	if(x1!=x2)
	{
	  alert("Passwords do not match!");
	  return false;	
	}
	else{
		alert("Your changes have been saved");
		return true;
	}
}