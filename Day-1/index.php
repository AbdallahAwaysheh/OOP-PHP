 <?php

    class Car
    {
        public $make;
        public $model;
        public $VIN;

        public function __construct($make = null, $model = null, $VIN = null)
        {
            $this->make = $make;
            $this->model = $model;
            $this->VIN = $VIN;
        }
        // public function __destruct()
        // {
        //     echo "Car object is destroyed";
        // }

        function setDetails($make, $model, $VIN)
        {
            $this->make = $make;
            $this->model = $model;
            $this->VIN = $VIN;
        }
        function getDetails()
        {
            return "make:  $this->make <br>   model: $this->model <br> VIN: $this->VIN ";
        }
    }


    class Inventory
    {
        private $cars = [];

        public function addCar(Car $car)
        {
            $this->cars[$car->VIN] = $car;
        }

        public function displayCars()
        {
            foreach ($this->cars as $index => $car) {
                echo "<div class='car'>";
                echo "CAR " . $index + 1 . "-";
                echo "<ul>";
                echo "<li>";
                echo $car->make;
                echo "</li>";
                echo "<li>";
                echo $car->model;
                echo "</li>";
                echo "<li>";
                echo $car->VIN;
                echo "</li>";
                echo "</ul>";
                echo "</div>";
            }
        }
        public function removeCar($VIN)
        {

            unset($this->cars[$VIN]);
        }
    }
    ?>

 <!DOCTYPE html>
 <html lang="en">

 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Document</title>
     <style>
         body {
             display: flex;
             flex-direction: column;
             /* justify-content: center; */
             align-items: center;
             height: 100vh;
         }

         .car {
             background-color: blue;
             color: white;
             width: 200px;
             padding: 20px;
             border-radius: 15px;
             margin-bottom: 5px;
         }
     </style>
 </head>

 <body>
    
     <?php
        $car1 = new Car(2017, "Ford", "14");
        $car2 = new Car(2018, "For", "15");
        $car3 = new Car(2019, "Fo", "16");

        $car1->setDetails(2015, "marsedis", "17");
        $garage1 = new Inventory();
        $garage1->addCar($car1);
        $garage1->addCar($car2);
        $garage1->addCar($car3);
        echo "<h3> Befor removing the Car </h3>";
        $garage1->displayCars();

        $garage1->removeCar(15);
        echo "<h3> After removing the Car </h3>";
        $garage1->displayCars();


        ?>
 </body>

 </html>