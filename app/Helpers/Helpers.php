<?php

    /**
     * Get the base URL
     * @return string
     */
    function baseUrl(){
        return BASE_URL;
    }

    /**
     *function to format the print of arrays
     * @param $data
     * @return string
     */
    function formatData($data){
        $format = print_r('<pre>');
        $format .= print_r($data);
        $format .= print_r('</pre>');
        return $format;
    }

    /**
     * Funtion for sanitize text inputs
     * @param $string
     * @return string|string[]|null
     */
    function strClean($string){
         $cleanString = preg_replace(['/\s+/','/^\s|\s$/'],[' ',''],$string);
         $cleanString = trim($cleanString); //elimina espacios en blanco
         $cleanString = stripcslashes($cleanString); // elimina las \ invertidas
         $cleanString = str_replace('<script>','',$cleanString);
         $cleanString = str_replace('</script>','',$cleanString);
         $cleanString = str_replace('<script src>','',$cleanString);
         $cleanString = str_replace('<script type=>','',$cleanString);
         $cleanString = str_replace('SELECT * FROM','',$cleanString);
         $cleanString = str_replace('DELETE FROM','',$cleanString);
         $cleanString = str_replace('INSERT INTO','',$cleanString);
         $cleanString = str_replace('SELECT COUNT(*) FROM','',$cleanString);
         $cleanString = str_replace('DROP TABLE','',$cleanString);
         $cleanString = str_replace("OR '1'='1'",'',$cleanString);
         $cleanString = str_replace('OR "1"="1','',$cleanString);
         $cleanString = str_replace('OR ´1´ = ´1´','',$cleanString);
         $cleanString = str_replace('is NULL; --','',$cleanString);
         $cleanString = str_replace('LIKE"','',$cleanString);
         $cleanString = str_replace("LIKE'",'',$cleanString);
         $cleanString = str_replace("LIKE´",'',$cleanString);
         $cleanString = str_replace("OR 'a'='a'",'',$cleanString);
         $cleanString = str_replace('OR "a"="a','',$cleanString);
         $cleanString = str_replace("OR ´a´=´a",'',$cleanString);
         $cleanString = str_replace("--",'',$cleanString);
         $cleanString = str_replace('^','',$cleanString);
         $cleanString = str_replace('[','',$cleanString);
         $cleanString = str_replace(']','',$cleanString);
         $cleanString = str_replace('==','',$cleanString);
         return $cleanString;
    }

    /**
     * Function to generte an aletory password
     * @param int $lenght
     * @return  string
     */
    function passGenerator($lenght = 10){
        $password = '';
        $passLenght = $lenght;
        $string = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890";
        $stringLenght = strlen($string);

        for ($i=1; $i<=$passLenght; $i++){
            $pos = rand(0,$stringLenght-1);
            $password .= substr($string,$pos,1);
        }
        return $password;
    }

    /**
     * Generate a random token
     * @return string
     */
    function token(){
        try {
            $r1 = bin2hex(random_bytes(10));
            $r2 = bin2hex(random_bytes(10));
            $r3 = bin2hex(random_bytes(10));
            $r4 = bin2hex(random_bytes(10));
            $token = $r1 .'-'. $r2 .'-'. $r3 .'-'. $r4;
            return $token;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    function formatCurrency($amount){
        $amount = number_format($amount,2,SPD,SPM);
        return $amount;
    }


