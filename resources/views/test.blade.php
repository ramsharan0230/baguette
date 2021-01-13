<html>
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, user-scalable=yes, initial-scale=1, maximum-scale=1"
    />
    <meta
      name="description"
      content="Smart Device Camera Template for HTML, CSS, JS and WebRTC"
    />
    <meta name="keywords" content="HTML,CSS,JavaScript, WebRTC, Camera" />
    <meta name="author" content="Kasper Kamperman" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Mobile First Camera Template</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/cam/style.css') }}" />
  </head>
  <body>
    <div id="container">
        <div class="form">
            {{ csrf_token() }}
            <div id="vid_container">
                <video id="video" autoplay playsinline></video>
                <div id="video_overlay"></div>
              </div>
              <div id="gui_controls">
                <button
                  id="switchCameraButton"
                  name="switch Camera"
                  type="button"
                  aria-pressed="false"
                >d</button>
                <button id="takePhotoButton" name="take Photo" type="button">ddd</button>
                <button
                  id="toggleFullScreenButton"
                  name="toggle FullScreen"
                  type="button"
                  aria-pressed="false"
                >s</button>
              </div>
        </div>
    </div>
    <script
  src="https://code.jquery.com/jquery-3.5.1.js"
  integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
  crossorigin="anonymous"></script>
    <script src="{{ asset('js/cam/adapter.min.js') }}"></script>
    <script src="{{ asset('js/cam/screenfull.min.js') }}"></script>
    <script src="{{ asset('js/cam/howler.core.min.js') }}"></script>
    <script src="{{ asset('js/cam/main.js') }}"></script>
  </body>
</html>
