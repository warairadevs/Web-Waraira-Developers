<?php

if(isset($_POST['email'])) {



    // EDIT THE 2 LINES BELOW AS REQUIRED

    $email_to = "hola@warairadevs";





    function died($error) {

        // your error code can go here

        echo "We are very sorry, but there were error(s) found with the form you submitted. ";

        echo "These errors appear below.<br /><br />";

        echo $error."<br /><br />";

        echo "Please go back and fix these errors.<br /><br />";

        die();

    }



    // validation expected data exists

    if(!isset($_POST['name']) ||

        !isset($_POST['email']) ||

        !isset($_POST['subject']) ||

        !isset($_POST['comments'])) {

        died('Disculpa, pero existen algunos datos incorrectos.');

    }



    $name = $_POST['first_name']; // required

    $email_from = $_POST['email']; // required

    $comments = $_POST['comments']; // required

    $email_subject = $_POST['subject']; //required

    $error_message = "";

    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';

  if(!preg_match($email_exp,$email_from)) {

    $error_message .= 'Uups, el email debe ser valido.<br />';

  }

    $string_exp = "/^[A-Za-z .'-]+$/";

  if(!preg_match($string_exp,$first_name)) {

    $error_message .= 'Algun nombre alienigena?.<br />';

  }

  if(!preg_match($string_exp,$subject)) {

    $error_message .= 'Se mas especifico en el asunto :).<br />';

  }

  if(strlen($comments) < 2) {

    $error_message .= 'Queremos conocerte, escribe un poco mas!.<br />';

  }

  if(strlen($error_message) > 0) {

    died($error_message);

  }

    $email_message = "El mensaje no es valido: .\n\n";



    function clean_string($string) {

      $bad = array("content-type","bcc:","to:","cc:","href");

      return str_replace($bad,"",$string);

    }



    $email_message .= "Nombre: ".clean_string($name)."\n";

    $email_message .= "Email: ".clean_string($email_from)."\n";

    $email_message .= "Comments: ".clean_string($comments)."\n";





// create email headers

$headers = 'From: '.$email_from."\r\n".

'Reply-To: '.$email_from."\r\n" .

'X-Mailer: PHP/' . phpversion();

@mail($email_to, $email_subject, $email_message, $headers);

?>



<!-- include your own success html here -->



Thank you for contacting us. We will be in touch with you very soon.



<?php

}

?>
