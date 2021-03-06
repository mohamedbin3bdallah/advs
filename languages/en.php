<?php

function language($lang)
{
	$arr[' '] = " ";
	$arr[':'] = " : ";
	$arr['/'] = " / ";
	$arr['-'] = " - ";
	$arr['*'] = " * ";
	
	$arr['send'] = "Send";
	$arr['edit'] = "Edit";
	$arr['delete'] = "Delete";
	$arr['en'] = "English";
	$arr['ar'] = "Arabic";
	$arr['first'] = "First";
	$arr['next'] = "Next";
	$arr['previous'] = "Previous";
	$arr['last'] = "Last";
	$arr['total'] = "Total";
	$arr['select'] = "Select";
	$arr['comment'] = "Comment";
	$arr['message'] = "Message";
	$arr['share'] = "Share";
	$arr['save'] = "Save";
	$arr['deletemodal'] = "Are You Sure You Want To Delete This Statement ?";
	$arr['agree'] = "Agree";
	$arr['no'] = "No";
	$arr['cantdelete'] = "You Cant Delete this Statement, it contains ";
	$arr['success'] = "Done Successfully";
	$arr['nodata'] = "There is no data";
	$arr['more'] = "More";
	$arr['getit'] = "Get It Now?";
	$arr['type'] = "Type";
	$arr['doctor'] = "Doctor";
	
	//	Messages
	$arr['m1'] = "Success";
	$arr['m2'] = "Something Wrong";
	$arr['m3'] = "Add Your input Correctly";
	$arr['m4'] = "Invalid Input";
	$arr['m5'] = "All inputs are required";
	$arr['m6'] = "Two password must be equals";
	$arr['m7'] = "Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters of English Language";
	$arr['m8'] = "From input text must be smaller than or equal To input text";
	$arr['m9'] = "Invalid Usename";
	$arr['m10'] = "The Balance is transfered to you Successfully";
	$arr['m11'] = "Your message was sent";
	$arr['m12'] = "Fill all fields correctly";
	$arr['m13'] = "Invalid Email";
	$arr['m14'] = "Wrong Email or Password";
	$arr['m15'] = "ِAccount not Activated Yet";
	$arr['m16'] = "ِAccount already Active";
	$arr['m17'] = "ِAccount not exist";
	$arr['m18'] = "ِPlease login to your email and active your account";
	$arr['m19'] = "ِYour Account is Activated";
	$arr['m20'] = "Wrong Username or Password";
	$arr['m21'] = "Username must by mor tan 5 Characters and less than 255 Characters of English Language";
	$arr['m22'] = "New Password Was Sent to Your Email";
	$arr['m23'] = "Must be Number";
	
	// Register
	$arr['register'] = "Register";
	$arr['address'] = "Address";
	$arr['phone'] = "Phone";
	$arr['dealer'] = "Dealer";
	
	// Login
	$arr['currentuser'] = "Current User";
	$arr['username'] = "Username";
	$arr['email'] = "Email";
	$arr['password'] = "Password";
	$arr['login'] = "Login";
	
	// Menu
	$arr['menu'] = "Menu";
	$arr['slides'] = "Slides";
	$arr['system'] = "System";
	$arr['pages'] = "Pages";
	$arr['plans'] = "Plans";
	$arr['orders'] = "Orders";
	$arr['categories'] = "Categories";
	$arr['sitepages'] = "Site Pages";
	$arr['companies'] = "Companies";
	$arr['doctors'] = "Doctors";
	$arr['news'] = "News";
	$arr['about'] = "About";
	$arr['faq'] = "FAQ";
	$arr['instructions'] = "Instructions";
	$arr['privacy'] = "Privacy";
	$arr['contact'] = "Contact";
	$arr['account'] = "Account";
	$arr['logout'] = "Logout";
	$arr['createpassword'] = "Create Password";
	$arr['allpages'] = "All Pages";
	$arr['page'] = "Page";
	
	// System
	$arr['website'] = "Website Name";
	$arr['logo'] = "Website Logo";
	$arr['paypal'] = "Paypal";
	$arr['bank'] = "Bank";
	
	// Pages
	$arr['page'] = "Page";
	$arr['keywords'] = "Keywords";
	
	// About
	$arr['vision'] = "Vision";
	$arr['mission'] = "Mission";
	$arr['picture'] = "Picture";
	
	// Plans
	$arr['plan'] = "Plan";
	$arr['title'] = "Title";
	$arr['fees'] = "Fees";
	$arr['month'] = "Month";
	$arr['featured'] = "Featured";
	
	// Orders
	$arr['number'] = "Number";
	$arr['delivered'] = "Delivered";
	$arr['nondelivered'] = "Non Delivered";
	$arr['time'] = "Time";
	$arr['dtime'] = "Delivered Time";
	$arr['renow'] = "Renow";
	$arr['notpayed'] = "Not Payed";
	
	// Pay
	$arr['pay'] = "Pay";
	$arr['paymethod'] = "Pay Method";
	$arr['adsnumber'] = "Ads. Number";
	
	// Ads
	$arr['ad'] = "Ad";
	$arr['ads'] = "Ads";
	$arr['addad'] = "Add Ad";
	$arr['newad'] = "New Ad";
	$arr['add'] = "Add";
	$arr['editad'] = "Edit Ad";
	
	// Companies
	$arr['company'] = "Company";
	
	// News
	$arr['preview'] = "Preview";
	$arr['description'] = "Description";
	$arr['title'] = "Title";
	$arr['active'] = "Active";
	$arr['notactive'] = "Not Active";
	$arr['time'] = "Time";
	
	// Sitepages
	$arr['category'] = "Category";
	
	// Details
	$arr['medaly'] = "Medaly";
	$arr['chart'] = "Chart";
	$arr['circle'] = "Circle";
	$arr['clock'] = "Clock";
	$arr['lamp'] = "Lamp";
	$arr['code'] = "Code";
	
	// Features
	$arr['person'] = "Person";
	$arr['map'] = "Map";
	$arr['headphone'] = "Headphone";
	$arr['clickbutton'] = "Click Button";
	$arr['24hourservice'] = "24 Hours Service";
	$arr['settings'] = "Settings";

	// Testimonials
	$arr['name'] = "Name";
	$arr['job'] = "Job";
	
	// Contact
	$arr['address'] = "Address";
	$arr['phone'] = "Phone";
	$arr['mobile'] = "Mobile";
	$arr['facebook'] = "Facebook";
	$arr['twitter'] = "Twitter";
	$arr['googleplus'] = "GooglePlus";
	$arr['instagram'] = "Instagram";
	$arr['linkedin'] = "Linkedin";
	$arr['youtube'] = "Youtube";
	$arr['dribble'] = "Dribble";
	$arr['flickr'] = "Flickr";
	
	echo $arr[$lang];
}

?>