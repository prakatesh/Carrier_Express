<!-- Sidebar -->
<script>
function showOwners(){  
    $.ajax({
        url:"./adminView/viewVehOwner.php",
        method:"post",
        data:{record:1},
        success:function(data){
            $('.allContent-section').html(data);
        }
    });
}
function showLabours(){  
    $.ajax({
        url:"./adminView/viewLabours.php",
        method:"post",
        data:{record:1},
        success:function(data){
            $('.allContent-section').html(data);
        }
    });
}
function showCustomerAssign(){  
    $.ajax({
        url:"./adminView/viewCustomerAssign.php",
        method:"post",
        data:{record:1},
        success:function(data){
            $('.allContent-section').html(data);
        }
    });
}

function showCustomers(){
    $.ajax({
        url:"./adminView/viewCustomers.php",
        method:"post",
        data:{record:1},
        success:function(data){
            $('.allContent-section').html(data);
        }
    });
}

function showOrders(){
    $.ajax({
        url:"./adminView/viewAllOrders.php",
        method:"post",
        data:{record:1},
        success:function(data){
            $('.allContent-section').html(data);
        }
    });
}



function ChangePay(id){
    $.ajax({
        url:"./controller/updatePayStatus.php",
        method:"post",
        data:{record:id},
        success:function(data){
            alert('Payment Status updated successfully');
            $('form').trigger('reset');
            showOrders();
        }
    });
}

//add product data

//edit product data
function itemEditForm(id){
    $.ajax({
        url:"./adminView/editItemForm.php",
        method:"post",
        data:{record:id},
        success:function(data){
            $('.allContent-section').html(data);
        }
    });
}

//update product after submit
function updateItems(){
    var product_id = $('#product_id').val();
    var p_name = $('#p_name').val();
    var p_desc = $('#p_desc').val();
    var p_price = $('#p_price').val();
    var category = $('#category').val();
    var existingImage = $('#existingImage').val();
    var newImage = $('#newImage')[0].files[0];
    var fd = new FormData();
    fd.append('product_id', product_id);
    fd.append('p_name', p_name);
    fd.append('p_desc', p_desc);
    fd.append('p_price', p_price);
    fd.append('category', category);
    fd.append('existingImage', existingImage);
    fd.append('newImage', newImage);
   
    $.ajax({
      url:'./controller/updateItemController.php',
      method:'post',
      data:fd,
      processData: false,
      contentType: false,
      success: function(data){
        alert('Data Update Success.');
        $('form').trigger('reset');
        showProductItems();
      }
    });
}

//delete product data
function itemDelete(id){
    $.ajax({
        url:"./controller/deleteItemController.php",
        method:"post",
        data:{record:id},
        success:function(data){
            alert('Items Successfully deleted');
            $('form').trigger('reset');
            showProductItems();
        }
    });
}


//delete cart data
function cartDelete(id){
    $.ajax({
        url:"./controller/deleteCartController.php",
        method:"post",
        data:{record:id},
        success:function(data){
            alert('Cart Item Successfully deleted');
            $('form').trigger('reset');
            showMyCart();
        }
    });
}

function eachDetailsForm(id){
    $.ajax({
        url:"./view/viewEachDetails.php",
        method:"post",
        data:{record:id},
        success:function(data){
            $('.allContent-section').html(data);
        }
    });
}



//delete category data
function categoryDelete(id){
    $.ajax({
        url:"./controller/catDeleteController.php",
        method:"post",
        data:{record:id},
        success:function(data){
            alert('Category Successfully deleted');
            $('form').trigger('reset');
            showCategory();
        }
    });
}

//delete size data
function sizeDelete(id){
    $.ajax({
        url:"./controller/deleteSizeController.php",
        method:"post",
        data:{record:id},
        success:function(data){
            alert('Size Successfully deleted');
            $('form').trigger('reset');
            showSizes();
        }
    });
}




//edit variation data
function variationEditForm(id){
    $.ajax({
        url:"./adminView/editVariationForm.php",
        method:"post",
        data:{record:id},
        success:function(data){
            $('.allContent-section').html(data);
        }
    });
}



function search(id){
    $.ajax({
        url:"./controller/searchController.php",
        method:"post",
        data:{record:id},
        success:function(data){
            $('.eachCategoryProducts').html(data);
        }
    });
}


function quantityPlus(id){ 
    $.ajax({
        url:"./controller/addQuantityController.php",
        method:"post",
        data:{record:id},
        success:function(data){
            $('form').trigger('reset');
            showMyCart();
        }
    });
}
function quantityMinus(id){
    $.ajax({
        url:"./controller/subQuantityController.php",
        method:"post",
        data:{record:id},
        success:function(data){
            $('form').trigger('reset');
            showMyCart();
        }
    });
}

function checkout(){
    $.ajax({
        url:"./view/viewCheckout.php",
        method:"post",
        data:{record:1},
        success:function(data){
            $('.allContent-section').html(data);
        }
    });
}


function removeFromWish(id){
    $.ajax({
        url:"./controller/removeFromWishlist.php",
        method:"post",
        data:{record:id},
        success:function(data){
            alert('Removed from wishlist');
        }
    });
}


function addToWish(id){
    $.ajax({
        url:"./controller/addToWishlist.php",
        method:"post",
        data:{record:id},
        success:function(data){
            alert('Added to wishlist');        
        }
    });
}
</script>












































<style>
@import url('https://fonts.googleapis.com/css?family=Work+Sans:400,500,600,700&display=swap');
* {
    margin: 0;
    padding: 0;
    font-family: 'Work Sans', sans-serif;
    font-size: 18px;
}
body{
  background-color: rgb(221, 239, 255);
}
.user-cart span{
    background-color:red; 
    padding-right:3px; 
    padding-left:3px;  
    border-radius:10px; 
    font-size:18px;
    margin-left:-1.2rem;
}

/*********** admin dashboard styling **********/

.card{
  text-align: center;
  background-color: white;
  padding:20px;
  margin: 10px;
  border-radius: 10px;
  box-shadow: 8px 5px 5px #3B3131;
}
.col-sm-3 :hover
{
  background-image: linear-gradient(150deg, #744e91,rgb(193, 107, 107));
}
.card :hover{
  color: #eeeeee;
}
/************************** for sidebar ***********************************/

  /* The sidebar menu */
  
  .sidebar {
      height: 100%; /* 100% Full-height */
      width: 0; /* 0 width - change this with JavaScript */
      position: fixed; /* Stay in place */
      z-index: 1; /* Stay on top */
      top: 0;
      left: 0;
      background-image: linear-gradient(145deg, white,aqua,white);/* Black*/
      overflow-x: hidden; /* Disable horizontal scroll */
      padding-top: 60px; /* Place content 60px from the top */
      transition: 0.5s; /* 0.5 second transition effect to slide in the sidebar */
    }
    
    /* The sidebar links */
    .sidebar a {
      padding: 8px 8px 8px 32px;
      text-decoration: none;
      font-size: 20px;
      color: black;
      display: block;
      transition: 0.3s;
    }
    
    .sidebar .side-header{
          margin-left: 30px;
          margin-bottom: 8px;
          color: #fff;
      }

    /* When you mouse over the navigation links, change their color */
    .sidebar a:hover {
        background-color: rgb(68, 71, 241);
        color:white;
    }
    
    /* Position and style the close button (top right corner) */
    .sidebar .closebtn {
      position: absolute;
      top: 0;
      right: 2px;
      font-size: 34px;
      margin-left: 50px;
    }
    
    /* The button used to open the sidebar */
    .openbtn {
      font-size: 20px;
      cursor: pointer;
      padding: 10px 15px;
      border: none;
      color: #fff;
      background-color:#584e46;
    }
    
    .openbtn:hover {
      color: #ECDAC9;
    }
    
    /* Style page content - use this if you want to push the page content to the right when you open the side navigation */
    #main {
      transition: margin-left .5s; /* If you want a transition effect */
      padding: 20px;
    }
    
    /* On smaller screens, where height is less than 450px, change the style of the sidenav (less padding and a smaller font size) */
    @media screen and (max-height: 450px) {
      .sidebar {padding-top: 15px;}
      .sidebar a {font-size: 18px;}
    }

/************************** product table styling *********************************/

  table {
    width: 100%;
    border-collapse: collapse;
    border-spacing: 0;
    box-shadow: 0 2px 15px rgba(64, 64, 64, .7);
    border-radius: 12px 12px 0 0;
    margin-bottom: 50px;
  }

  td,
  th {
    padding: 10px 16px;
    text-align: center;
  }

  th {
    background-color: #584e46;
    color: #fafafa;
    font-family: 'Open Sans', Sans-serif;
    font-weight: bold;
  }

  tr {
    width: 100%;
    background-color: #fafafa;
    font-family: 'Montserrat', sans-serif;
  }

  tr:nth-child(even) {
    background-color: #eeeeee;
  }


/************************ login and sign up styling  ******************************/

.card-container.card-account {
  max-width: 500px;
  padding: 30px 30px;
}

.btn {
  font-weight: 700;
  height: 36px;
  -moz-user-select: none;
  -webkit-user-select: none;
  user-select: none;
  cursor: default;
}

/*
* Card component
*/
.card-account{
  background-color: #ECDAC9;
  /* just in case there no content*/
  padding: 20px 25px 30px;
  margin: 0 auto 25px;
  margin-top: 40px;
  /* shadows and rounded borders */
  -moz-border-radius: 2px;
  -webkit-border-radius: 2px;
  border-radius: 2px;
  -moz-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
  -webkit-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
  box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
}

.profile-img-card {
  width: 96px;
  height: 96px;
  margin: 0 auto 10px;
  display: block;
  -moz-border-radius: 50%;
  -webkit-border-radius: 50%;
  border-radius: 50%;
}

/*
* Form styles
*/
.profile-name-card {
  font-size: 16px;
  font-weight: bold;
  text-align: center;
  margin: 10px 0 0;
  min-height: 1em;
}

.reauth-email {
  display: block;
  color: #404040;
  line-height: 2;
  margin-bottom: 10px;
  font-size: 14px;
  text-align: center;
  overflow: hidden;
  text-overflow: ellipsis;
  white-space: nowrap;
  -moz-box-sizing: border-box;
  -webkit-box-sizing: border-box;
  box-sizing: border-box;
}

.form-signin #inputEmail,
.form-signin #inputPassword {
  direction: ltr;
  height: 44px;
  font-size: 16px;
}

.form-signin input[type=email],
.form-signin input[type=password],
.form-signin input[type=text],
.form-signin button {
  width: 100%;
  display: block;
  margin-bottom: 10px;
  z-index: 1;
  position: relative;
  -moz-box-sizing: border-box;
  -webkit-box-sizing: border-box;
  box-sizing: border-box;
}

.form-signin .form-control:focus {
  border-color: #ab9787;
  outline: 0;
  -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.075),0 0 8px #8a7a6d;
  box-shadow: inset 0 1px 1px rgba(0,0,0,.075),0 0 8px #8a7a6d;
}

.btn.btn-signin {
  
  background-color: #584e46;
  padding: 2px;
  font-weight: 700;
  font-size: 16px;
  height: 36px;
  -moz-border-radius: 3px;
  -webkit-border-radius: 3px;
  border-radius: 3px;
  border: none;
  -o-transition: all 0.218s;
  -moz-transition: all 0.218s;
  -webkit-transition: all 0.218s;
  transition: all 0.218s;
}

.btn.btn-signin:hover,
.btn.btn-signin:active,
.btn.btn-signin:focus {
  background-color: #a56a39;
}


.box {
  position: relative;
  background-color: #000;
}

.image {
  opacity: 1;
  display: block;
  max-width: 100%;
  height: auto;
  transition: .5s ease;
  backface-visibility: hidden;
  object-fit: contain;
}

.middle {
  transition: .5s ease;
  opacity: 0;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  -ms-transform: translate(-50%, -50%);
  text-align: center;
}

.box:hover .image {
  opacity: 0.3;
}

.box:hover .middle {
  opacity: 1;
}

.text {
  background-color: #584e46;
  color: #fff;
  font-size: 16px;
  padding: 6px;
  border-radius: 5px;
}

/* *******************   cart to login icon styling   ********************* */
.cart-login-btn{
  margin:5px;
  border-style: outset;
}
.cart-login-btn a i{
  padding: 10px;
  font-size:30px; 
  color:#584e46;              
}
.cart-login-btn a i:hover{  
  color: grey;
}


/* ****************************   footer  *************************** */
.footer-hover{
  color: #000;
}

.footer-hover:hover{
  color: #ECDAC9;
  text-decoration: none;
}
</style>
<script>
function openNav() {
  document.getElementById("mySidebar").style.width = "250px";
  document.getElementById("main").style.marginLeft = "250px";  
  document.getElementById("main-content").style.marginLeft = "250px";
  document.getElementById("main").style.display="none";
}

function closeNav() {
  document.getElementById("mySidebar").style.width = "0";
  document.getElementById("main").style.marginLeft= "0";  
  document.getElementById("main").style.display="block";  
}</script>




<div class="sidebar" id="mySidebar">
<div class="side-header">
    <img src="./assets/images/logo.png" width="120" height="120" alt="Swiss Collection"> 
    <h5 style="margin-top:10px;color:green;">Hello, Admin</h5>
</div>
<hr style="border:1px solid; background-color:#8a7b6d; border-color:#3B3131;">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
    <a href="./index.php" ><i class="fa fa-home"></i> Dashboard</a>
    <a href="#customers"  onclick="showCustomers()" ><i class="fa fa-users"></i> Customers</a>
    <a href="#veh_owners"   onclick="showOwners()" ><i class="fa fa-truck"></i> Vehicle Owners</a>
    <a href="#labours"   onclick="showLabours()" ><i class="fa fa-person"></i> Labours</a>
    <a href="#Assign"   onclick="showCustomerAssign()" ><i class="fa fa-handshake-angle"></i> Assign</a>    

    <a href="#orders" onclick="showOrders()"><i class="fa fa-list"></i> Assigned Orders</a>
  
  <!---->
</div>
 
<div id="main">
    <button class="openbtn" onclick="openNav()"><i class="fa fa-home"></i></button>
</div>
