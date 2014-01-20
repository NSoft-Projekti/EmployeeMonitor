<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Insert title here</title>
<link type="text/css" href="log_korisnika.css" rel="stylesheet"/>
<style>
ul
{
list-style-type:none;
margin:0;
padding:0;
overflow:hidden;
font-size:18px;
}
li
{
float:left;
}
a:link,a:visited
{
    display:block;
    width:230px;
    font-weight:bold;
    color:black;
    background-color:#CBD9DB;
    text-align:center;
    padding:4px;
    text-decoration:none;
}
a:hover,a:active
{
    background-color:#2DB4C9;
}
ul ul {
    display: none;
}

ul li:hover > ul {
    display: block;
}
text-transform: lowercase;
ul li {
    float: left;
}

</style>
</head>
<body>
<div class="container">
	<div class="header">
		
<ul>

<li><a href="update_zaposlenik.php">Personal information</a></li>
<li><a href="#pregled_vremena">Review of working time</a></li>

</ul>
		
	</div>
	<div class="registracija">
	</div>
</div>
</body>
</html>