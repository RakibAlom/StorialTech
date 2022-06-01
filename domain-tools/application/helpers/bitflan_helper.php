<?php defined('BASEPATH') || exit('Access Denied.');

function echo_if( $text, $condition ) {
    if($condition)
        echo $text;
}

function public_url( $path = '' ) {
    return base_url( PUBLIC_RESOURCE_PATH . '/' . $path );
}

function is_serialized( $data, $strict = true ) {
    // If it isn't a string, it isn't serialized.
    if ( ! is_string( $data ) ) {
        return false;
    }
    $data = trim( $data );
    if ( 'N;' === $data ) {
        return true;
    }
    if ( strlen( $data ) < 4 ) {
        return false;
    }
    if ( ':' !== $data[1] ) {
        return false;
    }
    if ( $strict ) {
        $lastc = substr( $data, -1 );
        if ( ';' !== $lastc && '}' !== $lastc ) {
            return false;
        }
    } else {
        $semicolon = strpos( $data, ';' );
        $brace     = strpos( $data, '}' );
        // Either ; or } must exist.
        if ( false === $semicolon && false === $brace ) {
            return false;
        }
        // But neither must be in the first X characters.
        if ( false !== $semicolon && $semicolon < 3 ) {
            return false;
        }
        if ( false !== $brace && $brace < 4 ) {
            return false;
        }
    }
    $token = $data[0];
    switch ( $token ) {
        case 's':
            if ( $strict ) {
                if ( '"' !== substr( $data, -2, 1 ) ) {
                    return false;
                }
            } elseif ( false === strpos( $data, '"' ) ) {
                return false;
            }
            // Or else fall through.
        case 'a':
        case 'O':
            return (bool) preg_match( "/^{$token}:[0-9]+:/s", $data );
        case 'b':
        case 'i':
        case 'd':
            $end = $strict ? '$' : '';
            return (bool) preg_match( "/^{$token}:[0-9.E+-]+;$end/", $data );
    }
    return false;
}

function count_multi_array($mainarray) {
	$count = 0;
	foreach($mainarray as $subarray)
	   $count += count($subarray);
	   
	return $count;
}

function is_valid_url($url){
    if ($ret = parse_url($url)) {
        if (!isset($ret["scheme"])) {
            $url = "http://" . $url;
        }
    }

    return filter_var($url, FILTER_VALIDATE_URL);
}

function web_protocol() {
	return ((isset($_SERVER["HTTPS"]) && ($_SERVER["HTTPS"] === "on")) ? "https" : "http") . "://";
}

function get_domain($url) {
	if(preg_match("#https?://#", $url) === 0) {
		$url = web_protocol() . $url;
	}

	return strtolower(str_ireplace('www.', '', parse_url($url, PHP_URL_HOST)));
}

function get_tld($domain) {
	$domain = "https://".$domain;
	$ext = pathinfo($domain, PATHINFO_EXTENSION);
	return "." . $ext;
}

function truncate($string,$length)  {
	$string = trim(strip_tags($string));
	if (strlen($string) > $length) {
		$string = substr($string,0,$length);
	}
	return $string;
}

function filter_keyword($keyword) {
	$keyword = strtolower($keyword);
	$keyword = str_replace('www.','',$keyword); 
	$keyword = preg_replace("/[^A-Za-z0-9.-]/", "", $keyword);
	$keyword = preg_replace("~-{2,}~", "-", $keyword);
	$keyword = preg_replace("/\.{2,}/", ".", $keyword);
	$keyword = trim($keyword,".-");
    return $keyword;
}

function get_remote_contents($url) {
	$result = false;
	$USER_AGENT = $_SERVER['HTTP_USER_AGENT'];
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_USERAGENT, $USER_AGENT);
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
	curl_setopt($ch, CURLOPT_URL, $url);
	$result = curl_exec($ch);
	$httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
	curl_close($ch);
	unset($ch);
	return $result;
}

function tld_to_class($tld) {
    $class = str_replace(".","_",$tld);
    return trim($class); 
}

function class_to_tld($class) {
    $tld = str_replace("_",".",$class);
    return trim($tld); 
}

function convert_price( $value ) {
    $ci = &get_instance();

    return $ci->options->get('tld-price-status') ? $ci->CurrencyModel->convert( $value ) : null;
}

function install_path() {
	return stripslashes(web_protocol() . $_SERVER["HTTP_HOST"] . preg_replace('{/$}', '', dirname($_SERVER['SCRIPT_NAME'])) . "/");
}

function alpinify($data) {
    return str_replace(
        ["'", '"'], ["\'", "'"],
        json_encode($data)
    );
}