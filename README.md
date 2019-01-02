## Valar PSR-7 HTTP Messages
[**https://mvc5.github.io**](https://mvc5.github.io)

Valar is a PSR-7 HTTP Message library for the [Mvc5 Framework](https://github.com/mvc5/mvc5). Its base implementation combines the Mvc5 [Http\Request](https://github.com/mvc5/mvc5/blob/master/src/Http/Request.php) and [Http\Response](https://github.com/mvc5/mvc5/blob/master/src/Http/Response.php) interfaces with the PSR-7 HTTP Message interfaces. An extended set of classes includes the Mvc5 [Request](https://github.com/mvc5/mvc5/blob/master/src/Request/Request.php) and [Response](https://github.com/mvc5/mvc5/blob/master/src/Response/Response.php) interfaces. An Mvc5 [App](https://github.com/mvc5/mvc5/blob/master/src/App.php) can be used as the configuration for a Valar [ServerRequest](https://github.com/mvc5/http-message/blob/master/src/ServerRequest.php) using [plugins](https://github.com/mvc5/http-message/blob/master/config/request.php) that are resolved just in time. JSON requests are automatically decoded using the [Data](https://github.com/mvc5/http-message/blob/master/src/Plugin/Data.php) plugin.
