<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;  
    use PHPMailer\PHPMailer\SMTP;
    
    require 'bin/vendor/phpmailer/src/Exception.php';
    require 'bin/vendor/phpmailer/src/PHPMailer.php';
    require 'bin/vendor/phpmailer/src/SMTP.php';
    
    
    function removeElementsByTagName($tagName, $document) {
      $nodeList = $document->getElementsByTagName($tagName);
      for ($nodeIdx = $nodeList->length; --$nodeIdx >= 0; ) {
        $node = $nodeList->item($nodeIdx);
        $node->parentNode->removeChild($node);
      }
    }
    
    function just_text($str) {
        $str = strip_tags($str);
        $str = str_replace(' ','',$str);
        $doc = new DOMDocument();

        // load the HTML into the DomDocument object (this would be your source HTML)
        $doc->loadHTML($str);
        
        removeElementsByTagName('script', $doc);
        removeElementsByTagName('style', $doc);
        //removeElementsByTagName('link', $doc);
        
        // output cleaned html
        return $doc->saveHtml();
        
        
    }

    class SendGrid_Mail {
        function send($from, $to, $subject, $body, $type = "text/plain", $from_name = "Support") {
            global $app;

            $this->from = $from;
            $this->to = $to;
            $this->subject = $subject;
            $this->body = $body;
            $this->type = $type;
            $this->from_name = $from_name;
            
            $response = 0;

            
            if ( $app->project_info['mode'] == "production" ) {
                $response = $this->use_api();
            } else {
                $response = $this->use_PhpMailer();
            }
            
            return $response;
        }

        private function use_PhpMailer() {
            global $app;

            $mail = new PHPMailer(true);

            try {
                // //Server settings
                 $mail->SMTPDebug = 0;                      //Enable verbose debug output
                 $mail->isSMTP();                                            //Send using SMTP
                 $mail->Host       = 'mail.esecurtis.com';                     //Set the SMTP server to send through
                 $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                 $mail->Username   = 'no-reply@esecurtis.com';                     //SMTP username
                 $mail->Password   = 'zapwireisasaas';                               //SMTP password
                 $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
                 $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

                //Recipients
                $mail->setFrom($this->from, $this->from_name);   //Add a recipient
                $mail->addAddress($this->to);               //Name is optional
                $mail->addReplyTo($app->project_info['support_email'], 'Information');

                //Content
                $mail->isHTML(true);                                  //Set email format to HTML
                $mail->Subject = $this->subject;
                $mail->Body    = $this->body;
                $mail->AltBody = just_text($this->body);

                if($mail->send()){
                    return 1;
                } else {
                    return 0;
                }
                
            } catch (Exception $e) {
                //echo $this->to;
                //echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }
        }

        private function use_api(){
            $postfields = [
                "personalizations" => [
                    [
                        "to" => [
                            [
                                "email" => $this->to
                            ]
                        ],
                        "subject" => $this->subject
                    ]
                ],
                "from" => [
                    "email" => $this->from,
                    "name" => $this->from_name
                ],
                "content" => [
                    [
                        "type" => $this->type,
                        "value" => $this->body
                    ]
                ]
            ];

            $curl = curl_init();

            curl_setopt_array($curl, [
                CURLOPT_URL => "https://rapidprod-sendgrid-v1.p.rapidapi.com/mail/send",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "POST",
                CURLOPT_POSTFIELDS => json_encode($postfields),
                CURLOPT_HTTPHEADER => [
                    "X-RapidAPI-Host: rapidprod-sendgrid-v1.p.rapidapi.com",
                    "X-RapidAPI-Key: 2d186ce216msh1d00b63a4fd34d1p1655cfjsn1c7914542d9d",
                    "content-type: application/json"
                ],
            ]);

            //write the CURLOPT_POSTFIELDS AS PHP ARRAY 
            

            $response = curl_exec($curl);
            $err = curl_error($curl);

            curl_close($curl);

            if ($err) {
                return 0;
            } else {
                $response_json_error = (json_decode($response, TRUE))['errors'];

                if(count($response_json_error) < 1) {
                    return 1;
                } else {
                    return 0;
                }
            }
        }
    }
?>