<?php

final class ReportPostsComposer extends AbstractReportPostsComposer implements CRUDInterface
{
  protected function CheckingStatus($pdo, $data){
    switch ($data) {
      case $data['type'] == 1:
        $statement = $pdo->prepare(SQL_GET_LAST_SERVICE_REPORT);
        $statement->execute(array( 3 , $data['car_id']));
        $result = $statement->fetch(PDO::FETCH_ASSOC);
  
        $this->chengeDataCar($pdo, $data);
  
        if (($result['mileage'] + 15000) < $data['mileage']) {
          $this->addSistemReport($pdo, $data);
        }
        break;
      case $data['type'] == 3:
        $status = [ 
          'car_id' => $data['car_id'],
          "status" => 2 
        ];
        $this->chengeDataCar($pdo, $status);
        break;
      
      default:
        # code...
        break;
    }
  }
  
  protected function addSistemReport($pdo, $data){
    $number = (isset($data['number'])) ?  $data['number'] + 1 : NULL;
        $type = 4;
        $car_id = (isset($data['car_id'])) ? $data['car_id'] : NULL;
        $mileage = (isset($data['mileage'])) ? $data['mileage'] : NULL;
        $user_id = 0;

        $status = [ 
          'car_id' => $car_id,
          "status" => 3 
        ];
        $this->chengeDataCar($pdo, $status);

        $dataForAutoReport = [
          "number" => $number,
          "type" => $type,
          "mileage" => $mileage,
          "car_id" => $car_id,
          "user_id" => $user_id 
        ];
        $this->addPost($pdo, $dataForAutoReport);
  }

  function chengeDataCar($pdo, $data){
    switch ($data) {
      case isset($data['status']):
        $this->chengeStatus($pdo, $data);
        break;
      case isset($data['mileage']):
       $this->chengeMileage($pdo, $data);
       break;
      default:
        echo('Parameters do not require changes');
        break;
    }
  }

  function chengeMileage($pdo, $data) {
    $id = (isset($data['car_id'])) ? $data['car_id'] : NULL;
    $mileage = (isset($data['mileage'])) ? $data['mileage'] : NULL;

    $statement = $pdo->prepare(SQL_CHENGE_CAR_MILEAGE_BY_ID);
    $res = $statement->execute(array(
      ':id' => $id,
      ':mileage' => $mileage
    ));
    var_dump($res);
  }

  function chengeStatus($pdo, $data) {
    $id = (isset($data['car_id'])) ? $data['car_id'] : NULL;
    $status = (isset($data['status'])) ? $data['status'] : NULL;

    $statement = $pdo->prepare(SQL_CHENGE_CAR_STATUS_BY_ID);
    $res = $statement->execute(array(
      ':id' => $id,
      ':status' => $status
    ));
    var_dump($res);
  }
}
