# File scanner

## Notes

### Generate Thumbnails from videos
 
Pull out the image captures (these are 100 pixels tall, and keep aspect ratio), the rate (-r) is per-second (this yields one frame every ~5 minutes), this also adds time stamp to output image.

`ffmpeg  -i MOVIE.mp4 -r 0.0033 -vf scale=-1:120 -vcodec png capture-%002d.png`

Then use ImageMagick to build your gallery image:

`montage -title "Movie Name\nSubtitle" -geometry +4+4 capture*.png output.png`
