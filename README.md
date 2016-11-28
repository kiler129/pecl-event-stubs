# PECL `Event` Stubs

PHP offers great wrapper for fast [libevent](http://libevent.org) API. Extension code can
be obtained from [project repository](https://bitbucket.org/osmanov/pecl-event) and 
prebuild extensions, including DLLs for Windows, are available via [PECL](https://pecl.php.net/package/event).

### Something was missing...
Modern IDEs are using something called "stubs" in order to provide accurate code 
completion and many more advanced features while working with code. Stubs in their nature
are valid PHP files containing only classes/methods/functions/constants/etc declarations.
While PHP lacks header files (e.g. `*.h` used in C), stubs contents is virtually the same.

This repository contains such header files generic for any PHP IDE in order to provide 
advanced coding features for `Event` library.

### How to use stubs?
Refer to your IDE manual. The simplest thing, which should work in most IDEs, is 
downloading stubs to a directory and adding such folder to an include path.
