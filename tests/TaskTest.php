<?php

    /**
    * @backupGlobals disabled
    * @backupStaticAttributes disabled
    */

    require_once "src/Task.php";

    $server = 'mysql:host=localhost;dbname=to_do_test';
    $username = 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);

    class TaskTest extends PHPUnit_Framework_TestCase
    {
        function test_save()
        {
            //Arrange
            $description = "Wash the dog";
            $description2 = "Water the lawn";
            $test_task = new Task($description);
            $test_task->save();
            $test_task2 = new Task($description2);
            $test_task2->save();

            //Act
            $result = Task::getAll();

            //Assert
            $this->assertEquals([$test_task, $test_task2], $result);
        }
    }
 ?>
