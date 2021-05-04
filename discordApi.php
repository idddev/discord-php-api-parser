<?php
function _discordSetUserRole($guildId, $userId, $roles, $token) {
    $endpoint = '/guilds/'.$guildId.'/members/'.$userId;
    $data = json_encode(array(
        'roles' => $roles
    ));
    $verb = 'PATCH';
    $discord = discordApi($token, $endpoint, $verb, $data);
    if(!$discord) return true;
    return false;
}

function _discordCheckIfUserExists($guildId, $nickname, $token)
{
    $endpoint = '/guilds/'.$guildId.'/members/search?query='.urlencode($nickname);
    $discord = discordApi($token, $endpoint);
    if ($discord && count($discord) > 0) return $discord;
    return false;
}

function discordApi(String $token, String $endpoint, String $verb = 'GET', String $data = '')
{
    $url = 'https://discord.com/api/' . $endpoint;
    $ch = curl_init();
    curl_setopt_array($ch, array(
        CURLOPT_URL => $url,
        CURLOPT_HTTPHEADER => array('Authorization: Bot ' . $token, "Content-Type: application/json",
            "Accept: application/json"),
        CURLOPT_RETURNTRANSFER => 1,
        CURLOPT_FOLLOWLOCATION => 1,
        CURLOPT_VERBOSE => 0,
        CURLOPT_SSL_VERIFYPEER => 0,
        CURLOPT_CUSTOMREQUEST => $verb,
        CURLOPT_POSTFIELDS => $data,
    ));

    $response = curl_exec($ch);
    curl_close($ch);
    return json_decode($response);
}
