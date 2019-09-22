<?php


require_once "firestore.php";


$fs = new firestore('test');
print_r($fs->insert('qdboL7IhU1lMLbhMvkvA',[
'first' => 'vaibhav	',
'middle' => '',
'last' => 'jain',
'born' => 1998
]));
// print_r($fs->dropDocument('qdboL7IhU1lMLbhMvkvA'));


// [
// 		    'first' => 'Alan',
// 		    'middle' => 'Mathison',
// 		    'last' => 'Turing',
// 		    'born' => 1912
// 		]