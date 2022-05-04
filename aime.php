
<html>
<head>
  <title>Your Website Title</title>
    <!-- You can use open graph tags to customize link previews.
    Learn more: https://developers.facebook.com/docs/sharing/webmasters -->
  <meta property="og:url"           content="https://www.facebook.com/events/506274977948725" />
  <meta property="og:type"          content="website" />
  <meta property="og:title"         content="Your Website Title" />
  <meta property="og:description"   content="Your description" />
  <meta property="og:image"         content="https://www.your-domain.com/path/image.jpg" />
</head>
<body>

  <!-- Load Facebook SDK for JavaScript -->
  <div id="fb-root"></div>
  <script async defer crossorigin="anonymous" 
        src="https://connect.facebook.net/en_US/sdk.js#xfbml=1
             &version={graph-api-version}
             &appId={your-facebook-app-id}
             &autoLogAppEvents=1" 
        nonce="FOKrbAYI">
  </script>

  <!-- Your like button code -->
  <div class="fb-like" 
       data-href="https://www.facebook.com/events/506274977948725" 
       data-width=""
       data-layout="standard" 
       data-action="like" 
       data-size="small"  
       data-share="true">
  </div>

</body>
</html>