# Nexmo Incoming SMS Example in PHP with Beanstalkd

Despite the long-winded title, this is a very simple application to demonstrate simple receiving of an incoming SMS from [Nexmo](https://nexmo.com). When the message arrives, a simple SlimPHP application adds the data to a queue and acknowledges the incoming webhook. A separate worker process then takes each item from the queue, optionally checks the message signature, and writes it to a file.

To get started with Nexmo and for more information about any element of this application, refer to the [Nexmo Developer Portal](https://developer.nexmo.com) where you will find API reference documentation and code examples in multiple languages.
