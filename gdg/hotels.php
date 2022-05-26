<?php

class City
{
    public $city_name;
    public $num_in_hotels;
};

class Hotels
{
    public $hotel_name;
    public City $city;
    public $recommendations;
    public $evaluation;
};

class User
{
    function user_driver()
    {
        echo "*--*--*--*--*--*--*--*--*--*--*--**\n";
        echo "*--*--*--*  HELLO USER  *--*--*--**\n";
        echo "*--*--*--*--*--*--*--*--*--*--*--**\n";

        do {
            echo "\n\nWhat will you like to do: \n1. Search for a hotel\n2. Recommend a hotel\n3. Exit User Panel\n\n";
            $option = (int)readline("Your Choice: ");

            switch ($option) {
                case 1:
                    self::search_hotels();
                    break;
                case 2:
                    self::recommend_hotels();
                    break;
                case 3:
                    break;
                default:
                    break;
            }
        } while ($option !== 3);
    }

    function search_hotels()
    {
        echo "\nIn User Class Search Hotels\n";
    }

    function recommend_hotels()
    {
        echo "\nIn User Class Recommend Hotels\n";
    }
}

class Admin extends User {
    function admin_driver() {
        echo "*--*--*--*--*--*--*--*--*--*--*--*\n";
        echo "*--*--*--  HELLO ADMIN  *--*--*--*\n";
        echo "*--*--*--*--*--*--*--*--*--*--*--*\n";

        do {
            echo "\n\nWhat will you like to do: \n1. User functions\n2. Add a Hotel\n3. Exit Admin Panel\n\n";
            $option = (int)readline("Your choice: ");

            switch($option) {
                case 1:
                    $user = new User;
                    $user->user_driver();
                    break;
                case 2:
                    self::add_hotel();
                    break;
                case 3:
                    break;
                default:
                    break;
            }

        } while($option !== 3);
    }

    function add_hotel() {
        echo "In Admin Add Hotel";
    }

}


function driver()
{
    echo "###############################################\n";
    echo "#########    WELCOME TO SMART CITY    #########\n";
    echo "###############################################\n";

    echo "\n\nSelect the user type: \n1. Admin\n2. User\n\n";

    $option = (int)readline("Your Choice: \n\n");

    switch ($option) {
        case 1:
            (new Admin)->admin_driver();
            break;
        case 2:
            $person = new User;
            $person->user_driver();
            break;
        default:
            break;
    }
}

driver();
