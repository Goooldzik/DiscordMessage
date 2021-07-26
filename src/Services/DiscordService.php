<?php


namespace Goooldzik\DiscordMessage\Services;

use Exception;

class DiscordService
{
    /** @var string  */
    protected string $discordWebhookUrl;

    /** @var string */
    protected string $title;

    /** @var string|array */
    protected string|array $description;

    /** @var string */
    protected string $author;
    /** @var string|null */
    protected string|null $authorUrl;

    /** @var string */
    protected string $color;

    /** @var string|null */
    protected string|null $footer;
    /** @var string|null */
    protected string|null $footerIconUrl;

    /** @var string|null */
    protected string|null $image;

    /**
     * Method is for setting Discord webhook url
     *
     * @param string $discordWebhookUrl
     * @return $this
     */
    public function discordWebhookUrl(string $discordWebhookUrl): self
    {
        $this->discordWebhookUrl = $discordWebhookUrl;

        return $this;
    }

    /**
     * Method is for setting message title
     *
     * @param string $title
     * @return $this
     */
    public function title(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Method is for setting prepared message
     *
     * @param string|array $description
     * @return $this
     */
    public function description(string|array $description): self
    {
        if(!is_array($description))
            $description = [$description];

        $this->description = implode(PHP_EOL, $description);

        return $this;
    }

    /**
     * Method is for setting author name
     *
     * @param string $author
     * @return $this
     */
    public function author(string $author): self
    {
        $this->author = $author;

        return $this;
    }

    /**
     * Method is for setting url author's website
     *
     * @param string $authorUrl
     * @return $this
     */
    public function authorUrl(string $authorUrl = ''): self
    {
        $this->authorUrl = $authorUrl;

        return $this;
    }

    /**
     * Method is for setting message color
     *
     * @param string $color
     * @return $this
     */
    public function color(string $color = '#1F85DE'): self
    {
        $this->color = $color;

        return $this;
    }

    /**
     * Method is for setting footer text
     *
     * @param string $footer
     * @return $this
     */
    public function footer(string $footer = ''): self
    {
        $this->footer = $footer;

        return $this;
    }

    /**
     * @param string $footerIconUrl
     * @return $this
     */
    public function footerIconUrl(string $footerIconUrl = ''): self
    {
        $this->footerIconUrl = $footerIconUrl;

        return $this;
    }

    /**
     * Method is for setting message image
     *
     * @param string $image
     * @return $this
     */
    public function image(string $image = ''): self
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Method is for prepare array
     *
     * @return array
     */
    public function toArray(): array
    {
        return [
            'embeds' => [
                [
                    'title' => $this->title,
                    'type' => 'rich',
                    'description' => $this->description,
                    'color' => hexdec($this->color),
                    'timestamp' => Date('c', strtotime("now")),
                    'footer' => [
                        'text' => $this->footer,
                        'icon_url' => $this->footerIconUrl
                    ],
                    'image' => [
                        'url' => $this->image
                    ],
                    'author' => [
                        'name' => $this->author,
                        'url' => $this->authorUrl
                    ],
                ]
            ],
        ];
    }

    /**
     * Method is for send embed message to Discord text channel
     *
     * @return array
     */
    public function send(): array
    {
        try {
            $ch = curl_init($this->discordWebhookUrl);
            curl_setopt( $ch, CURLOPT_HTTPHEADER, array('Content-type: application/json'));
            curl_setopt( $ch, CURLOPT_POST, 1);
            curl_setopt( $ch, CURLOPT_POSTFIELDS, json_encode($this->toArray()));
            curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, 1);
            curl_setopt( $ch, CURLOPT_HEADER, 0);
            curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1);

            $response = curl_exec( $ch );

            // If you need to debug, or find out why you can't send message uncomment line below, and execute script.
            //return ['debug' => true, 'response' => $response];

            curl_close( $ch );

            return ['status' => 'success'];
        } catch (Exception $error) {
            return ['status' => 'error', 'message' => $error->getMessage()];
        }
    }
}