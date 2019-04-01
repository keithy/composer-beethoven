# Use composer with Json5 for humans

If `composer` is availalble on the $PATH, use beethoven.sh in its place.

For example, configure Netbeans IDE to use beethoven.sh as the composer executable.

## How it works

Before running composer, beethoven compares the current `composer.json` to `composer.json5`
If you have edited composer.json5 then composer.json will be automatically updated with the changes.

Beethoven will not progagate automated changes to `composer.json` back into `composer.json5`
Automatic updating will be suspended it `composer.json` is the more recent.

`beethoven.sh update` invokes a manual update, using the `composer.json5` as the master definition.

## Where's beethoven
example output:
```
"/Users/keith/NetBeansProjects/beethoven/beethoven.sh" "--ansi" "--no-interaction" "validate"
Da da da Dum...
composer.json5 - created for humans
./composer.json is valid, but with a few warnings
```


