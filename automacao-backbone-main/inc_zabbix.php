<?php
function get_graph_image_by_id($graphid, $width, $height, $period) {
        $z_server = 'http://10.5.1.58/zabbix/';
        $z_user   = 'marlos';
        $z_pass   = 'acesso01';

        $z_tmp_cookies = "";
        $z_url_index   = $z_server . "index.php";
        $z_url_graph   = $z_server . "chart2.php";
        $z_login_data = "name=" . $z_user . "&password=" . $z_pass . "&enter=Sign in&autologin=1&request=";

        $filename_cookie = $z_tmp_cookies . "zabbix_cookie_" . $graphid . ".txt";

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $z_url_index);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_BINARYTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $z_login_data);
        curl_setopt($ch, CURLOPT_COOKIEJAR, $filename_cookie);
        curl_setopt($ch, CURLOPT_COOKIEFILE, $filename_cookie);

        curl_exec($ch);
        curl_setopt($ch, CURLOPT_URL, $z_url_graph . "?graphid=" . $graphid . "&width=" . $width . "&height=" . $height . "&period=" . $period);
        
        $output = curl_exec($ch);
        curl_close($ch);
        // delete cookie
        //unlink($filename_cookie);
        return base64_encode($output);
    } 

    ?>