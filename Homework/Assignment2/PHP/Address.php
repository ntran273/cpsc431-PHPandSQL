<!-- o name() // getters and setters
o street() // getters and setters
o city() // getters and setters
o state() // getters and setters
o zip() // getters and setters
o __construct()
o __toString()
o toTSV()
o fromTSV()
note that getters -->
<?php
class Address
{
  private $name = array('FIRST'=>"", 'LAST'=>null);
  private $street = null;
  private $city = null;
  private $state = null;
  private $zip = 0;

function name(){
  // string name()
       if( func_num_args() == 0 )
       {
         if( empty($this->name['FIRST']) ) return $this->name['LAST'];
         else                              return $this->name['LAST'].', '.$this->name['FIRST'];
       }

       // void name($value)
       else if( func_num_args() == 1 )
       {
         $value = func_get_arg(0);

         if( is_string($value) )
         {
           $value = explode(',', $value); // convert string to array

           if ( count($value) >= 2 ) $this->name['FIRST'] = htmlspecialchars(trim($value[1]));
           else                      $this->name['FIRST'] = '';

           $this->name['LAST']  = htmlspecialchars(trim($value[0]));
         }

         else if( is_array ($value) )
         {
           if ( count($value) >= 2 ) $this->name['LAST'] = htmlspecialchars(trim($value[1]));
           else                      $this->name['LAST'] = '';

           $this->name['FIRST']  = htmlspecialchars(trim($value[0]));
         }
       }

       // void name($first_name, $last_name)
       else if( func_num_args() == 2 )
       {
           $this->name['FIRST'] = htmlspecialchars(trim(func_get_arg(0)));
           $this->name['LAST']  = htmlspecialchars(trim(func_get_arg(1)));
       }

       return $this;
}

//street() prototypes
//string street() returns the street
//void street(string $value) set object's $city attribute
function street(){
  //string street getter
  if(func_num_args() == 0){
    return $this->street;
  }

  //void setStreet($value)
  else if (func_num_args() == 1){
    $this->street = htmlspecialchars(trim(func_get_arg(0)));
  }
  return $this;
}

//city() prototypes
//string city() returns the City
//void city(string $value) set object's $city attribute
function city(){
  //string city getter
  if(func_num_args() == 0){
    return $this->city;
  }

  //void setCity($value)
  else if (func_num_args() == 1){
    $this->city = htmlspecialchars(trim(func_get_arg(0)));
  }
  return $this;
}

//state() prototypes
//string state() returns the state
//void state(string $value) set object's state attribute
function state(){
  //string state getter
  if(func_num_args() == 0){
    return $this->state;
  }

  //void setState($value)
  else if (func_num_args() == 1){
    $this->state = htmlspecialchars(trim(func_get_arg(0)));
  }
  return $this;
}

//zip() prototypes
//int zip() returns the zip
//void zip(string $value) set object's zip attribute
function zip(){
  //string state getter
  if(func_num_args() == 0){
    return $this->zip;
  }

  //void setZip($value)
  else if (func_num_args() == 1){
    $this->zip = (int) func_get_arg(0);
  }
  return $this;
}

function __construct($name="",$street="",$city=null,$state=null,$zip = 0){
  // if $name contains at least one tab character, assume all attributes are provided in
  // a tab separated list.  Otherwise assume $name is just the player's name.

  if( strpos($name, "\t") !== false) // Note, can't check for "true" because strpos() only returns the boolean value "false", never "true"
  {
    // assign each argument a value from the tab delineated string respecting relative positions
    list($name, $street, $city, $state, $zip) = explode("\t", $name);
  }
  $this->name($name);
  $this->street($street);
  $this->city($city);
  $this->state($state);
  $this->zip($zip);
}

function __toString(){
  return (var_export($this, true));
}

//Returns a tab separated value (TSV) string containing the contents of all instance attributes
function toTSV(){
  return implode("\t", [$this->name(), $this->street(), $this->city(), $this->state(), $this->zip()]);
}

// Sets instance attributes to the contents of a string containing ordered, tab separated values
function fromTSV(string $tsvString)
{
  // assign each argument a value from the tab delineated string respecting relative positions
  list($name, $street, $city, $state, $zip) = explode("\t", $tsvString);
  $this->name($name);
  $this->street($street);
  $this->city($city);
  $this->state($state);
  $this->zip($zip);
}

} //end class Address

 ?>
