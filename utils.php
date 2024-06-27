<?php

function some_item_is_empty(array $items) {
    if( !is_array($items) ) return true;

    $emptyItems = array_filter($items, function($item) {
        return empty($item);
    });

    return count($emptyItems) > 0;
}

function dd() {
    $args = func_get_args();

    foreach ($args as $arg) {
        var_dump($arg);
    }

    die();
}

function get_url(){
    $url = sprintf(
        "%s://%s",
        isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off' ? 'https' : 'http',
        $_SERVER['SERVER_NAME']
      );
    
      // Remover tudo após a primeira barra '/'
      $request_uri = $_SERVER['REQUEST_URI'];
      $pos = strpos($request_uri, '/', 1); // Ignora a primeira barra '/'
      if ($pos !== false) {
        $request_uri = substr($request_uri, 0, $pos);
      }

      return $url . $request_uri . '/';
}

function request_blocker()
{
    $dir = 'requestBlocker/';
    $rules = [
        [
            'requests' => 5,
            'sek' => 10,
            'blockTime' => 15
        ],
        [
            'requests' => 10,
            'sek' => 30,
            'blockTime' => 20
        ],
        [
            'requests' => 200,
            'sek' => 60 * 60,
            'blockTime' => 60 * 10
        ],
    ];

    $time    = time();
    $blockIt = [];
    $user    = [];

    $user[] = isset($_SERVER['REMOTE_ADDR']) ? str_replace($_SERVER['REMOTE_ADDR'],'::','') : 'IP_unknown';
    $user[] = isset($_SERVER['HTTP_USER_AGENT']) ? $_SERVER['HTTP_USER_AGENT'] : '';

    $botFile = $dir . substr($user[0], 0, 8) . '_' . substr(md5(join('', $user)), 0, 5) . '.txt';

    if (file_exists($botFile)) {
        $file   = file_get_contents($botFile);
        $client = unserialize($file);
    } else {
        $client = [];
        $client['time'][$time] = 0;
    }

    # Set/Unset Blocktime for blocked Clients
    if (isset($client['block'])) {
        foreach ($client['block'] as $ruleNr => $timestampPast) {
            $elapsed = $time - $timestampPast;
            if (($elapsed ) > $rules[$ruleNr]['blockTime']) {
                unset($client['block'][$ruleNr]);
                continue;
            }
            $blockIt[] = 'Block active for Rule: ' . $ruleNr . ' - unlock in ' . ($elapsed - $rules[$ruleNr]['blockTime']) . ' Sec.';
        }
        if (!empty($blockIt)) {
                return $blockIt;
        }
    }

    if (!isset($client['time'][$time])) {
        $client['time'][$time] = 1;
    } else {
        $client['time'][$time]++;
    }

    $min = [0];
    foreach ($rules as $ruleNr => $v) {
        $i            = 0;
        $tr           = false;
        $sum[$ruleNr] = 0;
        $requests     = $v['requests'];
        $sek          = $v['sek'];
        foreach ($client['time'] as $timestampPast => $count) {
            if (($time - $timestampPast) < $sek) {
                $sum[$ruleNr] += $count;
                if ($tr == false) {
                    $min[] = $i;
                    unset($min[0]);
                    $tr = true;
                }
            }
            $i++;
        }

        if ($sum[$ruleNr] > $requests) {
            $blockIt[]                = 'Limit : ' . $ruleNr . '=' . $requests . ' requests in ' . $sek . ' seconds!';
            $client['block'][$ruleNr] = $time;
        }
    }
    $min = min($min) - 1;

    foreach ($client['time'] as $k => $v) {
        if (!($min <= $i)) {
            unset($client['time'][$k]);
        }
    }
    $file = file_put_contents($botFile, serialize($client));

    return $blockIt;
}
