<?php

class SearchController extends Controller {

    public function actionSearch() {
        $results = array();
        $model = new search;
        $product = array();
        $shop = array();
        if (isset($_POST['search'])) {

            $model->attributes = $_POST['search'];
            
            $query = $model->name;            
            
            $job = job::model()->findAll('t.name LIKE :query || t.username LIKE :query', array(':query'=>"%$query%"));
            $company = company::model()->findAll('t.itemName LIKE :query|| t.itemDescription LIKE :query || t.color LIKE :query', array(':query' => "%$query%"));
            
        }

        $this->render('search', array('model' => $model,
                                      'job' => $job,
                                      'company' => $company,));
    }

    public function actionResults($member=array()) {


        $this->render('results', array('member' => $member));
    }

}

?>
