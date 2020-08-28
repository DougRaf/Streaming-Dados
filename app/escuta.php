<?php
require_once('../lib/Phirehose.php');
require_once('../lib/OauthPhirehose.php');

/**
 * Aula 1 - Introdução a BigData
 * Fatec Shunji Nishimura
 * Prof. Allan Siriani
 */
class FilterTrackConsumer extends OauthPhirehose
{

  public function enqueueStatus($status)
  {
   
    $data = json_decode($status, true);
    if (is_array($data) && isset($data['user']['screen_name'])) {
      print $data['user']['screen_name'] . ': ' . urldecode($data['text']) . "\n";
    }
  }
}

// PEssoal aqui vocês coloquem as chaves para acessar a API
define("TWITTER_CONSUMER_KEY", "GvDlyVuSK85rhHZcEFgPZrA6U");
define("TWITTER_CONSUMER_SECRET", "js5ZHqhZqNn2llDbo3ftoHr3T4ukUF86llpAw6S72IB2sFm7jg");


// Aqui são as chaves de acesso aos dados do Twitter
define("OAUTH_TOKEN", "37265390-Mp1gMvVk4uOTigJ0dq8XeZ8FlR8YX72h9VWFqPs5C");
define("OAUTH_SECRET", "HbdMugYjUOyDwBycygqsDI4x6CstgkZLrL8dDhkEzo6Mi");

// Aqui Inicia o Streaming de dados
$sc = new FilterTrackConsumer(OAUTH_TOKEN, OAUTH_SECRET, Phirehose::METHOD_FILTER);
//Parâmetros ou verbetes para monitoramento.
$sc->setLang('pt');
$sc->setTrack(array('bdag'));
$sc->consume();
