<?php
session_start();
include 'dbconnection.php';
include 'includes/header.php';
if(isset($_SESSION['email'])=='') {          
  header("Location:index.php");
  }
?>
<p>Welcome
    <strong>
        <?php echo $_SESSION['email']; ?>
    </strong>
</p>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">   
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <!-- <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form> -->
      <ul class="navbar-nav me-auto mb-2 mb-lg-0 ">             
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          <img src="user.png"width="20" height="20"></img>
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
          <li><a class="dropdown-item" href="profile.php">Profile</a></li>
          <li><a class="dropdown-item" href="editprofile.php">Edit Profile</a></li>
          <li><a class="dropdown-item" href="changepassword.php">Change Password</a></li>
            <li><a class="dropdown-item" href="logout.php">Logout</a></li>            
          </ul>
        </li>        
      </ul>
      
    </div>
  </div>
</nav>
