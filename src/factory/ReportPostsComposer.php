<?php

final class ReportPostsComposer extends AbstractReportPostsComposer implements CRUDInterface
{
  protected function CheckingStatus($pdo, $data){
    if ($data['type'] == 1) {
      $statement = $pdo->prepare(SQL_GET_LAST_SERVICE_REPORT);
      $statement->execute(array( 3 , $data['car_id']));
      $result = $statement->fetch(PDO::FETCH_ASSOC);

      if (($result['mileage'] + 15000) < $data['mileage']) {
        $this->addSistemReport($pdo, $data);
      }

    }
  }
  
  protected function addSistemReport($pdo, $data){
    $number = (isset($data['number'])) ?  $data['number'] + 1 : NULL;
        $type = 4;
        $car_id = (isset($data['car_id'])) ? $data['car_id'] : NULL;
        $mileage = (isset($data['mileage'])) ? $data['mileage'] : NULL;
        $user_id = 0;

        $dataForAutoReport = [
          "number" => $number,
          "type" => $type,
          "mileage" => $mileage,
          "car_id" => $car_id,
          "user_id" => $user_id 
        ];
        $this->addPost($pdo, $dataForAutoReport);
    
  }

  function chengeParamCar($pdo, $data){
    $statement = $pdo->prepare(SQL_GET_CAR);
    $statement->execute(array($data['car_id']));
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);
    print_r(json_encode($result));

    $number = (isset($result['number'])) ?  $result['number'] : NULL;
    $type = (isset($result['type'])) ? $result['type'] : NULL;
    $mileage = (isset($data['mileage'])) ? $data['mileage'] : NULL;
    $garage_id = (isset($data['mileage'])) ? $data['mileage'] : NULL;
    $status = (isset($data['mileage'])) ? $data['mileage'] : NULL;
    $statement = $pdo->prepare(SQL_UPDATE_CAR_BY_ID);

    $res = $statement->execute(array(
      ':number' => $number,
      ':type' => $type,
      ':mileage' => $mileage,
      ':garage_id' => $garage_id,
      ':status' => $status
    ));
    var_dump($res);
  }
}
