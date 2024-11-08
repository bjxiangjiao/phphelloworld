<?php
$domains = include 'domains_list.php';

function get_cert_info($domain){
    $context = stream_context_create(['ssl' => [
        'capture_peer_cert' => true,
        'capture_peer_cert_chain' => true,
    ],
    ]);

    $client = stream_socket_client("ssl://".$domain.":443", $errno, $errstr, 30, STREAM_CLIENT_CONNECT, $context);
    if($client==false) {
        return false;
    }
    $params = stream_context_get_params($client);
    $cert = $params['options']['ssl']['peer_certificate'];
    $cert_info = openssl_x509_parse($cert);
    return $cert_info;
}
$now = time();
$now_str = date('Y-m-d');
$data = [];
foreach ($domains as $key=>$domain) {
    $cert_info = get_cert_info($domain);
    $validTo_time_t = $cert_info['validTo_time_t'];
    $validTo_time_d = date('Y-m-d', $validTo_time_t);
    $day = '';
    $count_down = 0;
    if ($now>$validTo_time_t){
        $day = 0;
    }else{
        $datetime1 = new DateTime($now_str);
        $datetime2 = new DateTime($validTo_time_d);
        $interval = $datetime1->diff($datetime2);
        $day = $interval->format('%a');
        if (intval($day)>0 && intval($day)<=10){
            $count_down = 1;
        }
    }

    $data[$key]['url'] = $domain;
    $data[$key]['exp_date'] =$validTo_time_d;
    $data[$key]['exp_day'] = intval($day);
    $data[$key]['count_down'] = $count_down;
}
usort($data, function($a, $b) {
    return $a['exp_day'] - $b['exp_day'];
});

include 'view_show_url.php';