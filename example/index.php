<?php

    header('Content-Type: application/json');

    require_once '../vendor/autoload.php';

    use Goooldzik\DiscordMessage\Services\DiscordService;

    $discordService = new DiscordService();

    /*
     *
     * You can try send message to channel on my  server
     *
     * You can join -> https://discord.gg/4EezsQhW
     *
     */

    $discordMessage = $discordService
        ->title('Example title')
        ->description(['Line one', 'Line two', 'Line three', 'Line four'])
        ->color('#34495e')
        ->author('Goooldzik')
        ->authorUrl('https://github.com/Goooldzik')
        ->footer('DiscordMessage created by Goooldzik')
        ->footerIconUrl()
        ->image()
        ->discordWebhookUrl('https://discord.com/api/webhooks/867760830920261682/FgtxSN15kDly-emh9R2fzTSP_BcUwV2JUK6DDi6IeerfeoksrV3yZAVTI9D1632qwuMv')
        ->send();

    // Print status
    print_r($discordMessage);