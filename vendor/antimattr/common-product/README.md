common-product
==============

The AntiMattr common product is a library that provides a shared Product interface.

Installation
============

Add the following to your composer.json file:

```json
{
    "require": {
        "antimattr/common-product": "~1.0@stable"
    }
}
```

Install the libraries by running:

```bash
composer install
```

If everything worked, the Common Product can now be found at vendor/antimattr/common-product.

Model
=====

```javascript
/* 
 * A configurable Product has Attributes (ex. size, color)
 * Those Attributes have Options (ex. red, blue, small, medium)
 * A configurable Product has Variations which are unique combinations of Options. 
 */

Product = {
  attributes: [
    Attribute,  // color
    Attribute,  // size
  ],
  createdAt: Date,
  currency: string, // USD
  description: string,
  dimensionUnit: string, // For Height, Length, Width
  height: int, // Smallest unit for measurement system
  id: string || int,
  images: [
    Image,
    Image,
    Image,
  ],
  length: int, // Smallest unit for measurement system
  mpn: string,  
  msrp: int, // Smallest unit for currency
  price: int, // Smallest unit for currency
  publishedAt: Date,
  quantity: int,
  sku: string,
  status: string,
  title: string,
  upc: string,  
  updatedAt: Date,  
  variations: [
    Variation,  // color_red size_small (an object containing to Variants, one for color red and one for size medium)
    Variation,  // color_red size_medium
    Variation,  // color_red size_large
    Variation,  // color_blue size_small
    Variation,  // color_blue size_medium
    Variation   // color_blue size_large
  ],
  weight: int, // Smallest unit for measurement system
  weigthUnit: string,
  width: int, // Smallest unit for measurement system
};

Attribute {
  id: 'id',
  name: 'Color',
  options: [  
    Option,  // red
    Option,  // orange
    Option,  // yellow
    Option,  // green
    Option,  // blue
    Option,  // indigo
    Option,  // violet
  ]  
};

Option {
  attribute: Attribute, // ReferenceOne
  value: 'Red', 
  uniqueIdentifier: 'color_red', // Concatenate Attribute name and variant value. This ensures there can be only one "red".
  variation: Variation,
};

Variation extends Product {
  image: Image,
  options: [ // A single permutation of options creating a unique mapping of options
    Option,  // color_red
    Option,  // size_medium
  ],
  position: int, // Default sort order for Variations,
  product: Product, // Parent Product
  uniqueIdentifier: 'color_red_size_medium', // Concatenate Option::uniqueIdentifier  
};
```

Pull Requests
=============

Pull Requests - PSR Standards
-----------------------------

Please use the pre-commit hook to run the fix all code to PSR standards

Install once with

```bash
./bin/install.sh 
Copying /antimattr-common-product/bin/pre-commit.sh -> /antimattr-common-product/bin/../.git/hooks/pre-commit
```

Pull Requests
=============

Pull Requests - PSR Standards
-----------------------------

Please use the pre-commit hook to fix all code to PSR standards

Install once with

```bash
./bin/install.sh 
Copying /antimattr-common-product/bin/pre-commit.sh -> /antimattr-common-product/bin/../.git/hooks/pre-commit
```

Pull Requests - Testing
-----------------------

Please make sure tests pass

```bash
$ vendor/bin/phpunit tests
```

Pull Requests - Code Sniffer and Fixer
--------------------------------------

Don't have the pre-commit hook running, please make sure to run the fixer/sniffer manually

```bash
$ vendor/bin/php-cs-fixer fix src/
$ vendor/bin/php-cs-fixer fix tests/
```
