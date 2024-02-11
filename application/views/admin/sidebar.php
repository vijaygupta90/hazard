<!DOCTYPE html>
<html lang="en">
<head>

    
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <title>Document</title>
    <!--<style>
    

*{
	list-style: none;
	text-decoration: none;
	margin: 0;
	padding: 0;
	box-sizing: border-box;
	font-family: 'Open Sans', sans-serif;
}

body{
	background: #f5f6fa;
}

.wrapper .sidebar{
	background: rgb(5, 68, 104);
	position: fixed;
	top: 0;
	left: 0;
	width: 225px;
	height: 100%;
	padding: 20px 0;
	transition: all 0.5s ease;
}

.wrapper .sidebar .profile{
	margin-bottom: 30px;
	text-align: center;
}

.wrapper .sidebar .profile img{
	display: block;
	width: 100px;
	height: 100px;
    border-radius: 50%;
	margin: 0 auto;
}

.wrapper .sidebar .profile h3{
	color: #ffffff;
	margin: 10px 0 5px;
}

.wrapper .sidebar .profile p{
	color: rgb(206, 240, 253);
	font-size: 14px;
}

.wrapper .sidebar ul li a{
	display: block;
	padding: 13px 30px;
	border-bottom: 1px solid #10558d;
	color: rgb(241, 237, 237);
	font-size: 16px;
	position: relative;
}

.wrapper .sidebar ul li a .icon{
	color: #dee4ec;
	width: 30px;
	display: inline-block;
}

 

.wrapper .sidebar ul li a:hover,
.wrapper .sidebar ul li a.active{
	color: #0c7db1;

	background:white;
    border-right: 2px solid rgb(5, 68, 104);
}

.wrapper .sidebar ul li a:hover .icon,
.wrapper .sidebar ul li a.active .icon{
	color: #0c7db1;
}

.wrapper .sidebar ul li a:hover:before,
.wrapper .sidebar ul li a.active:before{
	display: block;
}

.wrapper .section{
	width: calc(100% - 225px);
	margin-left: 225px;
	transition: all 0.5s ease;
}

.wrapper .section .top_navbar{
	background: rgb(7, 105, 185);
	height: 50px;
	display: flex;
	align-items: center;
	padding: 0 30px;
 
}

.wrapper .section .top_navbar .hamburger a{
	font-size: 28px;
	color: #f4fbff;
}

.wrapper .section .top_navbar .hamburger a:hover{
	color: #a2ecff;
}

 

body.active .wrapper .sidebar{
	left: -225px;
}

body.active .wrapper .section{
	margin-left: 0;
	width: 100%;
}

    </style>-->
    <style>@import url("https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap");
    :root{--header-height: 3rem;--nav-width: 68px;--first-color: #4723D9;--first-color-light: #AFA5D9;--white-color: #F7F6FB;--body-font: 'Nunito', sans-serif;--normal-font-size: 1rem;--z-fixed: 100}*,::before,::after{box-sizing: border-box}
    body{position: relative;margin: var(--header-height) 0 0 0;padding: 0 1rem;font-family: var(--body-font);font-size: var(--normal-font-size);transition: .5s}a{text-decoration: none}
    .header{width: 100%;height: var(--header-height);position: fixed;top: 0;left: 0;display: flex;align-items: center;justify-content: space-between;padding: 0 1rem;background-color: var(--white-color);z-index: var(--z-fixed);transition: .5s}
    .header_toggle{color: var(--first-color);font-size: 1.5rem;cursor: pointer}
    .header_img{width: 35px;height: 35px;display: flex;justify-content: center;border-radius: 50%;overflow: hidden}
    .header_img img{width: 40px}.l-navbar{position: fixed;top: 0;left: -30%;width: var(--nav-width);height: 100vh;background-color:#b2f10a;);padding: .5rem 1rem 0 0;transition: .5s;z-index: var(--z-fixed)}.nav{height: 100%;display: flex;flex-direction: column;justify-content: space-between;overflow: hidden}
    .nav_logo, .nav_link{display: grid;grid-template-columns: max-content max-content;align-items: center;column-gap: 1rem;padding: .5rem 0 .5rem 1.5rem}
    .nav_logo{margin-bottom: 2rem}
    .nav_logo-icon{font-size: 1.25rem;color: var(--white-color)}
    .nav_logo-name{color: var(--white-color);font-weight: 700}
    .nav_link{position: relative;color:white;margin-bottom: 1.5rem;transition: .3s}
    .nav_link:hover{color: var(--white-color)}
    .nav_icon{font-size: 1.25rem}
    .show{left: 0}
    .body-pd{padding-left: calc(var(--nav-width) + 1rem)}
    .active{color: var(--white-color)}
    .active::before{content: '';position: absolute;left: 0;width: 2px;height: 32px;background-color: var(--white-color)}.height-100{height:100vh}@media screen and (min-width: 768px){body{margin: calc(var(--header-height) + 1rem) 0 0 0;padding-left: calc(var(--nav-width) + 2rem)}
    .header{height: calc(var(--header-height) + 1rem);padding: 0 2rem 0 calc(var(--nav-width) + 2rem)}
    .header_img{width: 40px;height: 40px}.header_img img{width: 45px}.l-navbar{left: 0;padding: 1rem 1rem 0 0}.show{width: calc(var(--nav-width) + 156px)}.body-pd{padding-left: calc(var(--nav-width) + 188px)}}
        
    .dropbtn {
  background-color: ;
  color: white;
  padding: 16px;
  font-size: 16px;
  border: none;
}

.dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #4723D9;;
  min-width: 160px;
  
  z-index: 1;
}

.dropdown-content a {
  color: white;
  
  text-decoration: none;
  display: block;
}

.dropdown-content a:hover {background-color: #;}

.dropdown:hover .dropdown-content {display: block;}

.dropdown:hover .dropbtn {background-color: green;}
        </style>
</head>
<!--<body>
   
    <div class="wrapper">
        <div class="section">
            <div class="top_navbar">
                <div class="hamburger">
                    <a href="#">
                        <i class="fas fa-bars"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="sidebar">
            <div class="profile">
                <img src="<?= base_url(); ?>img\uptimg.png" alt="profile_picture">
                <h3>नगर पंचायत सुरियावाँ</h3>
                <p>भदोही</p>
            </div>
            <ul>
                <li class="">
                    <a href="<?= base_url('Admin'); ?>" class="menu-link"> <span class="icon"><i class="fas fa-home"></i></span>
                        <span class="item" data-i18n="Analytics">डैशबोर्ड </span>
                    </a>
                </li>
                <li class="">
                    <a href="<?= base_url('Admin/grievance'); ?>" class="menu-link"> <span class="icon"><i class="fas fa-desktop"></i></span>
                        <span class="item" data-i18n="Analytics">शिकायत निस्तारण</span>
                    </a>
                </li>                
                <li class="">
                    <a href="<?= base_url('Admin/Admin_budget'); ?>" class="menu-link"> <span class="icon"><i class="fas fa-user-friends"></i></span>
                        <span class="item" data-i18n="Analytics">बजट </span>
                    </a>
                </li>
                <li class="">
                    <a href="<?= base_url('Admin/Admin_tender'); ?>" class="menu-link"> <span class="icon"><i class="fas fa-tachometer-alt"></i></span>
                        <span class="item" data-i18n="Analytics">टेन्डर</span>
                    </a>
                </li>
            
                <li class="menu-item">
                    <a href="<?= base_url('Login/logout'); ?>" class="menu-link"> <span class="icon"><i class="fas fa-database"></i></span>
                        <span class="item" data-i18n="Analytics">लॉगआउट</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>-->
    <body id="body-pd">
    <header class="header" id="header">
        <div class="header_toggle"> <i class='bx bx-menu' id="header-toggle"></i> </div>
        <div class="header_img"> <img src="<?= base_url(); ?>img\uptimg.png" alt=""> </div>
    </header>
    <div class="l-navbar" id="nav-bar">
        <nav class="nav">
            <div> <a href="#" class="nav_logo"> <i class='bx bx-layer nav_logo-icon'></i> <span class="nav_logo-name">Admin Dashboard</span> </a>
                <div class="nav_list"> <a href="<?= base_url('Admin'); ?>" class="nav_link active"> <i class='bx bx-grid-alt nav_icon'></i> <span class="nav_name">Dashboard</span> </a> 
                <a href="<?= base_url('Admin/grievance'); ?>" class="nav_link"> <i class='bx bx-user nav_icon'></i> <span class="nav_name">Coustomer Details</span> </a> 
                <!--<a href="<?= base_url('Admin/Admin_budget'); ?>" class="nav_link"> <i class='bx bx-message-square-detail nav_icon'></i> <span class="nav_name">बजट </span> </a> 
                <a href="<?= base_url('Admin/Admin_tender'); ?>" class="nav_link"> <i class='bx bx-bookmark nav_icon'></i> <span class="nav_name">टेन्डर</span> </a> 
                <a href="javascript:void(0);" class="nav_link menu-toggle"><span class="nav_name">सम्पत्ति कर प्रबंधन प्रणाली</span> </a>--> 
                <div class="dropdown">
                <!--<a href="javascript:void(0);" class="dropbtn nav_link menu-toggle"> <i class='bx bx-dock-top nav_icon'></i> <span class="nav_name">सम्पत्ति कर</span> </a>-->
                <!-- Layouts -->
                        <!-- House Tax -->
                        
                        <!--<li class="menu-item">
                            <a href="javascript:void(0);" class="menu-link menu-toggle"> <i class="menu-icon tf-icons bx bx-dock-top"></i>
                                <div data-i18n="Account Settings">सम्पत्ति कर</div>
                            </a>-->

                            
                              <!--<div class="dropdown-content">
                                               
                            
                                
                                    <a href="<?= base_url('Admin/assesseeDetail'); ?>" class="nav_link">
                                        <div data-i18n="Account">उपभोक्ता विवरण</div>
                                    </a>
                                
                                
                                    <a href="<?= base_url('Admin/calculateHouseTax'); ?>" class="nav_link">
                                        <div data-i18n="Account">कर गणना</div>
                                    </a>
                                
                                
                                    <a href="<?= base_url('Admin/payHouseTax'); ?>" class="nav_link">
                                        <div data-i18n="Account">भवन कर जमा करें</div>
                                    </a>
                                
                                    <a href="<?= base_url('Admin/payWaterTax'); ?>" class="nav_link">
                                        <div data-i18n="Account">जल कर जमा करें</div>
                                    </a>
                                
                                    <a href="<?= base_url('Admin/HouseTaxReport'); ?>" class="nav_link">
                                        <div data-i18n="Account">भवन कर रिपोर्ट निकालें</div>
                                    </a>
                                
                                    <a href="<?= base_url('Admin/WaterTaxReport'); ?>" class="nav_link">
                                        <div data-i18n="Account">जल कर रिपोर्ट निकालें</div>
                                    </a>
                               
                        
                       </div>
                       </div>
                       </div>
                       <div class="dropdown">
                            <a href="javascript:void(0);" class="dropbtn nav_link menu-toggle"> <i class="menu-icon tf-icons bx bx-cube-alt"></i>
                                <span class="nav_name">मास्टर</span>
                            </a>
                            <div class="dropdown-content">
                            
                                    <a href="<?= base_url('Admin/financialYear'); ?>" class="nav_link">
                                        <div data-i18n="Account">वित्तीय वर्ष</div>
                                    </a>
                                
                                    <a href="<?= base_url('Admin/houseWard'); ?>" class="nav_link">
                                        <div data-i18n="Account">वार्ड</div>
                                    </a>
                            </div>
                        </div>-->
            </div> <a href="<?= base_url('Login/logout'); ?>" class="nav_link"> <i class='bx bx-log-out nav_icon'></i> <span class="nav_name">LogOut</span> </a>
        </nav>
        
    </div>
</div>
    <!--Container Main start-->
    <div class="height-100 bg-light">
        <h4 class="pt-2">ADMIN DASHBOARD</h4>
    
    <!--Container Main end-->
  <!--<script>
    
       var hamburger = document.querySelector(".hamburger");
	hamburger.addEventListener("click", function(){
		document.querySelector("body").classList.toggle("active");
        
	})
  </script>-->
  <script>
    document.addEventListener("DOMContentLoaded", function(event) {
   
   const showNavbar = (toggleId, navId, bodyId, headerId) =>{
   const toggle = document.getElementById(toggleId),
   nav = document.getElementById(navId),
   bodypd = document.getElementById(bodyId),
   headerpd = document.getElementById(headerId)
   
   // Validate that all variables exist
   if(toggle && nav && bodypd && headerpd){
   toggle.addEventListener('click', ()=>{
   // show navbar
   nav.classList.toggle('show')
   // change icon
   toggle.classList.toggle('bx-x')
   // add padding to body
   bodypd.classList.toggle('body-pd')
   // add padding to header
   headerpd.classList.toggle('body-pd')
   })
   }
   }
   
   showNavbar('header-toggle','nav-bar','body-pd','header')
   
   /*===== LINK ACTIVE =====*/
   const linkColor = document.querySelectorAll('.nav_link')
   
   function colorLink(){
   if(linkColor){
   linkColor.forEach(l=> l.classList.remove('active'))
   this.classList.add('active')
   }
   }
   linkColor.forEach(l=> l.addEventListener('click', colorLink))
   
    // Your code to run since DOM is loaded and ready
   });
    </script>
</body>
</html>

