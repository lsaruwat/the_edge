<?php

include("classes.php");
$home = new Page("The-Edge");
//$home->addCss("reset.css");
$home->addCss("style.css");
$home->addJs("functions.js");
$home->build_top();
?>
<!--
/////JANKY JS SNIPPET MICHELLE SENT ME BECAUSE
/////ADOBE IS SUPER GREEDY!!!
-->
<script>
  (function(d) {
    var config = {
      kitId: 'pfz7ims',
      scriptTimeout: 3000
    },
    h=d.documentElement,t=setTimeout(function(){h.className=h.className.replace(/\bwf-loading\b/g,"")+" wf-inactive";},config.scriptTimeout),tk=d.createElement("script"),f=false,s=d.getElementsByTagName("script")[0],a;h.className+=" wf-loading";tk.src='//use.typekit.net/'+config.kitId+'.js';tk.async=true;tk.onload=tk.onreadystatechange=function(){a=this.readyState;if(f||a&&a!="complete"&&a!="loaded")return;f=true;clearTimeout(t);try{Typekit.load(config)}catch(e){}};s.parentNode.insertBefore(tk,s)
  })(document);
</script>
<!--
/////END JANKY JS SNIPPET
-->
<div id='header'>
		<h1 id="tagline">small business big advantage</h1>
		<img src="images/theEdgeCrop.png"/>
	</div>
<div id="container">
	<div id="filter">
	<div id="filter-header">
	<h1>Find Your Rank</h1>
	</div>
	<div class="select">
	<p class="label">Industry</p><select id="industry">
	<option value="Pizza">Pizza</option>
	<option value="Restaurants">Restaurants</option>
	</select>
	</div>
	<div class="select">
	<p class="label">Location</p><select id="area">
<?php
	$sql = "SELECT City, COUNT(*)
			FROM pizza_places
			GROUP BY City
			HAVING COUNT(*)>1
			ORDER BY City ASC";
			$psql=$conn->prepare($sql);
			$psql->execute();
			$row= $psql->fetchAll();
			foreach($row as $place)
			{
				//$escaped = str_replace(" ", "\ ", $place['City']);
				echo "<option value='".$place['City'] ."'>". $place['City'] ."</option>";
			}
			?>
	</select>
	</div>
	<div class="select">
	<p class="label">Company Name</p><select id="company">

	</select>
	</div>
	</div>
	<div id="content-area">
		<div id="top-stats">
		<div class='info-container'>
		<div class='company-info'>
			<div id='ranking'>
				<h1>86</h1>
			</div>
			<div id='secondary-info'>
				<h2>Pablo's Pizza</h2>
				<p>Local businesses your'e beating: <span>56</span></p>
				<p>Local businesses beating you:  <span>34</span></p>
			</div>
		</div>
		</div>
		</div>
		<div id="bottom-left">

		</div>
		<div id="bottom-right">
		</div>
		<div id="bottom-pagination">
		</div>
	</div>
</div>

<?php

$home->build_bottom();

?>