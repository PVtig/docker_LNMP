<?php

final class ReportPostsComposer extends AbstractReportPostsComposer implements CRUDInterface
{
  protected function CheckingStatus($pdo, $data){
    if ($data['type'] == 1) {
      $statement = $pdo->prepare(SQL_GET_LAST_REPORT);
      $statement->execute(array( 3 , $data['car_id']));
      $result = $statement->fetch(PDO::FETCH_ASSOC);
      print_r(($result['mileage'] + 15000) );

      if (($result['mileage'] + 15000) < $data['mileage']) {
        print_r('meke chenge report');
        $this->addPost();
      }

      print_r(json_encode($result));
    }
  }
}
