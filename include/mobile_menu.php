

<style>

 
.menu-phone-mobiles{display: none;}
.sidenav1 {

  height: 100%;

  width:280px; 
  position: fixed;

  z-index: 1;

  top: 0;

  left:-280px;

  background-color: #012638;

  overflow-x: hidden;

  transition: 0.5s;

  padding-top: 60px;-webkit-transition: all 0.8s ease;

    -moz-transition: all 0.8s ease;

    -o-transition: all 0.8s ease;

    -ms-transition: all 0.8s ease;

    transition: all 0.8s ease;

}



.sidenav1 a {

   font-family:auto !important;

  text-decoration: none;

  font-size: 18px;

  color: #ffffff;

  display: block;

  transition: 0.3s;

}



.sidenav1 a:hover {

  color: #f1f1f1;

}



.sidenav1 .closebtn {

  position: absolute;

  top: 0;

  right: 25px;

  font-size: 36px;

  margin-left: 50px;

}



@media screen and (max-height: 450px) {

  .sidenav1 {padding-top: 15px;}

  .sidenav1 a {font-size: 18px;}

}



@media(max-width:992px){



  .form-thared{

    width:163% !important;

  }

  .form-thared1{

    width:175%!important;



  }

  .form-thared3{

    width:172%!important;

  }



  .letest_news-all-fastival{

    height:300px !important;

  }

  .menu-phone-mobiles{

    margin-left:20px;

  }

.nicdark_logo.nicdark_marginleft10 img{

  margin-left:50px;

}



  .head_pres{

    font-size:22px !important;

  }

  .modal{

    height:100%;

  }

  .modal-dialog{

    margin-top:45% !important; 

  }

   label{

   margin-bottom: -0.5rem !important;

   }

   .closebtn1{

    text-align: end;

    padding: 25px !important;

    margin-top: -70px;

    font-size:40px !important;

    font-weight:bolder;

   }

    

} .accordion {

  background-color: #111

  color: #fff;

  cursor: pointer;

   

  border: none;

  text-align: left;

  outline: none;

  font-size:20px;

  transition: all 0.4s;

}



 li{

  list-style:none;

 }



.panel {

  padding: 0 18px;

  display: none;

margin-left:-48px;

  overflow: hidden;
  transition: all 0.5s;

}

.menu_phone{

  border-bottom:1px solid #f9f9f9;
    padding: 10px;

    padding-left:30px;

}

.sub-menu{

  border-bottom:1px solid #ec774b;

  padding:10px;

 

  width: 115%;



}

.sub-menu a{

  font-size:18px;
  color:#000;
  padding-left:50px;

}



.accordion:after {

  content: '\002B';

 margin-top:-25px;

    font-size:27px;

    color: white;

    margin-right: 10px;

  font-weight: bold;

  float: right;

  margin-left: 5px;
  transition: all 0.5s;

}







.sub-all-menu-icons{

  margin-top:-50px;

}

@media(max-width:767px){
  .menu-phone-mobiles{display: block;}
  .active:after {

  content: "\2212";

}
}

</style>





<div id="mySidenav1" class="sidenav1">

  

  <a href="javascript:void(0)" class="closebtn1" onclick="closeNav()">&times;</a>

  <ul class="sub-all-menu-icons">

    <li class="menu_phone"><a href="index.php">Home</a></li>
    <li class="menu_phone"><a href="kishan_record_data.php">Kishan Record</a></li>

     
 

  </ul>



</div>  <span class="menu-phone-mobiles" style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776;</span>



<script>

function openNav() {

  document.getElementById("mySidenav1").style.left = "0";

}



function closeNav() {

  document.getElementById("mySidenav1").style.left = "-280px";

}

 

  

</script><script>

var acc = document.getElementsByClassName("accordion");

var i;



for (i = 0; i < acc.length; i++) {

  acc[i].addEventListener("click", function() {

    this.classList.toggle("active");

    var panel = this.nextElementSibling;

    if (panel.style.display === "block") {

      panel.style.display = "none";

    } else {

      panel.style.display = "block";

    }

  });

}

</script>