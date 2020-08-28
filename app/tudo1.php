<?php
require_once('../lib/Phirehose.php');
require_once('../lib/OauthPhirehose.php');

/**
 * Aula 1 - Introdução a BigData
 * Fatec Shunji Nishimura
 * Prof. Allan Siriani
 */
class SampleConsumer extends OauthPhirehose
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
define("TWITTER_CONSUMER_KEY", "YUqTFFg99URbepzI5wXbmBxH1");
define("TWITTER_CONSUMER_SECRET", "AfgrrWG8SH7G0dLnulqk20iaHhdv4wGOR3K3zO5bVDYMSTIww3");


// Aqui são as chaves de acesso aos dados do Twitter
define("OAUTH_TOKEN", "37265390-XLqhmTElgRNIK9v0vzFOYdBylUNU8a1jjYkWqQ7MV");
define("OAUTH_SECRET", "IUyfHgfNc2sA9JdwYWlZLdu6xDe9kaEMLc9fjQ7yVaHou");

// Aqui Inicia o Streaming de dados

$sc = new SampleConsumer(OAUTH_TOKEN, OAUTH_SECRET, Phirehose::METHOD_SAMPLE);

$sc->setLang('pt');
$sc->consume();
