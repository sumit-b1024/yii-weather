<?php
namespace app\components;
use yii\base\Widget;
use yii\helpers\Html;
class WeatherWidget extends Widget {
    public $message;
    public $params;
    public $city ; 
    public $country ; 
    public function init() {
      
        if ($this->params === null) {
            $this->params = \Yii::$app->request->getQueryParams();
        }
        
        parent::init();
      
    }
    public function run(){
        $lat='30.7046'; 
        $lng='76.71787266';
        $this->city='Mohali' ; 
        $this->country='India' ;
        
        $params=$this->params ; 
         
   
        if(!empty($params['city']))
        {
            $latUrl = "https://geocode.xyz/{$params['city']}?json=1";
            
            $cityData =json_decode(file_get_contents($latUrl),true) ;
            
            if(!empty($cityData['longt']) && !empty($cityData['latt']) )
            {
                $lat= $cityData['latt']; 
                $lng=$cityData['longt'];
            }
            if(!empty($cityData['standard']) && !empty($cityData['standard']['city']))
            {
                $this->city = $cityData['standard']['city'];
                
                $this->country = $cityData['standard']['countryname'];
                
                
            }
            
        }
        $url = "https://api.darksky.net/forecast/d4d71efd80cba5452d7ecdc87a942601/$lat,$lng";
        $weather = file_get_contents($url);
        $weatherReport = json_decode($weather);
      
        // you can load & return the view or you can return the output variable
        return $this->render('weather', ['weatherReport' => $weatherReport,'wInstance'=>$this]);
    }
}
?>