<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../resources/css/style.css">
    <title>Page D'acceuil</title>
</head>
<body>
    <header>
        <div class="nav-left">
            <a class="text-logo" href="http://localhost">TELEMATOS</a>
        </div>
        <div class="nav-right">
            <nav class="navMenu">
                <a class="home" href="" style="width: 80px;">Home</a>
                <a class="mon-materiel" href="">Mon Matériel</a>
                <a class="Compte" href="" style="width: 80px;">Admin</a>
                <div class="dot"></div>
            </nav>
        </div>
        <div class="bp-general">
            <div class="bp-inscr">
                <form action=""><button class="bp">S'inscrire</button></form>
            </div>
            <div class="bp-conn">
                <form action=""><button class="bp">Se Connecter</button></form>
            </div>
        </div>
    </header>

<style>
/* RESET CSS */
html, body, div, span, applet, object, iframe,
h1, h2, h3, h4, h5, h6, p, blockquote, pre,
a, abbr, acronym, address, big, cite, code,
del, dfn, em, img, ins, kbd, q, s, samp,
small, strike, strong, sub, sup, tt, var,
b, u, i, center,
dl, dt, dd, ol, ul, li,
fieldset, form, label, legend,
table, caption, tbody, tfoot, thead, tr, th, td,
article, aside, canvas, details, embed, 
figure, figcaption, footer, header, hgroup, 
menu, nav, output, ruby, section, summary,
time, mark, audio, video {
	margin: 0;
	padding: 0;
	border: 0;
	font-size: 100%;
	font: inherit;
	vertical-align: baseline;
}

article, aside, details, figcaption, figure, 
footer, header, hgroup, menu, nav, section {
	display: block;
}
body {
	line-height: 1;
}
ol, ul {
	list-style: none;
}
blockquote, q {
	quotes: none;
}
blockquote:before, blockquote:after,
q:before, q:after {
	content: '';
	content: none;
}
table {
	border-collapse: collapse;
	border-spacing: 0;
}

/* début du css*/
@import url("https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap");

body{
    height: 100%;
}

.navMenu{
    margin-top: 10px;
    font-family: "Montserrat", sans-serif;
}

.mon-materiel{
    margin-right: 50px;
}

.home{
    margin-right: 20px;
}

.navMenu a {
    color: #3f3e35;
    text-decoration: none;
    font-size: 1.2em;
    text-transform: uppercase;
    font-weight: 500;
    display: inline-block;
    width: 160px;
    -webkit-transition: all 0.2s ease-in-out;
    transition: all 0.2s ease-in-out;
}

.navMenu a:hover {
    color: #33396c;
}

.navMenu .dot {
    width: 6px;
    height: 6px;
    background: #33396c;
    border-radius: 50%;
    opacity: 0;
    -webkit-transform: translateX(30px);
    transform: translateX(30px);
    -webkit-transition: all 0.2s ease-in-out;
    transition: all 0.2s ease-in-out;
}

.navMenu a:nth-child(1):hover ~ .dot {
  -webkit-transform: translateX(30px);
  transform: translateX(30px);
  -webkit-transition: all 0.2s ease-in-out;
  transition: all 0.2s ease-in-out;
  opacity: 1;
}

.navMenu a:nth-child(2):hover ~ .dot {
  -webkit-transform: translateX(185px);
  transform: translateX(185px);
  -webkit-transition: all 0.2s ease-in-out;
  transition: all 0.2s ease-in-out;
  opacity: 1;
}

.navMenu a:nth-child(3):hover ~ .dot {
  -webkit-transform: translateX(350px);
  transform: translateX(350px);
  -webkit-transition: all 0.2s ease-in-out;
  transition: all 0.2s ease-in-out;
  opacity: 1;
}

.navMenu a:nth-child(4):hover ~ .dot {
  -webkit-transform: translateX(250px);
  transform: translateX(285px);
  -webkit-transition: all 0.2s ease-in-out;
  transition: all 0.2s ease-in-out;
  opacity: 1;
}

header{
    display: flex;
    margin-top: 20px;
    height: 50px;
    align-items: center;
    margin-bottom: 70px;
}

.nav-right{
    width: 35%;
}

.nav-left{
    width: 50%;
}

.text-logo > a{
    margin-top: 5px;
}

.text-logo{
    text-decoration: none;
    margin-left: 20px;  
    font-family: "Montserrat", sans-serif;
    font-size: 1.8em;
    font-weight: 500;
    color: rgb(27, 0, 30);
}

.bp{
    display: inline-block;
    outline: 0;
    cursor: pointer;
    border-radius: 5px;
    border: 2px solid #33396c;
    color: #33396c;
    background: 0 0;
    padding: 8px;
    box-shadow: rgba(0, 0, 0, 0.07) 0px 2px 4px 0px, rgba(0, 0, 0, 0.05) 0px 1px 1.5px 0px;
    font-weight: 700;
    font-size: 16px;
    height: 40px;
}

.bp:hover{
    background-color: #33396c;
    color: #fff;
}

.bp-general{
    width: 23%;
    display: flex;
}

.bp-inscr{
    margin-left: 10px;
    margin-right: 10px;
}

.bp-general form {
    color: #f6f4e6;
    text-decoration: none;
    font-size: 1.2em;
    text-transform: uppercase;
    font-weight: 500;
    display: inline-block;
    width: 130px;
    -webkit-transition: all 0.2s ease-in-out;
    transition: all 0.2s ease-in-out;
}

.bp-general form:hover {
    color: #33396c;
}

</style>
