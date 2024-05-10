<?php 
namespace App\ModelFilters;

use EloquentFilter\ModelFilter;

class AdvertsFilter extends ModelFilter
{
       public function searchkey($value)
       {
          $this->where('title', 'LIKE', '%' . $value.'%');
       }
        public function floorlocation($value)
        {
             $this->where('floorlocation', '=', $value);
        }
        public function buildingage($value)
        {
             $this->where('buildingage', '=', $value);
        }
        public function numberrooms($value)
        {
             $this->where('number_rooms', '=', $value);
        }
        public function minsquaremeters($value)
        {
             $this->where('squaremeters', '>=', $value);
        }
        public function maxsquaremeters($value)
        {
             $this->where('squaremeters', '<=', $value);
        }
        public function minprice($value)
        {
             $this->where('price', '>=', $value);
        }
        public function maxprice($value)
        {
             $this->where('price', '<=', $value);
        }
        public function isItem($value)
        {
             $this->where('isItem', '=', $value);
        }
        public function type($value)
        {
             $this->where('type', '=', $value);
        }
        public function status($value){
          $this->whereIn('status',$value);
      }
      public function city($value){
          $this->where('city', 'LIKE', '%' . $value.'%');
      }
      public function town($value){
          $this->where('town', 'LIKE', '%' . $value.'%');
      }
      public function paymentmethods($value){
          $this->where('payment_methods', '=', $value);
      }

}