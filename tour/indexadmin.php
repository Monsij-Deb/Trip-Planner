<?php        
                include('functions.php'); // write your db-connect.php to connect to database.
         

                $query = "SELECT * FROM book";
                $result = mysqli_query($db, $query);
                if ($result == FALSE) {
                    die(mysqli_error());
                    exit();
                }
        ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>complete responsive tour and travel agency website design tutorial</title>

    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="style.css">
    

</head>
<body>
    
<!-- header section starts  -->

<header>

    <div id="menu-bar" class="fas fa-bars"></div>

    <a href="#" class="logo"><span>Trip </span>planner</a>

    <nav class="navbar">
        <a href="#home">home</a>
        <a href="#book">book</a>
        <a href="#packages">packages</a>
        <a href="#services">services</a>
        <a href="#gallery">gallery</a>
        <a href="#contact">contact</a>
    </nav>

    <div class="icons">
        <div class="search-container">
            <form action="/search" method="get">
              <input class="search expandright" id="searchright" type="search" name="q" >
              <label class="button searchbutton" for="searchright"><i class="fas fa-search" ></i></label>
            </form>
          
    

</header>

<!-- header section ends -->



<!-- home section starts  -->

<section class="home" id="home">

    <div class="content">
        <h3>adventure is worthwhile</h3>
        <p>dicover new places with us, adventure awaits</p>
       
    </div>

    

    <div class="video-container">
        <video src="images/bld.mp4" id="video-slider" loop autoplay muted></video>
    </div>

</section>

<!-- home section ends -->

<!-- book section starts  -->

<section class="book" id="book">

    <h1 class="heading">
        <span>b</span>
        <span>o</span>
        <span>o</span>
        <span>k</span>
        <span>i</span>
        <span>n</span>
        <span>g</span>
        <span>s</span>
    </h1>

    <div class="row">
    <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names.." title="Type in a name">
                            <table id="myTable" >
                                <thead>
                                    <tr>
                                      <th class="h3">Sl No.</th>
                                      <th class="h3">Where To</th>
                                      <th class="h3">How Many</th>
                                      <th class="h3">Arrival</th>
                                      <th class="h3">Leaving</th>
                                      
                                      
                                    </tr>
                                </thead>
                                <tbody>
                                <?php $i=1; while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){ ?>
                                <tr>
                                  <td class="inputBox"><?php echo $i++; ?></td>
                                  <td class="inputBox"><?php echo($row['place']); ?></td>
                                  <td class="inputBox"><?php echo($row['count']); ?></td>
                                  <td class="inputBox"><?php echo($row['start']); ?></td>
                                  <td class="inputBox"><?php echo($row['end']); ?></td>
                                  
                                  
                                </tr>
                                <?php 
                                 } ?>
                                
                              </tbody>
                            </table> 
        

    </div>

</section>

<!-- book section ends -->





<!-- footer section  -->

<section class="footer">

    <div class="box-container">

        <div class="box">
            <h3>about us</h3>
            <p>We are an Indian based Travelling website looking forward to provide affordable trips.</p>
        </div>
        <div class="box">
            <h3>branch locations</h3>
            <a href="#">Delhi</a>
            <a href="#">Mumbai</a>
            <a href="#">Chennai</a>
            <a href="#">Kolkata</a>
        </div>
        <div class="box">
            <h3>quick links</h3>
            <a href="#">home</a>
            <a href="#">book</a>
            <a href="#">packages</a>
            <a href="#">services</a>
            <a href="#">gallery</a>
            <a href="#">contact</a>
        </div>
        
    </div>

    

</section>




        <script>
function myFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[1];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
</script>














</body>
</html>