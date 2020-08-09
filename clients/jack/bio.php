<?php
session_start();
date_default_timezone_set('America/Los_Angeles');
$under_construction = false;
$live = false;
include_once('scripts/contact.php');
include_once('parts/header_part.php');
?>

<body>

<?php include_once('parts/masthead.php'); ?>
<style>
    table {
        width:90%;
        margin-left:5%;
    }
td {
    text-align:left;
    padding-left:10px;
    border-bottom:1px solid rgba(100,0,0,.15);
    padding-bottom:4px;
    padding-top:4px;
    text-transform: capitalize;
}
.titleCell {
    font-weight: bold;
    text-transform: uppercase;
    padding-left:20px;
    color:black;

}
.biotable {
    margin-top:40px;
    width:90%;
    margin-left:auto;
    margin-right:auto;
    /* border:1px solid rgba(100,0,0,.5); */
    border-radius:4px;
    background-color:rgba(255,255,255,.5);
    padding:20px;
}
.biotable td {
    color:black;
}
.biotable tr {
}
</style>

<div class='bioContent' id='mainContent'>
    <br>
<h1>Biography of Jack Davis</h1>


<h2>Exhibitions, Performances, Fashion Shows, Benefits</h2>

<table class='biotable'>
<tr>
    <td>2019</td>
    <td class='titleCell'>FAGGOTS by Jack Davis</td>
    <td>one person show, Center for Sex & Culture</td>
</tr>
<tr>
    <td></td>
    <td class='titleCell'>Art + Pride Exhibit</td>
    <td>group show, Harvey Milk Photo Center</td>
</tr>
<tr>
    <td>2018</td>
    <td class='titleCell'>High Tea with Gravity</td>
    <td>benefit performance, CounterPulse, co-produced with Jess Curtis</td>
</tr>
<tr>
    <td>2017</td>
    <td class='titleCell'>Witches around the Labyrinth</td>
    <td>performance/ritual, Land’s End labyrinth, produced</td>
</tr>
<tr>
    <td></td>
    <td class='titleCell'>There is No Going Back</td>
    <td>performance, Summer of Love Party, AIDS Grove, produced</td>
</tr>
<tr>
    <td></td>
    <td class='titleCell'>There is No Going Back</td>
    <td>performance, Faerie Freedom Village, produced</td>
</tr>
<tr>
    <td>2016</td>
    <td class='titleCell'>Faggots around the Labyrinth</td>
    <td>performance/ritual, Land’s End labyrinth, produced</td>
</tr>
<tr>
    <td>2015</td>
    <td class='titleCell'>Nelly Frittata</td>
    <td>performance, The Center for Sex & Culture, co-produced with TT Baum</td>
</tr>
<tr>
    <td>2014</td>
    <td class='titleCell'>Symmetry Project 24 B</td>
    <td>performance, Folsom Street Fair, co-produced with Jess Curtis</td>
</tr>
<tr>
    <td></td>
    <td class='titleCell'>Fashion As Entertainment</td>
    <td>performance fashion show, Home Theater Festival, co-produced with TT Baum</td>
</tr>
<tr>
    <td>2013</td>
    <td class='titleCell'>Normal</td>
    <td>benefit for the Illinois State University LGBT Student Support Fund, Dance Mission, produced</td>
</tr>
<tr>
    <td>2012</td>
    <td class='titleCell'>The Dick Show Art Exhibit</td>
    <td>group show, The Center for Sex & Culture, curated</td>
</tr>
<tr>
<td>2011</td>
<td class='titleCell'>Symmetry Project - Naked Men in Heels</td>
<td>performance, Folsom Street Fair co-produced with Jess Curtis</td>
</tr> 
<tr>
<td></td>
<td class='titleCell'>A Penis Show</td>
<td>one person show, Magnet</td>
</tr>
<tr>
<td></td>
<td class='titleCell'>In Bed with James Broughton</td>
<td>Big Joy fundraiser, SF Art Institute, produced</td>
</tr>
<tr>
<td></td>
<td class='titleCell'>Blood Art</td>
<td>performance sewing, Cell Space co-produced with Keith Hennessy</td>
</tr>
<tr>
    <td>2009</td>
    <td class='titleCell'>Ritual and Redemption: the first Project Nunway</td>
    <td>fashion show/performance, YBCA, co-produced</td>
</tr>   
<tr>
    <td>2007</td>
    <td class='titleCell'>A Show of Penises</td>
    <td>one person show, studio of Mark Chester</td>
</tr>   
<tr>
    <td>2002</td>
    <td class='titleCell'>Retrospection</td>
    <td>one person show, 848 Community </td>
</tr> 
<tr>
    <td>1996</td>
    <td class='titleCell'>Sex Work</td>
    <td>group show, 848 Community Space, curated</td>
</tr>  
<tr>
    <td>1993</td>
    <td class='titleCell'>Dick Show</td>
    <td>group show, 848 Community Space, curated</td>
</tr>    
</table>
</div>



</body>
</html>
