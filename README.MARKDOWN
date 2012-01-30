*get_pretty*

*Get Pretty Request*
Ronaldo Barbachano 2012

Sorta helps developers implement url rewriting without any web server modification

If provided with an array will set the get values as such (providing instant backwards compatability)

But this implementation can be troublesome depending on how _GET is used in your web application,
but works fine for simple record retreval.

**Example URL Layout:**

	//script.php?-action-/-record id-

	//So if we have a database called 'residents' and we would like to request 'record id' 100 we would write

	//script.php?residents/100

	//And provide a get_pretty object 

	new get_pretty(array('database','record_id'));

	//This will automatically set the _GET variable to

	$_GET['database'] = 'residents';
	$_GET['record_id'] = '100';
