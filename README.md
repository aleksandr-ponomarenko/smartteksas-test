# Notes
There were few problems fixed with workarounds to install project to empty database:
1) UUID issue, so if you do a "drush si" command and "drush cim" after, there is different UUID for drupal from configs and generated in database, so docroot/drush/UuidCommand was added...
2) There is a Shortcut module which contains link entities, and it crushes import command, so i've removed uuid as a hotfix for this problem.

Config split settings:
I've used $config['config_split.config_split.prod']['status'] = TRUE; $config['config_split.config_split.dev']['status'] = TRUE; variables to switch configs in settings.php (settings.local.php). If you are ysing default caching configuration, you might need to flush caches between split switch...
