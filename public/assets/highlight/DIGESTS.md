## Subresource Integrity

If you are loading Highlight.js via CDN you may wish to use [Subresource Integrity](https://developer.mozilla.org/en-US/docs/Web/Security/Subresource_Integrity) to guarantee that you are using a legimitate build of the library.

To do this you simply need to add the `integrity` attribute for each JavaScript file you download via CDN. These digests are used by the browser to confirm the files downloaded have not been modified.

```html
<script
  src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/11.9.0/highlight.min.js"
  integrity="sha384-9mu2JKpUImscOMmwjm1y6MA2YsW3amSoFNYwKeUHxaXYKQ1naywWmamEGMdviEen"></script>
<!-- including any other grammars you might need to load -->
<script
  src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/11.9.0/languages/go.min.js"
  integrity="sha384-WmGkHEmwSI19EhTfO1nrSk3RziUQKRWg3vO0Ur3VYZjWvJRdRnX4/scQg+S2w1fI"></script>
```

The full list of digests for every file can be found below.

### Digests

```
sha384-12GbYFzdyZCSmfBTmO2CR/qE89K5uE1PEuJ3QUwXH0Q9u+uoLNigjH9dG7LAxxiI /es/languages/json.js
sha384-+DT7AtubDhVDciRc6CgjJJRsCt0L8NC3Dh8n9Tj2tZWU8rWxDIj1ViubmUDn8OCY /es/languages/json.min.js
sha384-z/hrHNlwMcvvjzudTkjlwSX/Udx/GbAKyhbvs7cjfYAS8l600ckGWLDqj/eM1peW /es/languages/vbscript-html.js
sha384-7rzHs2v9fu5E3xKT9BbxDXT4GNQvENpY8IWOVCKnwNvogY6AGwl92Ij/rt8Omiyq /es/languages/vbscript-html.min.js
sha384-dq9sY7BcOdU/6YaN+YmFuWFG8MY2WYJG2w3RlDRfaVvjdHchE07Ss7ILfcZ56nUM /languages/json.js
sha384-RbRhXcXx5VHUdUaC5R0oV+XBXA5GhkaVCUzK8xN19K3FmtWSHyGVgulK92XnhBsI /languages/json.min.js
sha384-RpvvJQk66YBOljKOySvSU+gwYHonkGw4nWKedZumV6kEi48+GejKPAUHKUPlTkVE /languages/vbscript-html.js
sha384-Q2pUgWvb2tvXq+8kfdAdSGQFgjcgBh46AFq4OzvGQTDptWTry+4Y9erDzpdag6vi /languages/vbscript-html.min.js
sha384-3bAgBRJmC04FCY2/6AmJVPLoCJO5teQGkvX+0OimPEpF/8fwhP1C+OccRqOdyDzr /highlight.js
sha384-JP5mnS37pP+YhcKASr9WXUThyfTGcw1EtgfDZPs4smUu6ys/2lvXc6HQ24F/5mhT /highlight.min.js
```

