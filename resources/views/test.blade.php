<!DOCTYPE html>
<html lang="en">
<head>
<title>TEST Template</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

<style>
* {
  box-sizing: border-box;
}

body {
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}
/* Style the header */
header {
  /*background-color: #eaeaea;*/
  padding-left: 10px;
  height: 50px;
  text-align: left;
  font-size: 40px;
  color: red;
  font-weight: 700;
  border-bottom: 1px solid;
  border-color: grey;
}

/* Create two columns/boxes that floats next to each other */
nav {
  float: left;
  width: 200px;
  min-height: 550px;
  background: #ccc;
  padding: 5px;
  /*border-right: 1px solid;*/
}

/* Style the list inside the menu */
nav ul {
  list-style-type: none;
  padding: 0;
}
nav li {
  padding: 5px;
  width: 190px;
  height: 35px;
  margin: 0px 0px 2px 0px;
  border: 1px solid;
}

article {
  float: left;
  padding: 20px;
  width: 80%;
  /*background-color: #f1f1f1;*/
}

/* Clear floats after the columns */
section:after {
  content: "";
  display: table;
  clear: both;
}

/* Style the footer */
footer {
  height: 40px;
  background-color: #000000;
  padding: 0;
  text-align: center;
  color: white;
  margin: 0;
  position: fixed;
  bottom: 0px;
  width: 100%;

}

a {
  color: grey;
  text-decoration: none; 
}
/* Responsive layout - makes the two columns/boxes stack on top of each other instead of next to each other, on small screens */
/*@media (max-width: 600px) {
  nav, article {
    width: 100%;
    height: auto;
  }*/

.widget{
  color: white;
  padding: 5px; 
  height:80px; 
  margin: 5px;
  background: red;
  border: 1px solid;
}
</style>
</head>

<body>
<header>
  Gates
</header>

<section>
  <nav>
    <ul>
      <a href="#"><li>London</li></a>
      <a href="#"><li>Paris </li></a>
      <a href="#"><li>Tokyo </li></a>
      <a href="#"><li>London</li></a>
      <a href="#"><li>Paris </li></a>
      <a href="#"><li>Tokyo </li></a>
      <a href="#"><li>London</li></a>
      <a href="#"><li>Paris </li></a>
      <a href="#"><li>Tokyo </li></a>
    </ul>
  </nav>
  <div class="row" style="display: flex;">
    
    <div class="col-md-2 widget">Widget </div>
    <div class="col-md-2 widget">Widget </div>
    <div class="col-md-2 widget">Widget </div>
    <div class="col-md-2 widget">Widget </div>
    <div class="col-md-2 widget">Widget </div>       
  </div>

 <div class="col-md-9">
  <div class="container">

  <div class="row">
    <div class="col-md-2 widget">
      1 of 3
    </div>
    <div class="col-md-2 widget">
      2 of 3
    </div>
    <div class="col-md-2 widget">
      3 of 3
    </div>
    <div class="col-md-2 widget">
      3 of 3
    </div>
  </div>
  </div>
</div>

  <article>
    <h1>London</h1>
    <p>London is the capital city of England. It is the most populous city in the  United Kingdom, with a metropolitan area of over 13 million inhabitants.</p>
    <p>Standing on the River Thames, London has been a major settlement for two millennia, its history going back to its founding by the Romans, who named it Londinium.</p>
  </article>
</section>

<footer>
  <p>I'm not moving from here!</p>
</footer>

</body>
</html>
