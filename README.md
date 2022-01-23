# Witaj w moim repo DiscordMessage 👋

![Prerequisite](https://img.shields.io/badge/php-%5E7.4%7C%5E8.0-blue)
![Prerequisite](https://img.shields.io/badge/php--ext-ext--curl-blue)
![Maintenance](https://img.shields.io/badge/status-finished-green.svg)
![License: MIT](https://img.shields.io/badge/licence-MIT-green)
## Autor

👤 **Patryk Kacprowicz**
* Github: [@Goooldzik](https://github.com/Goooldzik)
* LinkedIn: [@Patryk Kacprowicz](https://linkedin.com/in/patryk-lukasz-kacprowicz)

## Opis
Aplikacja służąca do wysyłania wiadomości na kanału serwera Discord przy użyciu DiscordWebHook. System posiada pełną obsługę integracji z interfejsem Discord w tym autoryzacje użytkownika poprzez HTTP bez użycia zewnętrznych bibliotek.

## Wymagania

- PHP ^7.4|^8.0
- ext-curl

## Użycie

Przykładowe użycie:
```php
    $discordMessage = $discordService
        ->title('Example title')
        ->description(['Line one', 'Line two', 'Line three', 'Line four'])
        ->color('#34495e')
        ->author('Goooldzik')
        ->authorUrl('https://github.com/Goooldzik')
        ->footer('DiscordMessage created by Goooldzik')
        ->footerIconUrl()
        ->image()
        ->discordWebhookUrl('https://discord.com/api/webhooks/xxxxxx')
        ->send();
```

## Wsparcie

Zachęcam do pozostawienia ⭐️ jeśli projekt okazał się w jakiś sposób pomocny!

