<?php

/**
 * Created by PhpStorm.
 * User: Nick
 * Date: 10/16/2016
 * Time: 16:10 PM
 */
class UserService
{
    public function login($wNumber, $password){
        try {
            $ch = curl_init( FUNCTIONS::DATA_API_URL().'/user/login');

            $data =array(
                "userId"=> 1,
                "id"=> 7,
                "title"=> "magnam facilis autem",
                "body"=> "dolore placeat quibusdam ea quo vitae\nmagni quis enim qui quis quo nemo aut saepe\nquidem repellat excepturi ut quia\nsunt ut sequi eos ea sed quas"
            );
            $strdata = json_encode($data);
            if(FALSE === $ch)
                throw new Exception('failed to initialize');

            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
            curl_setopt($ch,CURLOPT_FOLLOWLOCATION,1);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

            $server_output = curl_exec($ch);

            if( FALSE ===  $server_output)
                throw new Exception(curl_error($ch), curl_errno($ch));

            echo(json_encode($server_output));
        }catch (Exception $e){
            trigger_error(sprintf(
            'Curl failed with error #%d: %s',
            $e->getCode(), $e->getMessage()),
            E_USER_ERROR);
        }

    }
}