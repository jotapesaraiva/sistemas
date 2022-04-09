<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Weblogic {

    // http://10.3.1.17:7001/management/tenant-monitoring/applications/nfae-job%234.0.200
        public function getApps($server_ip = NULL){
            /* Init cURL resource */
            $ch = curl_init();
            /* Endpoint */
            if(!empty($server_ip)){
                curl_setopt($ch, CURLOPT_URL, "http://".$server_ip.":7001/management/tenant-monitoring/applications");
            }else{
                curl_setopt($ch, CURLOPT_URL, "http://10.3.3.125:7001/management/tenant-monitoring/applications");
            }
            /* Set JSON data to POST */
            curl_setopt($ch, CURLOPT_USERPWD, "joao.saraiva:01admin21");//"adriano.melo:Cel82918111");
            curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
            /* Define content type */
            curl_setopt($ch, CURLOPT_HTTPHEADER, array('Accept:application/json'));
            /* Return json */
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $output = curl_exec($ch);
            if($output === false) {
                $returnCode = (int)curl_getinfo($ch, CURLINFO_HTTP_CODE);
                echo 'Curl error: ' . curl_error($ch) . "Code erro: " . $returnCode;
                die;
            }
            curl_close($ch);
            $array_php = json_decode(trim($output),TRUE);
            // vd($array_php);
            // vd($array_php['body']['items']);
            return $array_php['body']['items'];
        }

    public function getServers($server_ip = NULL){
        $ch = curl_init();
        if(!empty($server_ip)){
            // curl_setopt($ch, CURLOPT_URL, "http://".$server_ip.":7001/management/wls/latest/servers");
            curl_setopt($ch, CURLOPT_URL, "http://".$server_ip.":7001/management/tenant-monitoring/servers");
        } else {
            curl_setopt($ch, CURLOPT_URL, "http://10.3.3.125:7001/management/tenant-monitoring/servers");
        }

        curl_setopt($ch, CURLOPT_USERPWD, "joao.saraiva:01admin21");//"adriano.melo:Cel82918111");
        curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        /* Define content type */
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Accept:application/json'));
        /* Return json */
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        $output = curl_exec($ch);
        if($output === false) {
            $returnCode = (int)curl_getinfo($ch, CURLINFO_HTTP_CODE);
            echo 'Curl error: ' . curl_error($ch) . "Code erro: " . $returnCode;
            die;
        }
        curl_close($ch);
        // echo $output;
        // vd($output);
        $array_php = json_decode(trim($output),TRUE);
        // vd($array_php);
        // vd($array_php['body']['items']);
        return $array_php['body']['items'];
    }


    public function getDataSources($server_ip = NULL){
        $ch = curl_init();
        if(!empty($server_ip)){
            curl_setopt($ch, CURLOPT_URL, "http://".$server_ip.":7001/management/tenant-monitoring/datasources");
        } else {
            curl_setopt($ch, CURLOPT_URL, "http://10.3.3.125:7001/management/tenant-monitoring/datasources");
        }
        curl_setopt($ch, CURLOPT_USERPWD, "joao.saraiva:01admin21");//"adriano.melo:Cel82918111");
        curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        /* Define content type */
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Accept:application/json'));
        /* Return json */
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        $output = curl_exec($ch);
        if($output === false) {
            $returnCode = (int)curl_getinfo($ch, CURLINFO_HTTP_CODE);
            echo 'Curl error: ' . curl_error($ch) . "Code erro: " . $returnCode;
            die;
        }
        curl_close($ch);
        // echo $output;
        // vd($output);
        $array_php = json_decode(trim($output),TRUE);
        // vd($array_php);
        // vd($array_php['body']['items']);
        return $array_php['body']['items'];
    }


    public function getClusters($server_ip = NULL){
        $ch = curl_init();
        if(!empty($server_ip)){
            curl_setopt($ch, CURLOPT_URL, "http://".$server_ip.":7001/management/tenant-monitoring/clusters");
        } else {
            curl_setopt($ch, CURLOPT_URL, "http://10.3.3.125:7001/management/tenant-monitoring/clusters");
        }
        curl_setopt($ch, CURLOPT_USERPWD, "joao.saraiva:01admin21");//"adriano.melo:Cel82918111");
        curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        /* Define content type */
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Accept:application/json'));
        /* Return json */
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        $output = curl_exec($ch);
        if($output === false) {
            $returnCode = (int)curl_getinfo($ch, CURLINFO_HTTP_CODE);
            echo 'Curl error: ' . curl_error($ch) . "Code erro: " . $returnCode;
            die;
        }
        curl_close($ch);
        // echo $output;
        // vd($output);
        $array_php = json_decode(trim($output),TRUE);
        // vd($array_php);
        // vd($array_php['body']['items']);
        return $array_php['body']['items'];
    }



    public function executa_sv($server_ip,$server_app,$operacao){
        // $mysqli = producaoDataBase();
        // $data = json_decode(file_get_contents("php://input"));
        $ch = curl_init();
        $url = "http://".$server_ip.":7001/management/wls/latest/servers/id/".$server_app."/".$operacao;
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_USERPWD, "joao.saraiva:01admin21");//"adriano.melo:Cel82918111");
        curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        $output = curl_exec($ch);
        $array_php = json_decode($output,true);
                echo $url;
        curl_close($ch);
        return $array_php;
    }

    public function executa_app($server_ip,$aplicacao,$operacao){
        // $mysqli = producaoDataBase();
        // $data = json_decode(file_get_contents("php://input"));
        $ch = curl_init();

        $url = "http://".$server_ip.":7001/management/wls/latest/deployments/application/id/".$aplicacao."/".$operacao;


        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_USERPWD, "joao.saraiva:01admin21");//"adriano.melo:Cel82918111");
        curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        $output = curl_exec($ch);
        $array_php = json_decode($output,true);
                echo $url;
        curl_close($ch);
        return $array_php;
    }



}

/* End of file Api.php */
/* Location: ./application/controllers/configuracoes/Api.php */