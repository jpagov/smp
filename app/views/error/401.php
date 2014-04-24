<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <title>401</title>

    <style>
      body {
        margin: 0; padding: 1em 2em;
        font: 1em/1.625em sans-serif;
      }
    </style>

    <!--
    - Unfortunately, Microsoft has added a clever new
    - "feature" to Internet Explorer. If the text of
    - an error's message is "too small", specifically
    - less than 512 bytes, Internet Explorer returns
    - its own error message. You can turn that off,
    - but it's pretty tricky to find switch called
    - "smart error messages". That means, of course,
    - that short error messages are censored by default.
    - IIS always returns error messages that are long
    - enough to make Internet Explorer happy. The
    - workaround is pretty simple: pad the error
    - message with a big comment like this to push it
    - over the five hundred and twelve bytes minimum.
    - Of course, that's exactly what you're reading
    - right now.
    -->
  </head>
  <body>

    <h1>401</h1>

    <p>You are not authorized to access <code><?php echo Uri::current(); ?></code>.</p>

    <p>Try the <a href="/">homepage</a></p>

  </body>
</html>
