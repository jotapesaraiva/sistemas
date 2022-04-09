<?php
defined('BASEPATH') or exit('No direct script access allowed');

# API Info
// $config['api_url'] = 'https://x-oc-zabbix.sefa.pa.ipa/zabbix/api_jsonrpc.php';
//$config['api_url'] = 'http://10.3.3.184/zabbix/api_jsonrpc.php';

$config['api_url'] = 'https://zabbix.sefa.pa.gov.br/zabbix/api_jsonrpc.php';
$config['api_user'] = 'zbx3';
// $config['api_pass'] = 'MTJhZG1pbjE5';
//$config['api_pass'] = 'ISFaQGJiMXh4';
$config['api_pass'] = '!!Z@bb1xx';
// $api_pass = 'MTJhZG1pbjE5';12admin19
# Time in milliseconds.  1000 = 1 second
$config['reload_time'] = 30000;
# path on web server
$config['context'] = '/zabbix-dash2';
# Host Group filter in Regex
// $host_group_filter = '/^Dash\//';
$config['host_group_filter'] = '/./';

/* End of file zabbix.php */
/* Location: ./application/config/zabbix.php */