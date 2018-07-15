<?php

	/*
	* Copyright (C) 2016-2017 Abre.io LLC
	*
	* This program is free software: you can redistribute it and/or modify
    * it under the terms of the Affero General Public License version 3
    * as published by the Free Software Foundation.
	*
    * This program is distributed in the hope that it will be useful,
    * but WITHOUT ANY WARRANTY; without even the implied warranty of
    * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    * GNU Affero General Public License for more details.
	*
    * You should have received a copy of the Affero General Public License
    * version 3 along with this program.  If not, see https://www.gnu.org/licenses/agpl-3.0.en.html.
    */

	//Required configuration files
	require_once(dirname(__FILE__) . '/../../../core/abre_verification.php');
	require(dirname(__FILE__) . '/../../../core/abre_dbconnect.php');
	require_once(dirname(__FILE__) . '/../../../core/abre_functions.php');

?>

<div class="row">
  <div class="col s12" style="background-color: <?php echo getSiteColor(); ?>">
    <ul id="connect-tabs" class="tabs" style="background-color: <?php echo getSiteColor(); ?>">
      <li class="tab col s2"><a href="#home">Home</a></li>
      <li class="tab col s2"><a href="#journals">Journals</a></li>
    </ul>
  </div>
  <div id="home" class="col s12">home</div>
  <div id="journals" class="col s12">journals</div>
</div>

<script>
  // var instance = M.Tabs.init('#connect-tabs', {});
  $(document).ready(() => $('#connect-tabs').tabs());
</script>