<?php

// Here you can map columns from the import file to the according entity properties.
// This is done in the format: 'column' => 'property'.
return [
  'Importer\Entities\Product' =>  [
      'uniqueColumn' => 'Sku',
      'attributes' => [
          'Sku' => 'sku',
          'Name' => 'name',
          'PrIce' => 'price',
          'ShortDescription' => 'shortDescription',
          'FullDescription' => 'fullDescription',
          'Brand' => 'brand',
          'Model' => 'model',
          'VAT' => 'vatId'
      ]
  ]
];
