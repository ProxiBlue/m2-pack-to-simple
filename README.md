# ProxiBlue PackToSimple Magento 2 module

This small module will convert a Pack Product () to a simple product after checkout is completed.

## Requirements

* enanobots/m2-product-pack >= 1.1.0

## Installation details

You can install via composer:

* run: `composer config repositories.github.repo.repman.io composer https://github.repo.repman.io`
* use composer `composer require proxi-blue/module-pack-to-simple`
* enable: `./bin/magento module:enable ProxiBlue_PackToSimple`
* run: `./bin/magento setup:upgrade`
* run: `./bin/magento setup:di:compile`

## Usage

Once installed, any Pack product will be converted to a simple product after checkout is completed.
The pack quantity will be set as the simple product qty ordered.
The pack product options will remain attached to the simple product, so it can still be seen as having been a pack product.

## Why?

Since Packs are not native m2 product types, 3rd party systems like shiping / finance / tax systems can have issues to export/import the ordered items to their systems
This change facilitates that still working.
It also helps if the user needs to have n number of items refunded/returned.
It also helps if shipping needs to be done in multiple batches as core features can be used to set shipped n qty of items at a time.

Basically, things will work normally in admin and beyond as it is once again a simple product

