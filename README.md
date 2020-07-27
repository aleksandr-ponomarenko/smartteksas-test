# Notes
There were few problems fixed with workarounds to install project to empty database:
1) UUID issue, so if you do a "drush si" command and "drush cim" after, there is different UUID for drupal from configs and generated in database, so docroot/drush/UuidCommand was added...
2) There is a Shortcut module which contains link entities, and it crushes import command, so i've removed uuid as a hotfix for this problem.
