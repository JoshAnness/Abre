<?php

	/*
	* Copyright 2015 Hamilton City School District
	*
	* This program is free software: you can redistribute it and/or modify
    * it under the terms of the GNU General Public License as published by
    * the Free Software Foundation, either version 3 of the License, or
    * (at your option) any later version.
	*
    * This program is distributed in the hope that it will be useful,
    * but WITHOUT ANY WARRANTY; without even the implied warranty of
    * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    * GNU General Public License for more details.
	*
    * You should have received a copy of the GNU General Public License
    * along with this program.  If not, see <http://www.gnu.org/licenses/>.
    */

	//Required configuration files
	require_once('abre_verification.php');
	require_once('abre_functions.php');
	require_once('abre_dbconnect.php');

  header("content-type: none");

	//Verify student token
	$studenttoken=$_POST["studenttoken"];
  $studenttokenencrypted = encrypt($studenttoken, "");
	$sql = "SELECT * FROM student_tokens WHERE token='$studenttokenencrypted'";
	$result = $db->query($sql);
	$numrows = $result->num_rows;
	while($row = $result->fetch_assoc())
	{

		//Check to see if student has already been claimed by parent
		$sqlcheck = "SELECT * FROM users_parent WHERE students='$studenttokenencrypted' AND email ='".$_SESSION['useremail']."'";
		$resultcheck = $db->query($sqlcheck);
		$numrows2 = $resultcheck->num_rows;

    //no parent already has access
		if($numrows2 == 0)
		{
      $sqlcheck2 = "SELECT * FROM users_parent WHERE email = '".$_SESSION['useremail']."' AND students=''";
      $resultcheck2 = $db->query($sqlcheck2);
      $nulltokenentries = $resultcheck->num_rows;
      if($nulltokenentries == 0){
        $stmt = $db->stmt_init();
        $sql = "INSERT INTO users_parent (email, students) VALUES ('".$_SESSION['useremail']."', '$studenttokenencrypted')";
        $stmt->prepare($sql);
        $stmt->execute();
        $stmt->close();
        $db->close();
        $message = array("status"=>"Success","message"=>"You now have access to your students information.");
        header("Content-Type: application/json");
        echo json_encode($message);
        break;
      }

  		$stmt = $db->stmt_init();
  		$sql = "UPDATE users_parent SET students = '$studenttokenencrypted' WHERE email='".$_SESSION['useremail']."'";
  		$stmt->prepare($sql);
  		$stmt->execute();
  		$stmt->close();
  		$db->close();
      $message = array("status"=>"Success","message"=>"You now have access to your students information.");
      header("Content-Type: application/json");
      echo json_encode($message);
      break;

		}
    else{
      $message = array("status"=>"Success","message"=>"You already have access to this student.");
      header("Content-Type: application/json");
      echo json_encode($message);
      break;
    }
	}

  if($numrows == 0){
    $message = array("status"=>"Error","message"=>"Error: Your code does not match our records. Please confirm your code and try again.");
    header("Content-Type: application/json");
    echo json_encode($message);
  }

?>