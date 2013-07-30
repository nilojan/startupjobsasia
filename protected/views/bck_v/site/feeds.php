<?php
$this->breadcrumbs=array(
	'Feeds',
);
$this->pageTitle = 'Feeds | '.Yii::app()->params['pageTitle'];
?>
<?php
    
   $feeds=new CActiveDataProvider('feeds', array( 'criteria'=>array(
                                                                    'limit'=>20,
                                                                    'order'=>'created DESC',
                                                                    //'condition'=>'expire >= today',
                                                                    //'params'=>array('today'=>date('Y-m-d H:i:s')),
                                                                    ),
                                                                    'pagination' => false
                                             ));

    Yii::import('ext.feed.*');
                                            // RSS 2.0 is the default type
    $feed = new EFeed();
 
    $feed->title= Yii::app()->params['pageTitle'];
    $feed->description = Yii::app()->params['pageTitle'];
    
   $feed->setImage(Yii::app()->params['pageTitle'], Yii::app()->getBaseUrl(true),
    Yii::app()->request->baseUrl.'/images/suj.png');
 //"Yii::app()->request->baseUrl.'/images/suj.png'"
    $feed->addChannelTag('language', 'en-us');
    $feed->addChannelTag('category',Yii::app()->params['description']);
    $feed->addChannelTag('pubDate', date(DATE_RSS, time()));
    $feed->addChannelTag('link', Yii::app()->request->getBaseUrl(true));
    $feed->addChannelTag('copyright', "'Copyright &copy;'.echo date('Y').' by  Startup Jobs Asia. All Rights Reserved.'");
    
    // * self reference
    foreach($feeds->data as $feed_item) {                  
                      $item = $feed->createNewItem();
 
                      $item->title = $feed_item->title;
                      $item->link = Yii::app()->createAbsoluteUrl('job/job', array('JID'=>$feed_item->JID, $feed_item->url));
                      
                      $item->setDate($feed_item->created);
                      $item->description = $feed_item->description;
                      // this is just a test!!
                      //$item->setEncloser('http://www.tester.com', '1283629', 'audio/mpeg');
                      $item->addTag('image',Yii::app()->request->baseUrl.'/images/'.$feed_item->image);
                      //$item->addTag('image', array('title'=>$item->title, 'link'=>$item->link, 'url'=>Yii::app()->request->baseUrl.'/images/suj.png'));
                      $item->addTag('author', $feed_item->author);
                      $item->addTag('guid', Yii::app()->getBaseUrl(true),array('isPermaLink'=>'true'));
                      
                      $feed->addItem($item);
    }
     $feed->generateFeed();
     Yii::app()->end();
     
     ?>