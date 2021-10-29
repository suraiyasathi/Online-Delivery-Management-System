<?php 

if(isset($_POST["div"])){     
    $div=$_POST['div'];  
    echo '<option value="">জেলা নির্বাচন করুন</option>'; 

    if($div=='Dhaka')
    {
        echo '<option value="Dhaka">Dhaka</option>'; 
        echo '<option value="Narayangonj">Narayangonj</option>'; 
        echo '<option value="Gazipur">Gazipur</option>'; 
    } 
    else if($div=='Barishal')
    {
        echo '<option value="Barishal">Barishal</option>'; 
        echo '<option value="Patuakhali">Patuakhali</option>';         
    }  
    
}
?>