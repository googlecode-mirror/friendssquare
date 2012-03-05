<?php
    session_start();
?>
<html>
<head>
		<link rel="stylesheet" type="text/css" href="style.css" />
        <link rel="stylesheet" type="text/css" href="anmelden.css" />
        <meta http-equiv="Content-Type" content="text-html; charset=ISO-8859-1" />
        <meta http-equiv="cache-control" content="no-cache"	/>
</head>
<body onclick="none();">
<script language="javascript" type="text/javascript">
var XMLHTTP = null;
if (window.XMLHttpRequest) {
  XMLHTTP = new XMLHttpRequest();
} else if (window.ActiveXObject) {
  try {
    XMLHTTP = new ActiveXObject("Msxml2.XMLHTTP");
  } catch (ex) {
    try {
      XMLHTTP = new ActiveXObject("Microsoft.XMLHTTP");
    } catch (ex) {
    }
  }
}
//http://www.homepage-total.de/php/ajax_suche.php
function none(){
    document.getElementById('test').style.display= "none";
/*     if (document.getElementById('frameBild').style.display=="block")
    {
        document.getElementById('frameBild').style.display= "none";
    } */
    
}
function suche() {
 if (document.getElementById("freundeingabe").value.length >= 1) {
  var suchtext = document.getElementById("freundeingabe").value;
  XMLHTTP.open("GET", "function.php?s=UserAnzeigen&v=" + suchtext, true);
  XMLHTTP.onreadystatechange = DatenAusgeben;
  XMLHTTP.send(null);
 }else
 {
     document.getElementById("freundeingabe").value='';
     var suchtext = document.getElementById("freundeingabe").value;
  XMLHTTP.open("GET", "function.php?s=UserAnzeigen", true);
  XMLHTTP.onreadystatechange = DatenAusgeben;
  XMLHTTP.send(null);
 }
}
function DatenAusgeben() {
 if (XMLHTTP.readyState == 4) {
  var inhalt=document.getElementById('test');
  console.log(inhalt);
  if (document.getElementById("freundeingabe").value.length >= 1) {
   if (inhalt.style.display == "none") {
  inhalt.style.display = "block";
  }
  }else
  {
   inhalt.style.display = "none";
  }
//  inhalt.style.display='block';
  document.getElementById("test").innerHTML = XMLHTTP.responseText;
 }
} 
</script>
    <?php
            if(isset($_SESSION['username']))
			{
			   echo "<div id=\"framecontentTop\">";	           
	               include 'top.php';                   	           
	           echo "</div>";

	           echo "<div id=\"barTop\">";
	           echo "<div class=\"friend_add\">";
	               include 'bartop.php';
	           echo "</div>";
               echo "</div>";

	           echo "<div id=\"all\">";
	           
	                echo "<div class=\"search\">";
	                   echo "<form action=\"javascript:suche();\">";
	                   //echo "<input type=\"text\" id=\"freundeingabe\" onkeyup=\"suche();\">";
	                   echo "<input type=\"text\" autocomplete=\"off\" spellcheck=\"false\" id=\"freundeingabe\" class=\"friendsearch\" placeholder=\"Suche\" onclick=\"suche();\" onkeyup=\"suche();\">
                       ";
	                   echo "</form>";
                    echo "</div>";
                    echo "<div id=\"test\" class=\"searchFenster\" style=\"display: none;\" >";
                    echo "</div>";
                    
				    
				    echo "<div id=\"framecontentLeft\">";
                        include 'left.php';
                    echo "</div>";
		
                    echo "<div id=\"framecontentRight\">";
			             include 'right.php';
		            echo "</div>";
		            
		            echo "<div id=\"framecontentmid\">";
                        $seite=$_REQUEST['seite'];
				        include $seite;                        		
		            echo "</div>";
		            		            
		      echo "</div>";
		            
			}
            else
            {
                include 'login.php';
            }    
     ?>
	
</body>
</html>