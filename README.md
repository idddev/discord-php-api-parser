# discord-php-api-parser
Extremely simple example of a PHP parser for the Discord API

This was made for testing purposes. Feel free to use it for getting inspired. Check out the [Discord API Reference](https://discord.com/developers/docs/intro) for more information about API endpoints.

There's two examples:
## Check if a user exists in a guild
This will search for users with the given pattern.

```php
$findUser = _discordCheckIfUserExists($guildId, $nickname, $token);
if (!$findUser) {
   echo 'Users with given pattern not found.';
} else {
   echo 'Users found.';
   print_r($findUser);
}
```
Where $guildId is the Id of the Guild, $nickname is the search pattern, and $token is your Bot token.

## Change user roles of a member
This will change a user roles.

```php
$changeUserRoles = _discordSetUserRole($guildId, $userId, $roles, $token);
if (!$changeUserRoles) {
    echo 'Error while changing user roles.';
} else {
    echo 'Roles has been updated successfully.';
}
```
Where $guildId is the Id of the Guild, $userId is the user Id, $roles is an array of roles Ids, and $token is your Bot token.
