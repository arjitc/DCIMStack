![Picture](https://www.aftership.com/assets/common/img/logo-aftership-premium-bright.png)

# AfterShip API PHP SDK
aftership-php is a PHP SDK (module) for [AfterShip API](https://www.aftership.com/docs/api/4/). Module provides clean and elegant way to access API endpoints. **Compatible with Afership API**

Contact: <support@aftership.com>

## Installation
##### Option 1: Manual installation
1. Download or clone this repository to desired location
2. Reference files of this SDK in your project. Absolute path should be prefered.

```php
require('/path/to/repository/src/AfterShip/Exception/AftershipException.php');
require('/path/to/repository/src/AfterShip/Core/Request.php');
require('/path/to/repository/src/AfterShip/Couriers.php');
require('/path/to/repository/src/AfterShip/Trackings.php');
require('/path/to/repository/src/AfterShip/Notifications.php');
require('/path/to/repository/src/AfterShip/LastCheckPoint.php');

$key = 'AFTERSHIP API KEY';

$couriers = new AfterShip\Couriers($key);
$trackings = new AfterShip\Trackings($key);
$notifications = new AfterShip\Notifications($key);
$last_check_point = new AfterShip\LastCheckPoint($key);
```
##### Option 2: Download and Install Composer. https://getcomposer.org/download/

Run the following command to require AfterShip PHP SDK
```
composer require aftership/aftership-php-sdk
```
Use autoloader to import SDK files
```php
require 'vendor/autoload.php';

$key = 'AFTERSHIP API KEY';

$couriers = new AfterShip\Couriers($key);
$trackings = new AfterShip\Trackings($key);
$last_check_point = new AfterShip\LastCheckPoint($key);
```
#### Please ensure you have installed the PHP extension CURL, you could run the following command to install it
```
sudo apt-get install php5-curl
```
and restart the web server and PHP process.


## Testing
1. Execute the file: 
 * If you are install manually, please execute 'test/testing.php' on your browser.
 * If you are install by composer, please execute 'vendor/aftersip/aftership-php-sdk/test/testing.php' on your browser.
2. Insert your AfterShip API Key. [How to generate AfterShip API Key](http://aftership.uservoice.com/knowledgebase/articles/401963)
3. Click the request all button or the button of the represented request.


## Couriers
##### Get your selected couriers list
https://www.aftership.com/docs/api/4/couriers/get-couriers
```php
$couriers = new AfterShip\Couriers('AFTERSHIP_API_KEY');
$response = $couriers->get();
```

##### Get all our supported couriers list
https://www.aftership.com/docs/api/4/couriers/get-couriers-all
```php
$couriers = new AfterShip\Couriers('AFTERSHIP_API_KEY');
$response = $couriers->get_all();
```

##### Detect courier by tracking number
https://www.aftership.com/docs/api/4/couriers/post-couriers-detect
```php
$courier = new AfterShip\Couriers('AFTERSHIP_API_KEY');
$response = $courier->detect('1234567890Z');
```

## Trackings
##### Create a new tracking
https://www.aftership.com/docs/api/4/trackings/post-trackings
```php
$trackings = new AfterShip\Trackings('AFTERSHIP_API_KEY');
$tracking_info = array(
    'slug'    => 'dhl',
    'title'   => 'My Title',
);
$response = $trackings->create('RA123456789US', $tracking_info);
```

##### Create multiple trackings
(Will be available soon)

##### Delete a tracking by slug and tracking number
https://www.aftership.com/docs/api/4/trackings/delete-trackings
```php
$trackings = new AfterShip\Trackings('AFTERSHIP_API_KEY');
$response = $trackings->delete('dhl', 'RA123456789US');
```

##### Delete a tracking by tracking ID
https://www.aftership.com/docs/api/4/trackings/delete-trackings
```php
$trackings = new AfterShip\Trackings('AFTERSHIP_API_KEY');
$response = $trackings->delete_by_id('53df4a90868a6df243b6efd8');
```

##### Get tracking results of multiple trackings
https://www.aftership.com/docs/api/4/trackings/get-trackings
```php
$trackings = new AfterShip\Trackings('AFTERSHIP_API_KEY');
$options = array(
    'page'=>1,
    'limit'=>10
);
$response = $trackings->get_all($options)
```

##### Get tracking results of a single tracking by slug and tracking number
https://www.aftership.com/docs/api/4/trackings/get-trackings-slug-tracking_number
```php
$trackings = new AfterShip\Trackings('AFTERSHIP_API_KEY');
$response = $trackings->get('dhl', 'RA123456789US', array('title','order_id'));
```

##### Get tracking results of a single tracking by tracking ID
https://www.aftership.com/docs/api/4/trackings/get-trackings-slug-tracking_number
```php
$trackings = new AfterShip\Trackings('AFTERSHIP_API_KEY');
$response = $trackings->get_by_id('53df4a90868a6df243b6efd8', array('title','order_id'));
```

##### Update a tracking by slug and tracking number
https://www.aftership.com/docs/api/4/trackings/put-trackings-slug-tracking_number
```php
$trackings = new AfterShip\Trackings('AFTERSHIP_API_KEY');
$params = array(
    'smses'             => array(),
    'emails'            => array(),
    'title'             => '',
    'customer_name'     => '',
    'order_id'          => '',
    'order_id_path'     => '',
    'custom_fields'     => array()
);
$response = $trackings->update('dhl', 'RA123456789US', $params);
```

##### Update a tracking by tracking ID
https://www.aftership.com/docs/api/4/trackings/put-trackings-slug-tracking_number
```php
$trackings = new AfterShip\Trackings('AFTERSHIP_API_KEY');
$params = array(
    'smses'             => array(),
    'emails'            => array(),
    'title'             => '',
    'customer_name'     => '',
    'order_id'          => '',
    'order_id_path'     => '',
    'custom_fields'     => array()
);
$response = $trackings->update_by_id('53df4a90868a6df243b6efd8', $params);
```

##### Reactivate Tracking by slug and tracking number
https://www.aftership.com/docs/api/4/trackings/post-trackings-slug-tracking_number-retrack
```php
$trackings = new AfterShip\Trackings('AFTERSHIP_API_KEY');
$response = $trackings->retrack('dhl','RA123456789US');
```

##### Reactivate Tracking by tracking ID
https://www.aftership.com/docs/api/4/trackings/post-trackings-slug-tracking_number-retrack
```php
$trackings = new AfterShip\Trackings('AFTERSHIP_API_KEY');
$response = $trackings->retrack_by_id('53df4a90868a6df243b6efd8');
```

## Last Check Point
##### Return the tracking information of the last checkpoint of a single tracking by slug and tracking number
https://www.aftership.com/docs/api/4/last_checkpoint/get-last_checkpoint-slug-tracking_number
```php
$last_check_point = new AfterShip\LastCheckPoint('AFTERSHIP_API_KEY');
$response = $last_check_point->get('dhl','RA123456789US');
```

##### Return the tracking information of the last checkpoint of a single tracking by tracking ID
https://www.aftership.com/docs/api/4/last_checkpoint/get-last_checkpoint-slug-tracking_number
```php
$last_check_point = new AfterShip\LastCheckPoint('AFTERSHIP_API_KEY');
$response = $last_check_point->get_by_id('53df4a90868a6df243b6efd8');
```

## Notifications
##### Create a new notification by slug and tracking number
https://www.aftership.com/docs/api/4/notifications/post-add-notifications
```php
$notifications = new AfterShip\Notifications('AFTERSHIP_API_KEY');
$response = $notifications->create('ups', '1ZV90R483A33906706', array(
                'emails' => ['youremail@yourdomain.com']
            ))
```

##### Create a new notification by tracking ID
https://www.aftership.com/docs/api/4/notifications/post-add-notifications
```php
$notifications = new AfterShip\Notifications('AFTERSHIP_API_KEY');
$response = $notifications->create_by_id('53df4a90868a6df243b6efd8');
```

##### Delete a notification by slug and tracking number.
https://www.aftership.com/docs/api/4/notifications/post-remove-notifications
```php
$notifications = new AfterShip\Notifications('AFTERSHIP_API_KEY');
$response = $notifications->delete('ups', '1ZV90R483A33906706', array(
                  'emails' => ['youremail@yourdomain.com']
              )));
```
##### Delete a notification by tracking ID.
https://www.aftership.com/docs/api/4/notifications/post-remove-notifications
```php
$notifications = new AfterShip\Notifications('AFTERSHIP_API_KEY');
$response = $notifications->delete_by_id('53df4d66868a6df243b6f882'));
```

##### Get notification of a single tracking by slug and tracking number.
https://www.aftership.com/docs/api/4/notifications/get-notifications
```php
$notifications = new AfterShip\Notifications('AFTERSHIP_API_KEY');
$response = $notifications->get('dhl', '2254095771'));
```
##### Get notification of a single tracking by tracking ID
https://www.aftership.com/docs/api/4/notifications/get-notifications
```php
$notifications = new AfterShip\Notifications('AFTERSHIP_API_KEY');
$response = $notifications->get_by_id('53df4a90868a6df243b6efd8', array('fields' => 'customer_name'));
```
## Contributors
These amazing people have contributed code to this project:

- Teddy Chan - [view contributions](https://github.com/AfterShip/aftership-php/commits?author=teddychan)
- Sunny Chow - [view contributions](https://github.com/AfterShip/aftership-php/commits?author=sunnychow)
- Abishek R Srikaanth - [view contributions](https://github.com/AfterShip/aftership-php/commits?author=abishekrsrikaanth)
- Luis Cordova - [view contributions](https://github.com/AfterShip/aftership-php/commits?author=cordoval)
- Russell Davies - [view contributions](https://github.com/AfterShip/aftership-php/commits?author=russelldavies)
- akovalyov - [view contributions](https://github.com/AfterShip/aftership-php/commits?author=akovalyov)
- Robert Basic - [view contributions](https://github.com/AfterShip/aftership-php/commits?author=robertbasic)
- Marek Narozniak - [view contributions](https://github.com/AfterShip/aftership-php/commits?author=marekyggdrasil)

