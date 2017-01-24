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
	require_once(dirname(__FILE__) . '/../../core/abre_verification.php');
	require_once(dirname(__FILE__) . '/../../core/abre_functions.php');
	
	if(superadmin() && !file_exists("$portal_path_root/modules/apps/setup.txt"))
	{
		//Check for apps table
		require(dirname(__FILE__) . '/../../core/abre_dbconnect.php');	
		if(!$db->query("SELECT * FROM apps"))
		{
			$sql = "CREATE TABLE `apps` (`id` int(11) NOT NULL) ENGINE=InnoDB DEFAULT CHARSET=latin1;";
			$sql .= "ALTER TABLE `apps` ADD PRIMARY KEY (`id`);";
			$sql .= "ALTER TABLE `apps` MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;";	
			$db->multi_query($sql);
		}
		$db->close();
		
		//Check for icon field
		require(dirname(__FILE__) . '/../../core/abre_dbconnect.php');	
		if(!$db->query("SELECT icon FROM apps"))
		{
			$sql = "ALTER TABLE `apps` ADD `icon` text NOT NULL;";	
			$db->multi_query($sql);
		}
		$db->close();
		
		//Check for student field
		require(dirname(__FILE__) . '/../../core/abre_dbconnect.php');	
		if(!$db->query("SELECT student FROM apps"))
		{
			$sql = "ALTER TABLE `apps` ADD `student` int(11) NOT NULL;";	
			$db->multi_query($sql);
		}
		$db->close();
		
		//Check for staff field
		require(dirname(__FILE__) . '/../../core/abre_dbconnect.php');	
		if(!$db->query("SELECT staff FROM apps"))
		{
			$sql = "ALTER TABLE `apps` ADD `staff` int(11) NOT NULL;";	
			$db->multi_query($sql);
		}
		$db->close();
		
		//Check for title field
		require(dirname(__FILE__) . '/../../core/abre_dbconnect.php');	
		if(!$db->query("SELECT title FROM apps"))
		{
			$sql = "ALTER TABLE `apps` ADD `title` text NOT NULL;";	
			$db->multi_query($sql);
		}
		$db->close();
		
		//Check for image field
		require(dirname(__FILE__) . '/../../core/abre_dbconnect.php');	
		if(!$db->query("SELECT image FROM apps"))
		{
			$sql = "ALTER TABLE `apps` ADD `image` text NOT NULL;";	
			$db->multi_query($sql);
		}
		$db->close();
		
		//Check for link field
		require(dirname(__FILE__) . '/../../core/abre_dbconnect.php');	
		if(!$db->query("SELECT link FROM apps"))
		{
			$sql = "ALTER TABLE `apps` ADD `link` text NOT NULL;";	
			$db->multi_query($sql);
		}
		$db->close();
		
		//Check for required field
		require(dirname(__FILE__) . '/../../core/abre_dbconnect.php');	
		if(!$db->query("SELECT required FROM apps"))
		{
			$sql = "ALTER TABLE `apps` ADD `required` int(11) NOT NULL;";	
			$db->multi_query($sql);
		}
		$db->close();
		
		//Check for sort field
		require(dirname(__FILE__) . '/../../core/abre_dbconnect.php');	
		if(!$db->query("SELECT sort FROM apps"))
		{
			$sql = "ALTER TABLE `apps` ADD `sort` int(11) NOT NULL;";	
			$db->multi_query($sql);
		}
		$db->close();
		
		//Check for minor_disabled field
		require(dirname(__FILE__) . '/../../core/abre_dbconnect.php');	
		if(!$db->query("SELECT minor_disabled FROM apps"))
		{
			$sql = "ALTER TABLE `apps` ADD `minor_disabled` int(11) NOT NULL DEFAULT '0';";	
			$db->multi_query($sql);
		}
		$db->close();
				
		//Write the Setup File
		$myfile = fopen("$portal_path_root/modules/apps/setup.txt", "w");
		fwrite($myfile, '');
		fclose($myfile);

	}
	
?>