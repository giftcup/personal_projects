<?php

class City
{
    public $city_name;
    public $num_in_hotels;
};

class Hotels
{
    public $hotel_name;
    public $city;
    public $pricing;
    public $contact;
    public $recommendations;
    public $evaluation;

    function __construct($name, $city, $pricing, $contact) {
        $this->hotel_name = $name;
        $this->city = $city;
        $this->pricing = $pricing;
        $this->contact = $contact;
        $this->recommendations = 0;
        $this->evaluation = 0;
    }

    function __toString()
    {
            return "Hotel Name: {$this->hotel_name}\n City: {$this->city}\n Pricing: {$this->pricing}\nContact: {$this->contact}\n Recommendations: {$this->recommendations}\n Evaluation: {$this->evaluation}\n\n";
    }

    function increment_evaluation() {
        if ($this->recommendations === 100) {
            $this->evaluation > 5 ? 5 : $this->evaluation++;
        }
    }

    function increment_recommendation() {
        $this->recommendations ++;
    }
};

class User
{
    function user_driver($hotels)
    {
        echo "*--*--*--*--*--*--*--*--*--*--*--**\n";
        echo "*--*--*--*  HELLO USER  *--*--*--**\n";
        echo "*--*--*--*--*--*--*--*--*--*--*--**\n";

        do {
            echo "\n\nWhat will you like to do: \n1. Search for a hotel\n2. Exit User Panel\n\n";
            $option = (int)readline("Your Choice: ");

            switch ($option) {
                case 1:
                    echo "1. Search by Evalaution\n2. Search by Town\n";
                    $option = (int)readline("Choice: ");
                    if ($option === 1) {
                        $search_param = (int)readline("Enter evaluation: ");
                    }
                    else if($option === 2) {
                        $search_param = readline("Enter Town: ");
                    }
                    self::search_hotels($search_param, $hotels);
                    break;
                case 2:
                    break;
                default:
                    break;
            }
        } while ($option !== 2);
    }

    function search_hotels($search, $hotels)
    {
        for($i = 0; $i < sizeof($hotels); $i++) :
            if ($hotels[$i]->city == $search || $hotels[$i]->evaluation === $search) {
                echo ($i+1).". ".$hotels[$i];
            }
        endfor;

        $option = readline("Would you like to recommend a hotel(y/n): ");

        if ($option === "y") {
            $hotel_num = (int)readline("Enter hotel number from the list: ");
            self::recommend_hotels($hotel_num, $hotels);
        }
    }

    function recommend_hotels($num, $hotels)
    {
        $hotels[$num-1]->increment_recommendation();
    }
}

class Admin extends User {
    function admin_driver(&$hotels) {

        echo "*--*--*--*--*--*--*--*--*--*--*--*\n";
        echo "*--*--*--  HELLO ADMIN  *--*--*--*\n";
        echo "*--*--*--*--*--*--*--*--*--*--*--*\n";

        do {
            echo "\n\nWhat will you like to do: \n1. User functions\n2. Add a Hotel\n3. Exit Admin Panel\n\n";
            $option = (int)readline("Your choice: ");

            switch($option) {
                case 1:
                    $user = new User;
                    $user->user_driver($hotels);
                    break;
                case 2:
                    self::add_hotel($hotels);
                    break;
                case 3:
                    break;
                default:
                    break;
            }

        } while($option !== 3);
    }

    function add_hotel(&$hotels) {
        $hotel_name = readline("Name of hotel: ");
        $hotel_city = readline("City hotel is found in: ");
        $hotel_pricing = readline("Pricing of hotel: ");
        $hotel_contact = readline("Hotel's email: ");

        $new_hotel = new Hotels($hotel_name, $hotel_city, $hotel_pricing, $hotel_contact);
        $hotels[] = $new_hotel;
    }

}


function driver()
{
    $hotels = array();

    echo "###########*#*#*#*#*#*#*#*#*#*#*#*#*###########\n";
    echo "#########    WELCOME TO SMART CITY    #########\n";
    echo "###########*#*#*#*#*#*#*#*#*#*#*#*#*###########\n";

    do {
        echo "\n\nSelect the user type: \n1. Admin\n2. User\n3. Exit\n\n";

        $option = (int)readline("Your Choice: \n\n");
        
        switch ($option) {
            case 1:
                (new Admin)->admin_driver($hotels);
                print_r($hotels);
                break;
            case 2:
                $person = new User;
                $person->user_driver($hotels);
                break;
            case 3:
                echo "Enjoy Your Stay. See Another Time!!\n\n";
                break;
            default:
                break;
        }
    } while ($option !== 3);
}

driver();