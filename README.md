<p align="center"><a href="https://vptrading.et"><img src="/img/logo.png" alt="Logo V P Trading"></a></p>

<h1 align="center">Laravel Pakcage For<br> Telebirr</h1>

# Introduction

This Laravel package is a featherweight package to integrate Telebirr<sup>&reg;</sup>.

# Usage Guide

This is a private package, meaning there is no way to require it using composer.

### Step One

Install the package using `composer require vptrading/h5-telebirr-laravel`

### Step Two

Run the artisan command to publish the Vptrading/telebirr-laravel configuration file.

```
php artisan vendor:publish --provider="Vptrading\TelebirrLaravel\TelebirrServiceProvider"
```

After running that command you will see a `telebirr.php` configuration file in your application's `config` directory.

### Step Four

Open the `telebirr.php` configuration file and add the key's provided to you from Telebirr<sup>&reg;</sup>

# Usage

## Buy

In order to send a buy request using Telebirr<sup>&reg;</sup> all you have to do is import the `Telebirr` class where you want to use it and call the `buy` static method. The `Telebirr::buy()` method accepts for parameters, these are: Item name, amount, return url and shortcode.

**Example**

```
use Vptrading\TelebirrLaravel\Telebirr;

$response = Telebirr::buy('iPhone', 999, 'https://domain.tld/return', 0000);
```

> Note: The `ShortCode` is provided by Ethio Telecom

When calling that method it return a response

**Response Example**

```
{
    "teleResponse": {
        "code": 200,
        "data": {
            "toPayUrl": "https://app.ethiomobilemoney.et:2121/ammwebpay/#/?transactionNo=202202151208181493512480051392514"
        },
        "message": "Operation successful",
        "dateTime": 1644916098027,
        "path": null,
        "errorDetails": [],
        "extraData": []
    },
    "outTradeNo": "76c1aace47b3dc0a"
}
```

> Note: Make sure to store the `outTradeNo` in your database so you can fetch that transaction when you receive the notification.

Using the toPayUrl you will be redirected to Ethio Telecom's Telebirr<sup>&reg;</sup> site where the user will be able to pay using the Telebirr<sup>&reg;</sup> mobile app or using SMS right there from the browser.

## Notify

The next is being notified when a payment is successfull. After the user has paid the amount described, Telebirr<sup>&reg;</sup> will send you a notification on the URL you specified in the `telebirr.php` config file.

**Example Notification String From Telebirr<sup>&reg;</sup>**

```
VBMDvN6H2U/AGbxocLQgZfJOR2rLLqTZ5pHm6295AZS4uFXR1YMPJlF+SCoJK0DLzZ2OlgGMsVPrwfJ1lmKHtOvnDGJLKrcpIG/J7RLf+tN672g+lT5o3tByvQBkjqualj91i7uNqCytNFfVN5azw7VV+OwXBMu5gnGhZPX5D4plBtOjyMWm8IYsM4uqy9V7Os+jPk7w3QBHSMB8jRRhVABT9xAzTPWC1J86xAIaTA1ehjHcbY9ziA1+P5kNQSULunOMhCA+fn0Y2HZyyFySW+dU+DHWnwf0mjGa/xF669CQttTqcmIg4QLu0TUzYjhHl1l5gbAxrwK//amHL5I2wpUhCeeSS5E4tq/TmoqVdJoZC0/gvu2Zta/9orfbzWz/xYeKefvkRaHVUid0fRu6x0xGnVe115OPCm79Y0dU43mxMVhmPza45qxGwcmsbGzs1drMiu2BJI664f0kt8lfZAUVwhIMAZbdB4MnP7gi1pnW3vBZLAtAvSCY45X/gl1sqo1X9Ypdg9jd5fCQp0b44NKI7JojYTXWrtsFWYxOAiLB9zh53Bah6WjHSnHauBbRU8eeE2Lt6Lv+QzXlu2uCjRveBH9mauNyt5XNwaU/BoSSNUZpJFRgmy7AsNkj2RoBfKyggdexik6FJbff3lBODJcWWBjol1H6qlkMp9RkJLU=
```

In order to decode this, the package provides a `Notify::class` with `notify` static method. All you need to do is put the notification string sent from Telebirr<sup>&reg;</sup> in to that static method and it will be decoded.

**Example**

```
$decoded = Notify::notify('VBMDvN6H2U/AGbxocLQgZfJOR2rLLqTZ5pHm6295AZS4uFXR1YMPJlF+SCoJK0DLzZ2OlgGMsVPrwfJ1lmKHtOvnDGJLKrcpIG/J7RLf+tN672g+lT5o3tByvQBkjqualj91i7uNqCytNFfVN5azw7VV+OwXBMu5gnGhZPX5D4plBtOjyMWm8IYsM4uqy9V7Os+jPk7w3QBHSMB8jRRhVABT9xAzTPWC1J86xAIaTA1ehjHcbY9ziA1+P5kNQSULunOMhCA+fn0Y2HZyyFySW+dU+DHWnwf0mjGa/xF669CQttTqcmIg4QLu0TUzYjhHl1l5gbAxrwK//amHL5I2wpUhCeeSS5E4tq/TmoqVdJoZC0/gvu2Zta/9orfbzWz/xYeKefvkRaHVUid0fRu6x0xGnVe115OPCm79Y0dU43mxMVhmPza45qxGwcmsbGzs1drMiu2BJI664f0kt8lfZAUVwhIMAZbdB4MnP7gi1pnW3vBZLAtAvSCY45X/gl1sqo1X9Ypdg9jd5fCQp0b44NKI7JojYTXWrtsFWYxOAiLB9zh53Bah6WjHSnHauBbRU8eeE2Lt6Lv+QzXlu2uCjRveBH9mauNyt5XNwaU/BoSSNUZpJFRgmy7AsNkj2RoBfKyggdexik6FJbff3lBODJcWWBjol1H6qlkMp9RkJLU=);
```

**Result**

```
[
     "msisdn" => "251912345678",
     "outTradeNo" => "76c1aace47b3dc0a",
     "totalAmount" => "999",
     "tradeDate" => 1643891838000,
     "tradeNo" => "202202151208181493512480051392514",
     "tradeStatus" => 2,
     "transactionNo" => "9B327LP01I",
]
```

The result is a key-value pair array with the unique `outTradeNo` for you to query your database with.

**_🚀 And that's it. Do your thing and Give us a star if this package helped you. 🚀_**
