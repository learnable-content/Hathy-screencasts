<?php

require './vendor/autoload.php';
use RedBeanPHP\R as R;

$faker = Faker\Factory::create();

R::setup('mysql:host=localhost;dbname=my_fake_db', 'username', 'password');

for($i=0; $i<500; $i++) {
    $student = R::dispense('student');

    $student['first_name'] = $faker->firstName;
    $student['last_name'] = $faker->lastName;
    $student['address'] = $faker->address;

    $student['phone'] = $faker->phoneNumber;
    $student['email'] = $student['first_name'] . "@" . $faker->freeEmailDomain;

    $student['ccn'] = $faker->creditCardNumber;
    $student->setMeta('cast.ccn', 'string');
    $student['cce'] = $faker->creditCardExpirationDateString;

    $student['essay'] = $faker->text($maxNbChars=4000);

    $student['dob'] = $faker->date;

    R::store($student);
    echo "Added " . $student['first_name'] . " " . $student['last_name'] . "\n" ;
}










