<?php
	
require 'db.php';

$db = new db('localhost', 'test', 'root');
$db->connect();


// $db->runQuery(
// 	"INSERT INTO members (first_name, last_name, movie_id) VALUES 
// 	(
// 		'Adam',
// 		'Smith',
// 		1
// 	),
// 	(
// 		'Ravi',
// 		'Kumar',
// 		2
// 	),
// 	(
// 		'Susan',
// 		'Davidson',
// 		5
// 	), 
// 	(
// 		'Jenny',
// 		'Adrianna',
// 		8
// 	),
// 	(
// 		'Lee',
// 		'Pong',
// 		10
// 	)
// ");

// $db->runQuery(
// 	"INSERT INTO movies (title, category) VALUES 
// 	(
// 		'ASSASSIN\'S CREED: EMBERS',
// 		'Animations'
// 	),
// 	(
// 		'Real Steel(2012)',
// 		'Animations'
// 	),
// 	(
// 		'Alvin and the Chipmunks',
// 		'Animations'
// 	), 
// 	(
// 		'The Adventures of Tin Tin',
// 		'Animations'
// 	),
// 	(
// 		'Safe (2012)',
// 		'Action'
// 	),
// 	(
// 		'Safe House(2012)',
// 		'Action'
// 	),
// 	(
// 		'GIA',
// 		'18+'
// 	),
// 	(
// 		'Deadline 2009',
// 		'18+'
// 	),
// 	(
// 		'The Dirty Picture',
// 		'18+'
// 	),
// 	(
// 		'Marley and me',
// 		'Romance'
// 	)
// ");
#cross join query which returns each row from table against entire table;
// echo 'CROSS';
$db->runQuery(
	'SELECT * FROM members
	CROSS JOIN movies'
);
$db->fetchResults();
$db->dumpResults('CROSS JOIN');

#inner join query which returns rows from both table ON met condition;
// echo 'INNER';
$db->runQuery(
	'SELECT * FROM members AS a
	INNER JOIN movies AS b
	ON a.movie_id = b.id'
);
$db->fetchResults();
$db->dumpResults('INNER JOIN');

#outer join query which returns rows from both table ON met condition and NULL for columns ON condition not met;
#LEFT JOIN
// echo 'LEFT';
$db->runQuery(
	'SELECT * FROM movies AS b
	LEFT JOIN members AS a
	ON a.movie_id = b.id'
);
$db->fetchResults();
$db->dumpResults('LEFT JOIN');


#outer join query which returns rows from both table ON met condition and NULL for columns ON condition not met;
#RIGHT JOIN
// echo 'RIGHT';
$db->runQuery(
	'SELECT * FROM members AS a
	RIGHT JOIN movies AS b
	ON a.movie_id = b.id'
);
$db->fetchResults();
$db->dumpResults('RIGHT JOIN');

?>