<?php



/*
- AdWords
- Campaign
- Search
- referral sites
- Direct traffic
*/




class ReferralInfo {
  public $referral;
  public $parsed;
  public $query;
  public $search_words;
  public $cookie = array(
      'traffic_type' => '',
      'traffic_domain' => '',
      'traffic_url' => '',
      'traffic_q' => '',
      'traffic_other' => ''
    );

  function __construct($url){
    // save the url
    $this->referral = $url;
    // parse the url
    $parsed = parse_url($url);
    $this->parsed = $parsed;
    // save the queries
    parse_str($parsed['query'], $query);
    $this->query = $query;

    // inset to cookie var
    $this->cookie['traffic_domain'] = $parsed['host'];
    $this->cookie['traffic_url'] = $url;

    // check the types and save the cookie
    $this->init();
  }

  /**
   * what type is it?
   */
  function init(){
    // define type and set values
    if($this->is_adwords()){
      $this->adwords();
    }elseif($this->is_campaign()){
      $this->campaign();
    }elseif($this->is_search()){
      $this->search();
    }elseif($this->is_referral()){
      $this->referral();
    }else{
      $this->cookie['traffic_type'] = 'Direct';
    }
  }

  // function is_google(){
  //   if(strstr($this->parsed['host'],'google')) return true;
  //   else return false;
  // }
  function is_adwords(){
    if(isset($_GET['gclid'])){
      return true;
    }
    return false;
  }
  function is_campaign(){
    if(isset($_GET['utm_campaign'])) return true;
    else false;
  }
  function is_search(){
    $engines = array(
      'dmoz'     => 'q',
      'aol'      => 'q',
      'ask'      => 'q',
      'google'   => 'q',
      'bing'     => 'q',
      'hotbot'   => 'q',
      'teoma'    => 'q',
      'yahoo'    => 'p',
      'altavista'=> 'p',
      'lycos'    => 'query',
      'kanoodle' => 'query'
    );
    foreach($engines as $engine => $query_param) {
      if (strpos($this->parsed['host'], $engine.".") !==  false){
        // save the search term
        $this->search_words = (isset($this->query[$query_param])) ? $this->query[$query_param] : '';
        $this->cookie['traffic_other'] = $engine;
        return true;
      }
    }
    return false;
  }
  function is_referral(){
    if(!empty($this->referral)){
      return true;
    }
    return false;
  }


  function adwords(){
    $this->cookie['traffic_type'] = 'Adwords';
    $this->cookie['traffic_other'] = $_GET['gclid'];
    // add keywords if is search
    if($this->is_search()){
      $this->cookie['traffic_q'] = $this->search_words;
    }
  }
  function campaign(){
    $this->cookie['traffic_type'] = 'Campaign';
    $this->cookie['traffic_q'] = $_GET['utm_campaign'];
    $utm = array(
      'source' => $_GET['utm_source'],
      'medium' => $_GET['utm_medium'],
      'content' => $_GET['utm_content'],
      'term' => $_GET['utm_term']
    );
    $this->cookie['traffic_other'] = $utm;
  }
  function search(){
    $this->cookie['traffic_type'] = 'Search';
    $this->cookie['traffic_q'] = $this->search_words;
  }
  function referral(){
    $this->cookie['traffic_type'] = 'Referral';
  }

  function save_cookie(){
    $value = serialize($this->cookie);
    $expire = time()+60*60*24*30*12; // almost a year
    setcookie ( 'mp_referral', $value, $expire, '/' );
  }
}




// Save referral data for signup
add_action('init', 'mag_save_referral_data');
function mag_save_referral_data(){
  if(!isset($_COOKIE['mp_referral'])){
    $referral_url = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : false;
    $referral = new ReferralInfo($referral_url);
    $referral->save_cookie();
  }
}
