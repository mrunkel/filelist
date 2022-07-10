A place to write stuff so that I don't forget it.

### Generate Thumbnails from videos

Pull out the image captures (these are 100 pixels tall, and keep aspect ratio), the rate (-r) is per-second (this yields one frame every ~5 minutes), this also adds time stamp to output image.

`ffmpeg  -i MOVIE.mp4 -r 0.0033 -vf scale=-1:120 -vcodec png capture-%002d.png`

Then use ImageMagick to build your gallery image:

`montage -title "Movie Name\nSubtitle" -geometry +4+4 capture*.png output.png`


### symfony/messenger  instructions:

* You're ready to use the Messenger component. You can define your own message buses
  or start using the default one right now by injecting the message_bus service
  or type-hinting Symfony\Component\Messenger\MessageBusInterface in your code.

* To send messages to a transport and handle them asynchronously:

    1. Uncomment the MESSENGER_TRANSPORT_DSN env var in .env
       and framework.messenger.transports.async in config/packages/messenger.yaml;
    2. Route your message classes to the async transport in config/packages/messenger.yaml.

* Read the documentation at https://symfony.com/doc/current/messenger.html

