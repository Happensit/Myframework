<?php
/**
 * Created by PhpStorm.
 * User: Anthony
 * Date: 24.02.2015
 * Time: 19:19
 */

class Portfolio_model extends Model {

  protected $table = 'sh_user';
  protected $pk	= 'id';

    public function getPortfolioAllItem(){

//       $select = $this->query("SELECT n.nid, n.title, n.created, b.body_value, c.field_coordinates_lat, c.field_coordinates_lon, f.field_floor_first,
//                                f.field_floor_second, a.field_area_value, p.field_price_value, m.field_metro_tid, phone.field_owner_phone_value,
//                                type.field_object_type_tid, w.field_wash_value, furn.field_furniture_value,
//                                r.field_of_all_value
//                              FROM `sel_node` n
//                              INNER JOIN `sel_field_data_body` b ON b.entity_id = n.nid
//                              INNER JOIN `sel_field_data_field_coordinates` c ON  c.entity_id = n.nid
//                              INNER JOIN `sel_field_data_field_floor` f ON f.entity_id = n.nid
//                              INNER JOIN `sel_field_data_field_area` a ON a.entity_id = n.nid
//                              INNER JOIN `sel_field_data_field_price` p ON p.entity_id = n.nid
//                              INNER JOIN `sel_field_data_field_metro` m ON m.entity_id = n.nid
//                              INNER JOIN `sel_field_data_field_owner_phone` phone ON phone.entity_id = n.nid
//                              INNER JOIN `sel_field_data_field_object_type` type ON type.entity_id = n.nid
//                              INNER JOIN `sel_field_data_field_of_all` r ON r.entity_id = n.nid
//                              INNER JOIN `sel_field_data_field_wash` w ON w.entity_id = n.nid
//                              INNER JOIN `sel_field_data_field_furniture` furn ON furn.entity_id = n.nid
//
//                              WHERE nid > :nid AND type = :type LIMIT 1000",
//                                array(':nid' => '19108', ':type' => 'object'));
//      $rooms = array();
//      foreach($select as $key => $sel){
//        $rooms[$key]['id'] = $sel->nid;
//        $rooms[$key]['title'] = $sel->title;
//        $rooms[$key]['description'] = $sel->body_value;
//        $rooms[$key]['created'] = $sel->created;
//        $rooms[$key]['floorf'] = $sel->field_floor_first;
//        $rooms[$key]['floors'] = $sel->field_floor_second;
//        $rooms[$key]['area'] = $sel->field_area_value;
//        $rooms[$key]['price'] = $sel->field_price_value;
//        $rooms[$key]['metro'] = $sel->field_metro_tid;
//        $rooms[$key]['phone'] = $sel->field_owner_phone_value;
//        $rooms[$key]['type'] = $sel->field_object_type_tid;
//        $rooms[$key]['countroom'] = $sel->field_of_all_value;
//        $rooms[$key]['wash'] = $sel->field_wash_value;
//        $rooms[$key]['furniture'] = $sel->field_furniture_value;
//        $rooms[$key]['longitude'] = $sel->field_coordinates_lon;
//        $rooms[$key]['latitude'] = $sel->field_coordinates_lat;
//      }
//
//      foreach($rooms as $room){
//        $title = $room['title'];
//        $description = $room['description'];
//        $created = $room['created'];
//        $floorf = $room['floorf'];
//        $floors = $room['floors'];
//        $area = $room['area'];
//        $price = $room['price'];
//        $metro = $room['metro'];
//        $phone = $room['phone'];
//        $type = $room['type'];
//        switch ($type) {
//          case 73:
//            $type = 0; // Комната
//            break;
//        }
//        $countroom = $room['countroom'];
//        $wash = $room['wash'];
//        $furniture = $room['furniture'];
//        $longitude = $room['longitude'];
//        $latitude = $room['latitude'];
//
//        $ins = "INSERT INTO room (title, description, created, floorf, floors, area, price, metro, phone, type, countroom, wash, furniture, longitude, latitude)
//        VALUES ('$title', '$description', '$created', '$floorf', '$floors', '$area', '$price', '$metro', '$phone', '$type', '$countroom', '$wash', '$furniture', '$longitude', '$latitude')";
//        $this->db->exec($ins);
//        echo "{$room['id']} record created successfully"."\r\n";
//
//      }

      return '123';
        //print_r($select);
    }
}