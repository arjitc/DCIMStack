<?php
            ob_clean();
            header("Content-Type: image/png");
            $url = "http://nms.noc.crowncloud.net/api/v0/devices/yeti/ports/sfp1/port_bits";
            $ch = curl_init($url);

            curl_setopt($ch, CURLOPT_URL, $url);

            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_TIMEOUT, '3');
            curl_setopt($ch, CURLOPT_HTTPHEADER, array('X-Auth-Token: 5ba8807a2191d370cdfe013927b1e329'));
            $content = trim(curl_exec($ch));
            curl_close($ch);
            print $content;
            ?>