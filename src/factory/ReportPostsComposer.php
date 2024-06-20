<?php

final class ReportPostsComposer extends AbstractReportPostsComposer implements CRUDInterface
{
  protected function CheckingStatus($pdo, $data){
    if ($data['type'] == 1) {
      $statement = $pdo->prepare(SQL_GET_LAST_REPORT);
      $statement->execute(array( 3 , $data['car_id']));
      $result = $statement->fetch(PDO::FETCH_ASSOC);

      if (($result['mileage'] + 15000) < $data['mileage']) {

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

        print_r($dataForAutoReport);
        // $this->addPost($pdo, $dataForAutoReport);
      }

      print_r(json_encode($result));
    }
  }
}
