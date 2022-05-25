# 2(+)Accounts1Webhook

Allows a user to post webhooks with different set accounts.   
It literally is some random code I threw together years back without a care in the world. 

## Default Passwords

These passwords are just plain text within the `index.php` folder. It's meant to be a joke, so I didn't plan any encryption. 

<table><tbody><tr><td>Default Username</td><td>Default Password</td></tr><tr><td>Connor</td><td>Cyberlife</td></tr><tr><td>HarryHill</td><td>MrFunnyDoctor</td></tr></tbody></table>

## How to add new accounts?

1.  Within the `index.php` there is an if statement halfway down the page, you can add more accounts there. 
2.  Near the top of `embed.php`, there are also if statements. Make sure the `$username` variable value is the same as you've set in `index.php`. 
3.  Enjoy! (If you want to load more than one account on at a time, you'll need to make use of multiple different browsers, and incognito/In Private modes.
