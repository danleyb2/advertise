<?php

#namespace classes;
class Add{

    public $name;
    public $price;
    public $photo_filename;

    public $age,$reg,$location,$color,$status,$contact,$category;

    function __construct($name,$price,$contact,$category,$age,$reg,$status,$color,$location){
        $this->name=$name;
        $this->price=$price;
        $this->age=$age;
        $this->color=$color;
        $this->contact=$contact;
        $this->category=$category;
        $this->status=$status;
        $this->location=$location;
        $this->reg=$reg;
    }
    static function load_add($id){
        global $database;
        $sql="select * from advertisements where id=$id";
        $result_set=$database->query_database($sql);
        if ($result_set) {
            return mysqli_fetch_assoc($result_set);
        }
        return false;

    }
    function create(){

    }
    function save(){
        global $database;
        $query="insert into advertisements (
        id,price,created,name,picture_url,creator,contact,product_id,age,reg,status,color,location
        ) values (
        NULL,
        $this->price,
        NULL ,
        '$this->name',
        '$this->photo_filename',
        1,
        '$this->contact',
        $this->category,
        $this->age,
        '$this->reg',
        '$this->status',
        '$this->color',
        '$this->location'
        )";
        //todo update products counts
       return  $database->query_database($query);



    }
    function attach_pic($url){

        $this->photo_filename=$url;

    }
    function delete($id){

    }
    function update(){
        global $database;

    $query="UPDATE `advertisements` SET

        `price`=$this->price,
        `name`='$this->name',
        `creator`=1,
        `contact`='$this->contact',
        `age`=$this->age,
        `reg`='$this->reg',
        `status`='$this->status',
        `color`='$this->color',
        `location`='$this->location'
        WHERE `id` = 11";
    return $database->query_database($query);

    }
}